import 'package:flutter/material.dart';
import 'package:tirules/presentation/widgets/ordered_list_widget.dart';

class RulesWidget extends StatelessWidget {
  final Map rules;

  const RulesWidget({super.key, required this.rules});

  @override
  Widget build(BuildContext context) {
    List<Widget> cards = rules.containsKey("cards") ? [for (var card in rules["cards"]) generateCard(card)] : [];

    return ListView(
      children: cards,
    );
  }

  Widget generateCard(Map card) {
    return Column(children: [
      Text(
        card["name"] ?? "???", 
        textScaler: TextScaler.linear(2)
      ),
      if (card.containsKey("rules")) generateRules(card["rules"])
    ]);
  }

  Widget generateRules(Map rules) {
    // Convert rules to an ordered list
    var hierarchicalRules = [for (var order in rules.keys) ...generateRuleListItems(order, rules[order])];
    
    return OrderedListWidget(items: hierarchicalRules);
  }

  List<OrderedListItem> generateRuleListItems(String order, Map rule, [int level = 0]) {
    return [
      // Add an item for this rule
      OrderedListItem(level, "$order. ${rule['rule']}"),
      // Add items recursively for any sub rules
      if (rule.containsKey("subrules")) ...[for (var subRuleOrder in rule["subrules"].keys) ...generateRuleListItems(subRuleOrder, rule["subrules"][subRuleOrder], level + 1)]
    ];
  }
}
