from typing import List
from bs4 import BeautifulSoup
from dataclasses import dataclass

@dataclass(frozen=True)
class Rule:
    rule: str
    children_rules: List['Rule']

@dataclass(frozen=True)
class Card:
    name: str
    rules: List[Rule]

@dataclass(frozen=True)
class Cards:
    cards: List[Card]

def parse_card_page(soup: BeautifulSoup) -> List[Card]:
    cards = []
    for card in soup.find("article").find_all("h1"):
        name = card.text

        # TODO: Need to handle lists within lists
        rules = []
        for rule in card.find_next_sibling("ol").find_all("li"):
            rules.append(Rule(rule.text, []))
        
        cards.append(Card(name, rules))
    
    return Cards(cards)
        
