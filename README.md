Market Trade Processor REST API
========================

This is an demo of a Market trade processor which consumes trade messages via an endpoint in Symfonye

1) Downloading the code
----------------------------------

Clone the repo and then use composer to handle all the needed package dependencies.

If you don't have Composer yet, download it following the instructions on
http://getcomposer.org/ or just run the following command:

    curl -s http://getcomposer.org/installer | php


2) Checking your System Configuration
-------------------------------------

Before starting coding, make sure that your local system is properly
configured for Symfony.

Execute the `check.php` script from the command line:

    php app/check.php

3) Configuring the ORM
--------------------------------

php app/console doctrine:database:create
php app/console doctrine:schema:create

4) Unit Test
--------------

bin/phpunit -c app

5) Server run
--------------
php app/console server:run

6) Try the app
----------------
Send messages:
    curl -X POST -d '{"userId": "134956","currencyFrom": "EUR","currencyTo": "GBP","amountSell": 1000,"amountBy": 747.1,"rate": 0.7471,"timePlaced": "2015-01-31 10:27:44","originatingCountry": "FR"}' http://localhost:8000/api/v1/messages.json --header "Content-Type:application/json" --user user:userpass

Messages sent:
    http://localhost:8000/api/v1/messages.json


Enjoy!


