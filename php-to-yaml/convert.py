from bs4 import BeautifulSoup
from parsing.index import parse_index_page
from parsing.cards import parse_card_page
import yaml
from pydantic_yaml import to_yaml_str

if __name__ == '__main__':
    # Open the index page and parse it
    with open("index.php") as f:
        index_page = BeautifulSoup(f)

        # For debugging purposes, output the pages
        print(yaml.dump(parse_index_page(index_page)))
        
    # Open a card page and parse it
    with open("C_action_cards.php") as f:
        action_card_page = BeautifulSoup(f)

        # For debugging purposes, output the pages
        print(to_yaml_str(parse_card_page(action_card_page)))