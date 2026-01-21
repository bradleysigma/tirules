import 'package:flutter/material.dart';
import 'package:get_it/get_it.dart';
import 'package:tirules/data/models/rule_category.dart';
import 'package:tirules/data/repositories/rules_repository.dart';
import 'package:tirules/main.dart';

typedef MenuItemSelectedCallback = void Function(String category, String childCategory);
class MenuWidget extends StatefulWidget {
  final String rootPath;
  final MenuItemSelectedCallback onItemSelected;

  const MenuWidget({super.key, required this.rootPath, required this.onItemSelected});

  @override
  State<MenuWidget> createState() => _MenuWidgetState();
}

class _MenuWidgetState extends State<MenuWidget> {
  @override
  void initState() {
    super.initState();
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
    return [for (RuleCategory category in GetIt.I<RulesRepository>().getParentCategories()) ExpansionTile(
      title: Text(category.displayName),
      children: [
        for (RuleCategory childCategory in GetIt.I<RulesRepository>().getChildCategories(category)) ListTile(
          title: Text(childCategory.displayName),
          onTap: () {
            setState(() {
              Navigator.pop(context);
              widget.onItemSelected(category.name, childCategory.name);
            });
          },
        )
      ]
    )];
  }
}
