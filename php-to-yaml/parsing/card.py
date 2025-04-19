from typing import List, Optional, Union
from bs4 import BeautifulSoup
from dataclasses import dataclass
from pydantic import BaseModel, RootModel

class Rule(BaseModel):
    rule: str

class RuleWithChildren(BaseModel):
    rule: str
    subrules: Optional[List[Union[Rule, 'RuleWithChildren']]]

class Card(BaseModel):
    name: str
    rules: Optional[List[Union[Rule, 'RuleWithChildren']]]

class Cards(BaseModel):
    cards: List[Card]

def parse_card_page(soup: BeautifulSoup) -> List[Card]:
    cards = []
    for card in soup.find("article").find_all("h1"):
        name = card.text
        list_parent = card.find_next_sibling("ol")
        rules = [parse_rule(rule) for rule in list_parent.find_all("li", recursive=False)]
        
        cards.append(Card(name=name, rules=rules))
    
    return Cards(cards=cards)

def parse_rule(rule: BeautifulSoup) -> Union[Rule, RuleWithChildren]:
    text=rule.text   
    next_element = rule.find_next_sibling()

    if next_element and next_element.name == "ol":
        return RuleWithChildren(rule=text, subrules=[parse_rule(element) for element in next_element.find_all("li", recursive=False)])
    else:
        return Rule(rule=text)
