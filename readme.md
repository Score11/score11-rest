# Score11

## Prerequisites
- composer
- a http webserver
- mysql

## Installation
1. check out this repository :-)
2. Run `composer install`
3. Copy environment-configuration `copy .env.example .env`
4. Optional: customize your local config

## Running
### Start server
simply start your mysql + http webserver
Navigate to `public` folder.

Example: running apache webserver and having all sources under `/htdocs/score11` then navigate to `http://localhost/score11/public` to get to the starting page.

### Tests
simple run `phpunit`