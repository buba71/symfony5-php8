[![Symfony 5 CI test](https://github.com/buba71/symfony5-php8/actions/workflows/symfony5-ci.yml/badge.svg)](https://github.com/buba71/symfony5-php8/actions/workflows/symfony5-ci.yml)
# SYMFONY5-PHP8 
This project shows an example of symfony security component on domain driven design(DDD).

## Installation

````
composer install

symfony console doctrine:database:create

symfony console doctrine:schema:upadte --force
````

## Functional tests

````
symfony console doctrine:database:create --env=test

make all
````

