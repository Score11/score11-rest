# Score11
[![Build Status](https://travis-ci.org/Score11/score11-rest.svg?branch=master)](https://travis-ci.org/Score11/score11-rest)

## Prerequisites
- composer
- a http webserver
- mysql

## Installation
1. check out this repository :-)
2. Run `composer install`
3. Copy environment-configuration `copy .env.example .env`
4. Optional: customize your local config
5. Run `./setup.sh`

## Running
### Start server
simply start your mysql + http webserver
Navigate to `public` folder.

Example: running apache webserver and having all sources under `/htdocs/score11` then navigate to `http://localhost/score11/public` to get to the starting page.

### Tests
simple run `phpunit`
