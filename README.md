# Back-office AFUP

## Installation

For linux and OS X users

Download composer to install dependencies

    curl -sS https://getcomposer.org/installer | php

Install dependencies

    php composer.phar install --prefer-dist

Install assets

    php app/console assets:install web
    php app/console assetic:dump 

Run build-in PHP server in development (available since PHP 5.4)

    php app/console server:run 
