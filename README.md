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

