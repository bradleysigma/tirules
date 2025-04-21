class Rules {
  final String name;

  Rules({required this.name});
  factory Rules.fromMap(Map<String, dynamic> map) {
    return Rules(name: "hello world");
  }
}