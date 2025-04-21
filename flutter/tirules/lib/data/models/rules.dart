class Rules {
  final String name;

  Rules({required this.name});
  factory Rules.fromMap(Map<dynamic, dynamic> map) {
    return Rules(name: "hello world");
  }
}