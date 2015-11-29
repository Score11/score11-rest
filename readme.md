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
6. Setup mysql scheme for your local app
    - Run `mysql -e "create database score11;" -uroot`
    - import dump to `score11` scheme or run `php artisan migrate` on laravel root directory
7. Setup mysql scheme for unit tests
    - Run `mysql -e "create database score11_testing;" -uroot`
    - Run `php artisan --database=mysql_testing migrate` on laravel root directory

## Running
### Start server
simply start your mysql + http webserver
Navigate to `public` folder.

Example: running apache webserver and having all sources under `/htdocs/score11` then navigate to `http://localhost/score11/public` to get to the starting page.

### Tests
simple run `phpunit`
