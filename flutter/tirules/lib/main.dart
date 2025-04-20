import 'package:flutter/material.dart';
import 'package:flutter/services.dart' show rootBundle;

void main() {
  runApp(const MainApp());
}

class RulesWidget extends StatefulWidget {
  const RulesWidget({super.key});

  @override
  State<RulesWidget> createState() => _RulesWidgetState();
}

class _RulesWidgetState extends State<RulesWidget> {
  String yamlContent = "Loading...";
  
  @override
  void initState() {
    super.initState();
    loadContent();
  }

  Future<void> loadContent() async {
    final content = await rootBundle.loadString("assets/rules/root.yaml");

    setState(() {
      yamlContent = content;
    });
  }

  @override
  Widget build(BuildContext context) {
    return ListView(
      children: [Text(yamlContent)]
    );
  }
}

class MainApp extends StatelessWidget {
  const MainApp({super.key});

  @override
  Widget build(BuildContext context) {
    return const MaterialApp(
      home: Scaffold(
        body: Center(
          child: RulesWidget(),
        ),
      ),
    );
  }
}

Future<String> loadYamlFile() async {
  final yamlString = await rootBundle.loadString('../../output/root.yaml');

  return yamlString;
}