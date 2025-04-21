import 'package:flutter/services.dart';
import 'package:tirules/data/models/rules.dart';
import 'package:tirules/data/models/rule_category.dart';
import 'package:yaml/yaml.dart';

abstract class RulesRepository {
  Future<RuleCategory?> getCategory(String name);
  Future<List<RuleCategory>> getParentCategories();
  Future<List<RuleCategory>?> getChildCategories({required RuleCategory category});
  Future<Rules?> getRules({required RuleCategory category});
}

class YamlRulesRepository implements RulesRepository {
  YamlRulesRepository({required this.configPath});

  final String configPath;
  
  List<RuleCategory> _parentCategories = [];
  Map<RuleCategory, List<RuleCategory>> _childCategories = {};
  Map<RuleCategory, RuleCategory> _childToParentCategory = {};
  List<RuleCategory> _categories = [];
  Map<String, RuleCategory> _displayNameToCategory = {};
  final Map<RuleCategory, Rules> _rules = {};
  bool _isInitialised = false;
  
  @override
  Future<RuleCategory?> getCategory(String name) async {
    await _initialiseCategories();

    return _displayNameToCategory[name];
  }

  @override
  Future<List<RuleCategory>> getParentCategories() async {
    await _initialiseCategories();

    return _parentCategories;
  }

  @override
  Future<List<RuleCategory>?> getChildCategories({required RuleCategory category}) async {
    await _initialiseCategories();

    return _childCategories[category];
  }

  @override
  Future<Rules?> getRules({required RuleCategory category}) async {
    await _initialiseCategories();

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

      Map<String, dynamic> config = await _loadConfigFile("$configPath/${parentCategory.name}/${category.name}");
      _rules[category] = Rules.fromMap(config);
    }
    
    return _rules[category];
  }
  
  Future<Map<String, dynamic>> _loadConfigFile(String path) async {
    final yamlString = await rootBundle.loadString(path, cache: true);
    return loadYaml(yamlString) as Map<String, dynamic>;
  }

  Future<void> _initialiseCategories() async {
    if(!_isInitialised) {
      Map rootConfig = await _loadConfigFile("$configPath/root.yaml");

      _parentCategories = [
        for (String category in rootConfig.keys) 
        RuleCategory(category.toLowerCase().replaceAll(" ", "_"), category)
      ];

      _childCategories = {
        for (RuleCategory category in _parentCategories)
        category: [
          for (String childCategory in rootConfig[category.name].keys) 
          RuleCategory(childCategory.toLowerCase().replaceAll(" ", "_"), childCategory)
        ]
      };

      _childToParentCategory = {
        for (RuleCategory parent in _parentCategories)
        for (RuleCategory child in _childCategories[parent] ?? [])
        child: parent
      };

      _categories = [
        ..._parentCategories ?? [],
        ...[
          for (List<RuleCategory> childCategory in _childCategories?.values ?? []) 
          ...childCategory
        ]
      ];

      _displayNameToCategory = {
        for (var ruleCategory in _categories ?? [])
        ruleCategory.displayName: ruleCategory
      };

      _isInitialised = true;
    }
  }
}