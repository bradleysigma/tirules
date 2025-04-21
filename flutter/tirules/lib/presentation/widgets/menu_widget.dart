import 'package:flutter/material.dart';
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
