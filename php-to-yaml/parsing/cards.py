from typing import Dict, List, Optional, Union
from bs4 import BeautifulSoup
from dataclasses import dataclass
from pydantic import BaseModel, RootModel

class Rules(RootModel):
    root: Dict[str, Union['Rule', 'RuleWithChildren']]

class Rule(BaseModel):
    rule: str

class RuleWithChildren(Rule):
    subrules: Optional[Rules]

class Card(BaseModel):
    name: str

class CardWithRules(Card):
    rules: Optional[Rules]

class Cards(BaseModel):
    cards: List[Union[Card, CardWithRules]]

def parse_card_page(soup: BeautifulSoup) -> List[Card]:
    cards = []
    for card in soup.find("article").find_all("h1"):
        name = card.text

        # Expect an ordered list next
        list_parent = card.find_next_sibling("ol")

        if list_parent and len(list(list_parent.find_all("li"))) > 0:
            # Add the card with parsed rules
            cards.append(CardWithRules(name=name, rules=parse_sub_rules(list_parent)))
        else:
            # Add the card
            cards.append(Card(name=name))
    
    return Cards(cards=cards)

def parse_rule(rule: BeautifulSoup, order: str) -> Union[Rule, RuleWithChildren]:
    # The definition of the rule
    text=rule.text

    # The element after the rule, seeing if there's any sub-rules in an ordered list
    next_element = rule.find_next_sibling()

    if next_element and next_element.name == "ol":
        # As the next element was an ordered list, this means this rule had children
        return RuleWithChildren(rule=text, subrules=parse_sub_rules(next_element, order))
    else:
        # No ordered list, so no children
        return Rule(rule=text)

def parse_sub_rules(ordered_list: BeautifulSoup, parent_order: str = None):
    # Generates an order sequence based on the parent order
    get_order = lambda index, order: str(index + 1) if not order else f"{order}.{index+1}"

    return {get_order(index, parent_order): parse_rule(rule, get_order(index, parent_order)) for index, rule in enumerate(ordered_list.find_all("li", recursive=False))}
