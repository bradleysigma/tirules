from bs4 import BeautifulSoup
from typing import Dict

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
    for rule_category_heading in soup.find_all(['h1']):
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