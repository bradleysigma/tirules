class Rule {
  final int level;
  final String order;
  final String description;
  final List<Rule> childrenRules;

  Rule(this.level, this.order, this.description, this.childrenRules);
}

class RuleSection {
  final String name;
  final List<Rule> rules;

  RuleSection(this.name, this.rules);
}

class Rules {
  final String name;
  final List<RuleSection> sections;

  Rules(this.name, this.sections);
  factory Rules.fromMap(String name, Map<dynamic, dynamic> map) {
    if (map.containsKey("cards")) {
      return Rules(name, [for (Map section in map["cards"]) _parseSection(section)]);
    } else {
      return Rules(name, []);
    }
  }

  static RuleSection _parseSection(Map section) {
    final String name = section.containsKey("name") ? section["name"] : "???";
    final List<Rule> rules = section.containsKey("rules") ? _parseRules(section["rules"]) : [];
    return RuleSection(name, rules);
  }

  static List<Rule> _parseRules(Map rules) {
    // Convert rules to an ordered list
    return [for (var order in rules.keys) _parseRule(order, rules[order])];
  }

  static Rule _parseRule(String order, Map rule, [int level = 0]) {
    final List<Rule> childrenRules = rule.containsKey("subrules") 
      ? [
        for (String childOrder in rule["subrules"].keys) 
        _parseRule(childOrder, rule["subrules"][childOrder], level + 1)
      ] 
      : [];
    
    return Rule(
      level, 
      order, 
      rule['rule'],
      childrenRules
    );
  }
}