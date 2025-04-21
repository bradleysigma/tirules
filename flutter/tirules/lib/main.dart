import 'package:flutter/material.dart';
import 'package:flutter/services.dart' show rootBundle;
import 'package:go_router/go_router.dart';
import 'package:tirules/data/repositories/rules_repository.dart';
import 'package:yaml/yaml.dart';
import 'package:get_it/get_it.dart';

import 'package:tirules/presentation/widgets/menu_widget.dart';
import 'package:tirules/presentation/widgets/rules_widget.dart';

void setup() {
  // Makes the rules repository accessible everywhere as a singleton
  GetIt.I.registerSingleton<RulesRepository>(YamlRulesRepository(configPath: "assets/rules"));
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