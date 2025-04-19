from typing import Dict
from bs4 import BeautifulSoup
from parsing.index import parse_index_page
from parsing.rules import parse_rules_page
import yaml
import os
from pydantic_yaml import to_yaml_str
from html import unescape

def format_name(name: str) -> str:
    return name.lower().replace(" ", "_")

def generate_notes(notes: Dict[str, str], output_folder: str):
    if not os.path.exists(f"output/{output_folder}"):
        os.makedirs(f"output/{output_folder}")

    for name, path in notes.items():
        # Open a component page and parse it
        with open(path) as f:
            # Unescape escape characters before parsing so that they appear
            # in their correct form in YAML
            notes_page = BeautifulSoup(unescape(f.read()), features="html.parser")

            # For debugging purposes, output the pages
            with open(f"output/{output_folder}/{format_name(name)}.yaml", "w", encoding="utf-8") as c:
                c.write(to_yaml_str(parse_rules_page(notes_page)))

if __name__ == '__main__':
    # Create the "output" directory (and other directories) if they don't exist
    if not os.path.exists("output"):
        os.makedirs("output")

    # Open the index page and parse it
    with open("index.php") as f:
        # Unescape escape characters before parsing so that they appear
        # in their correct form in YAML
        index_page = BeautifulSoup(unescape(f.read()), features="html.parser")
        root = parse_index_page(index_page)
        
        with open("output/root.yaml", "w", encoding="utf-8") as f:
            yaml.dump(root, f)
    
    # Generate the YAML files for the component notes
    generate_notes(root["Component Notes"], "components")
    
    # Generate the YAML files for the faction notes
    generate_notes(root["Faction Notes"], "factions")

    # Generate the YAML files for the rules
    generate_notes(root["Rule Topics"], "rules")