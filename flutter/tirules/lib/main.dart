import 'package:flutter/material.dart';
import 'package:flutter/services.dart' show rootBundle;
import 'package:yaml/yaml.dart';

void main() {
  runApp(const MainApp());
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

    return Column(
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
    var rulesWidgets = [for (var order in rules.keys) generateRule(order, rules[order])];

    return Column(children: rulesWidgets);
  }

  Widget generateRule(String order, Map rule) {
    return Text("$order: ${rule['rule']}");
  }

}

class MainApp extends StatelessWidget {
  const MainApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      home: Scaffold(
        body: RulesWidget(configPath: "assets/rules/components/agendas.yaml"),
      ),
    );
  }
}