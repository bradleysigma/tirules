import 'package:flutter/material.dart';
import 'package:tirules/data/models/rules.dart';
import 'package:tirules/presentation/widgets/ordered_list_widget.dart';

class RulesWidget extends StatelessWidget {
  final Rules rules;

  const RulesWidget({super.key, required this.rules});

  @override
  Widget build(BuildContext context) {
    List<Widget> cards = [for (RuleSection section in rules.sections) generateSection(section)];

    return ListView(
      children: cards,
    );
  }

  Widget generateSection(RuleSection section) {
    return Column(children: [
      Text(
        section.name, 
        textScaler: TextScaler.linear(2)
      ),
      if (section.rules.isNotEmpty) generateRules(section.rules)
    ]);
  }

  Widget generateRules(List<Rule> rules) {
    // Convert rules to an ordered list
    var hierarchicalRules = [for (Rule rule in rules) ...generateRuleListItems(rule)];
    
    return OrderedListWidget(items: hierarchicalRules);
  }

  List<OrderedListItem> generateRuleListItems(Rule rule, [int level = 0]) {
    return [
      // Add an item for this rule
      OrderedListItem(level, "${rule.order}. ${rule.description}"),
      // Add items recursively for any sub rules
      if (rule.childrenRules.isNotEmpty) ...[for (Rule childRule in rule.childrenRules) ...generateRuleListItems(childRule, level + 1)]
    ];
  }
}
