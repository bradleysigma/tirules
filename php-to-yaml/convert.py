from typing import Dict
from bs4 import BeautifulSoup
import json

# TODO: Move this into a separate module to start organising these functions
def parse_index_page(soup: BeautifulSoup) -> Dict:
    """
    Iterate through the index, collecting all the links (with titles).

    These will form the top level documents, and allow iteration to
    parse all of the pages.

    Args:
        soup (BeautifulSoup): The parsed index page.

    Returns:
        Dict: A two level dictionary, mapping categories to pages to locations.
    """
    pages = {}
    for rule_category_heading in index_page.find_all(['h1']):
        category_name = rule_category_heading.text
        category = {}

        list_of_pages = rule_category_heading.find_next_sibling("ol")
        if list_of_pages:
            # Skip the list items, and jump straight to the links to reduce complexity
            for page_link in list_of_pages.find_all("a"):
                page_name = page_link.text
                page_link = page_link['href']

                category[page_name] = page_link
        
        pages[category_name] = category
    
    return pages

if __name__ == '__main__':
    # Open the index page and parse it
    with open("index.php") as f:
        index_page = BeautifulSoup(f)

        # For debugging purposes, output the pages
        print(json.dumps(parse_index_page(index_page), indent=4))