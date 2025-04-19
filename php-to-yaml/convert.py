from bs4 import BeautifulSoup
from parsing.index import parse_index_page
from parsing.cards import parse_card_page
import yaml
import os
from pydantic_yaml import to_yaml_str
from html import unescape

def format_name(name: str) -> str:
    return name.lower().replace(" ", "_")

if __name__ == '__main__':
    # Create the "output" directory (and other directories) if they don't exist
    if not os.path.exists("output"):
        os.makedirs("output")
    
    if not os.path.exists("output/components"):
        os.makedirs("output/components")
    
    if not os.path.exists("output/factions"):
        os.makedirs("output/factions")

    # Open the index page and parse it
    with open("index.php") as f:
        # Unescape escape characters before parsing so that they appear
        # in their correct form in YAML
        index_page = BeautifulSoup(unescape(f.read()), features="html.parser")
        root = parse_index_page(index_page)
        
        with open("output/root.yaml", "w", encoding="utf-8") as f:
            yaml.dump(root, f)
    
    # Generate the YAML files for the component notes
    for name, path in root["Component Notes"].items():
        # Open a component page and parse it
        with open(path) as f:
            # Unescape escape characters before parsing so that they appear
            # in their correct form in YAML
            component_page = BeautifulSoup(unescape(f.read()), features="html.parser")

            # For debugging purposes, output the pages
            with open(f"output/components/{format_name(name)}.yaml", "w", encoding="utf-8") as c:
                c.write(to_yaml_str(parse_card_page(component_page)))
    
    # Generate the YAML files for the faction notes
    for name, path in root["Faction Notes"].items():
        # Open a component page and parse it
        with open(path) as f:
            # Unescape escape characters before parsing so that they appear
            # in their correct form in YAML
            faction_page = BeautifulSoup(unescape(f.read()), features="html.parser")

            # For debugging purposes, output the pages
            with open(f"output/factions/{format_name(name)}.yaml", "w", encoding="utf-8") as c:
                c.write(to_yaml_str(parse_card_page(faction_page)))