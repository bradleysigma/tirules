import 'package:flutter/material.dart';
import 'package:flutter/services.dart' show rootBundle;
import 'package:yaml/yaml.dart';

void main() {
  runApp(const MainApp());
}

class OrderedListItem {
   final int level;
   final String text;
   const OrderedListItem(this.level, this.text);
 }

class OrderedList extends StatelessWidget {
  const OrderedList({super.key, required this.items});

  final List<OrderedListItem> items;

  @override
  Widget build(BuildContext context) {
    return ListView.builder(
      scrollDirection: Axis.vertical,
      shrinkWrap: true,
      itemCount: items.length,
      itemBuilder: (context, index) {
        final item = items[index];
        return Padding(
          padding: EdgeInsets.only(left: item.level * 20.0),
          child: ListTile(
            title: Text(item.text),
          ),
        );
      }
    );
  }
}

class RulesWidget extends StatefulWidget {
  final String configPath;

  const RulesWidget({super.key, required this.configPath});

  @override
  State<RulesWidget> createState() => _RulesWidgetState();
}

class _RulesWidgetState extends State<RulesWidget> {
  Map rules = {};
  
  @override
  void initState() {
    super.initState();
    loadContent();
  }

  Future<void> loadContent() async {
    final yamlString = await rootBundle.loadString(widget.configPath);
    final yamlMap = loadYaml(yamlString) as Map;

    setState(() {
      rules = yamlMap;
    });
  }

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
    
    return OrderedList(items: hierarchicalRules);
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

class MainApp extends StatelessWidget {
  const MainApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      home: Scaffold(
        body: RulesWidget(configPath: "assets/rules/components/exploration_cards.yaml"),
      ),
    );
  }
}