# files-scraper
File-Scraper with deep data structure

File Scraper enables to preserve only desired files from deep project data structure.

Author: Valentin Knoll

- You don't need any external packages, just basic PHP programming language.

In files-scraper.php file you only need to change 3 parameters:
- $from = path to the data folder
- $to = path to the target folder
- $extension = file extension what will be scraped

Script pulls all files with selected file extension from Proekt and saves in destination folder, no matter how deep is nesting.

An example of starting a PHP server:
- $ php -S localhost:8000 files-scraper.php
- $ php -S 0.0.0.0:8000 files-scraper.php

Or via console: php files-scraper.php
