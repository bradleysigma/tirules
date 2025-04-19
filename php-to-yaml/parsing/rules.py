from typing import Dict, List, Optional, Union
from bs4 import BeautifulSoup
from dataclasses import dataclass
from pydantic import BaseModel, RootModel
import re

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

CONTENT_ORDER_REGEX = r"content:\s*['\"](.*?)['\"]"

def parse_rules_page(soup: BeautifulSoup) -> List[Card]:
    rules = []

    article = soup.find("article")
    
    for category in article.find_all("h1"):
        name = category.text

        # For rules references, preserve the order
        start_order = None
        if category.text == "Rules Reference":
            style = category.find_next_sibling("style")
            if not style:
                raise ValueError("Expected a style in rules reference")

            match = re.search(CONTENT_ORDER_REGEX, style.text)
            if not match:
                raise ValueError("Expected a starting order in the style")

            start_order = match.group(1)[:-1]

        # Expect an ordered list next
        list_parent = category.find_next_sibling("ol")

        if list_parent and len(list(list_parent.find_all("li"))) > 0:
            # Add the card with parsed rules
            rules.append(CardWithRules(name=name, rules=parse_sub_rules(list_parent, start_order)))
        else:
            # Add the card
            rules.append(Card(name=name))
    
    return Cards(cards=rules)

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
