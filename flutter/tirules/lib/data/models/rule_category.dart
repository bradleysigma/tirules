class RuleCategory {
  final String name;
  final String displayName;

  const RuleCategory(this.name, this.displayName);

  factory RuleCategory.fromJson(Map<String, dynamic> json) {
    return RuleCategory("hello", "world");
  }
}