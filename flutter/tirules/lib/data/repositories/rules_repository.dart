import 'package:flutter/services.dart';
import 'package:tirules/data/models/rules.dart';
import 'package:tirules/data/models/rule_category.dart';
import 'package:yaml/yaml.dart';

abstract class RulesRepository {
  RuleCategory? getCategory(String name);
  List<RuleCategory> getParentCategories();
  List<RuleCategory> getChildCategories({required RuleCategory category});
  Future<Rules?> getRules({required RuleCategory category});
}

class YamlRulesRepository implements RulesRepository {
  final String _configPath;
  final List<RuleCategory> _parentCategories;
  final Map<RuleCategory, List<RuleCategory>> _childCategories;
  final Map<RuleCategory, RuleCategory> _childToParentCategory;
  final List<RuleCategory> _categories;
  final Map<String, RuleCategory> _displayNameToCategory;
  final Map<RuleCategory, Rules> _rules = {};
  
  YamlRulesRepository(this._configPath, this._parentCategories, this._childCategories, this._childToParentCategory, this._categories, this._displayNameToCategory);
  factory YamlRulesRepository._create(
    String configPath,
    Map<dynamic, dynamic> rootConfig
  ) {
    List<RuleCategory> parentCategories = [
      for (String category in rootConfig.keys) 
      RuleCategory(category.toLowerCase().replaceAll(" ", "_"), category)
    ];

    Map<RuleCategory, List<RuleCategory>> childCategories = {
      for (RuleCategory category in parentCategories)
      category: [
        for (String childCategory in rootConfig[category.displayName].keys) 
        RuleCategory(childCategory.toLowerCase().replaceAll(" ", "_"), childCategory)
      ]
    };

    Map<RuleCategory, RuleCategory> childToParentCategory = {
      for (RuleCategory parent in parentCategories)
      for (RuleCategory child in childCategories[parent] ?? [])
      child: parent
    };

    List<RuleCategory> categories = [
      ...parentCategories,
      ...[
        for (List<RuleCategory> childCategory in childCategories.values) 
        ...childCategory
      ]
    ];

    Map<String, RuleCategory> displayNameToCategory = {
      for (var ruleCategory in categories)
      ruleCategory.displayName: ruleCategory
    };

    return YamlRulesRepository(configPath, parentCategories, childCategories, childToParentCategory, categories, displayNameToCategory);
  }

  static Future<YamlRulesRepository> create(String configPath) async {
    Map<dynamic, dynamic> rootConfig = await _loadConfigFile("$configPath/root.yaml");

    return YamlRulesRepository._create(configPath, rootConfig);
  }

  static Future<Map<dynamic, dynamic>> _loadConfigFile(String path) async {
    final yamlString = await rootBundle.loadString(path, cache: true);
    return loadYaml(yamlString) as Map<dynamic, dynamic>;
  }
  
  @override
  RuleCategory? getCategory(String name) {
    return _displayNameToCategory[name];
  }

  @override
  List<RuleCategory> getParentCategories() {
    return _parentCategories;
  }

  @override
  List<RuleCategory> getChildCategories({required RuleCategory category}) {
    return _childCategories[category] ?? [];
  }

  @override
  Future<Rules?> getRules({required RuleCategory category}) async {
    // Make sure the category is valid
    if (!_categories.contains(category)) {
      throw Exception("The category '$category' is invalid");
    }

    // Make sure the category is a child
    if (!_childToParentCategory.containsKey(category)) {
      throw Exception("The category '$category' is not a child, hence has no rules");
    }

    // Check if the rule has been loaded
    if (!_rules.containsKey(category)) {
      RuleCategory? parentCategory = _childToParentCategory[category];
      if (parentCategory == null) {
        throw Exception("The category '$category' does not have a parent");
      }

      Map<dynamic, dynamic> config = await _loadConfigFile("$_configPath/${parentCategory.name}/${category.name}");
      _rules[category] = Rules.fromMap(config);
    }
    
    return _rules[category];
  }
}