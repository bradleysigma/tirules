# Setup

## Windows

To fix permissions errors, run `poetry config virtualenvs.in-project true` to store the `.venv` locally.

To activate the virtual environment, run `.\.venv\Scripts\activate.ps1` (see [this issue](https://github.com/python-poetry/poetry/issues/10253) for why `poetry env activate` doesn't work).