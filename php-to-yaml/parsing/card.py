from typing import List, Union
from bs4 import BeautifulSoup
from dataclasses import dataclass

@dataclass(frozen=True)
class Rule:
    rule: str

@dataclass(frozen=True)
class Rules:
    rules: List[Union[Rule, 'Rules']]

@dataclass(frozen=True)
class Card:
    name: str
    rules: Rules

@dataclass(frozen=True)
class Cards:
    cards: List[Card]

def parse_card_page(soup: BeautifulSoup) -> List[Card]:
    cards = []
    for card in soup.find("article").find_all("h1"):
        name = card.text
        list_parent = card.find_next_sibling("ol")
        rules = [] if not list_parent else [parse_rule(list_parent)]
        
        cards.append(Card(name, Rules(rules)))
    
    return Cards(cards)

def parse_rule(rule: BeautifulSoup) -> Union[Rule, Rules]:      
    if rule.name == "li":
        return Rule(rule.text)
    elif rule.name == "ol":
        child_rules = rule.find_all(recursive=False)
        rules = [parse_rule(child_rule) for child_rule in (child_rules if child_rules else [])]
        return Rules(rules)
    else:
        raise Exception(f"Unsupported tag {rule.name} in rules")
