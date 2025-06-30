import 'package:flutter/material.dart';
import 'package:flutter/services.dart' show rootBundle;
import 'package:go_router/go_router.dart';
import 'package:tirules/data/models/rule_category.dart';
import 'package:tirules/data/models/rules.dart';
import 'package:tirules/data/repositories/rules_repository.dart';
import 'package:yaml/yaml.dart';
import 'package:get_it/get_it.dart';

import 'package:tirules/presentation/widgets/menu_widget.dart';
import 'package:tirules/presentation/widgets/rules_widget.dart';

void setup() {
  // Makes the rules repository accessible everywhere as a singleton
  GetIt.I.registerSingletonAsync<RulesRepository>(() async => YamlRulesRepository.create("assets/rules"));
}
void main() {
  setup();
  runApp(const MainApp());
}

Future<Map> loadConfigFile(String path) async {
  final yamlString = await rootBundle.loadString(path, cache: true);
  return loadYaml(yamlString) as Map;
}

final GoRouter router = GoRouter(
  routes: [
    ShellRoute(
      builder: (BuildContext context, GoRouterState state, Widget child) {
        return FutureBuilder(
          future: GetIt.I.allReady(),
          builder:(context, snapshot) {
            if(snapshot.hasData) {
              return Scaffold(
                appBar: AppBar(
                  title: Text("TI Rules")
                ),
                drawer: MenuWidget(rootPath: "assets/rules/root.yaml", onItemSelected: (category, childCategory) => {
                  GoRouter.of(context).go('/rules/$category/$childCategory')
                },),
                body: child,
              );
            } else if(snapshot.hasError) {
              return Text("An unexpected error has occurred");
            } else {
              return Text("Loading...");
            }
          }
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
            return FutureBuilder(
              future: GetIt.I.allReady(),
              builder:(context, snapshot) {
                if (snapshot.hasData) {
                  final category = state.pathParameters['category']!;
                  final childCategory = state.pathParameters['childCategory']!;
                  final RuleCategory? ruleCategory = GetIt.I<RulesRepository>().getCategory(childCategory);

                  Future<Rules?> data = ruleCategory != null ? GetIt.I<RulesRepository>().getRules(ruleCategory) : Future<Rules?>.value(null);
                  return FutureBuilder<Rules?>(
                    future: data,
                    builder: (BuildContext context, AsyncSnapshot<Rules?> snapshot) {
                      if (snapshot.hasData) {
                        if (snapshot.data != null) {
                          final Rules rules = snapshot.data as Rules;
                          return RulesWidget(rules: rules);
                        } else {
                          return Text('Unable to find data for rules');
                        }
                      } else if (snapshot.hasError) {
                        return Text('An unexpected error has occurred');
                      } else {
                        return Text('Loading...');
                      }
                    }
                  );
                } else if(snapshot.hasError) {
                  return Text("An unexpected error has occurred");
                } else {
                  return Text("Loading...");
                }
              },
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