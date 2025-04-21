import 'package:flutter/material.dart';
import 'package:flutter/services.dart' show rootBundle;
import 'package:go_router/go_router.dart';
import 'package:yaml/yaml.dart';

void main() {
  runApp(const MainApp());
}

Future<Map> loadConfigFile(String path) async {
  final yamlString = await rootBundle.loadString(path, cache: true);
  return loadYaml(yamlString) as Map;
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

typedef MenuItemSelectedCallback = void Function(String category, String childCategory);
class MenuWidget extends StatefulWidget {
  final String rootPath;
  final MenuItemSelectedCallback onItemSelected;

  const MenuWidget({super.key, required this.rootPath, required this.onItemSelected});

  @override
  State<MenuWidget> createState() => _MenuWidgetState();
}

class _MenuWidgetState extends State<MenuWidget> {
  Map contents = {};
  
  @override
  void initState() {
    super.initState();
    loadContent();
  }

  Future<void> loadContent() async {
    final yamlMap = await loadConfigFile(widget.rootPath);

    setState(() {
      contents = yamlMap;
    });
  }
  
  @override
  Widget build(BuildContext context) {
    return Drawer(
      child: ListView(
        padding: EdgeInsets.zero,
        children: <Widget>[
          const DrawerHeader(
            decoration: BoxDecoration(color: Colors.blue),
            child: Text('Contents', style: TextStyle(color: Colors.white, fontSize: 24)),
          ),
          ...generateContents()  
        ]
      )
    );
  }

  List<Widget> generateContents() {
    return [for (var category in contents.keys) ExpansionTile(
      title: Text(category),
      children: [
        for (var childCategory in contents[category].keys) ListTile(
          title: Text(childCategory),
          onTap: () {
            setState(() {
              // TODO: Make this more robust
              widget.onItemSelected(category.toLowerCase().replaceAll(" ", "_"), childCategory.toLowerCase().replaceAll(" ", "_"));
            });
          },
        )
      ]
    )];
  }
}

final GoRouter router = GoRouter(
  routes: [
    ShellRoute(
      builder: (BuildContext context, GoRouterState state, Widget child) {
        return Scaffold(
          appBar: AppBar(title: Text('TI Rules')),
          drawer: MenuWidget(rootPath: "assets/rules/root.yaml", onItemSelected: (category, childCategory) => {
            GoRouter.of(context).go('/rules/$category/$childCategory')
          },),
          body: child,
        );
      },
      routes: [
        GoRoute(
          path: '/',
          builder: (context, state) => const Text('Home screen'),
        ),
        GoRoute(
          path: '/rules/:category/:childCategory',
          builder: (context, state) {
            final category = state.pathParameters['category']!;
            final childCategory = state.pathParameters['childCategory']!;

            Future<Map> data = loadConfigFile("assets/rules/$category/$childCategory.yaml");
            return FutureBuilder<Map>(
              future: data,
              builder: (BuildContext context, AsyncSnapshot<Map> snapshot) {
                if (snapshot.hasData) {
                  return RulesWidget(rules: snapshot.data ?? {});
                } else if (snapshot.hasError) {
                  return Text('An unexpected error has occurred');
                } else {
                  return Text('Loading...');
                }
              }
            );
          }
        )
      ]
    ),
  ],
);

class MainApp extends StatelessWidget {
  const MainApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp.router(
      title: 'TI Rules',
      routerConfig: router
    );
  }
}