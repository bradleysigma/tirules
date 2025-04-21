import 'package:flutter/material.dart';

class OrderedListItem {
   final int level;
   final String text;
   const OrderedListItem(this.level, this.text);
 }

class OrderedListWidget extends StatelessWidget {
  const OrderedListWidget({super.key, required this.items});

  final List<OrderedListItem> items;

  @override
  Widget build(BuildContext context) {
    return ListView.builder(
      //scrollDirection: Axis.vertical,
      physics: const NeverScrollableScrollPhysics(),
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