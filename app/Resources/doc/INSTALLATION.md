# Installation

## For Linux and OS X users

Download composer to install dependencies

    curl -sS https://getcomposer.org/installer | php

Install dependencies

    php composer.phar install --prefer-dist

Install assets

    php app/console assets:install web
    php app/console assetic:dump 

Run build-in PHP server in development (available since PHP 5.4)

    php app/console server:run 

Apply database migrations

    php app/console doctrine:migrations:mig 
    
Load development fixtures
    
    php app/console doc:fix:load  --append --fixtures=src/Afup/Bundle/MemberBundle/Tests/DataFixtures/ORM

Generate entities from model and configured mapping (`src/Afup/Model/Mapping`)

    php app/console generate:doctrine:entities Afup/Model --path=src
