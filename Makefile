all: test stan stan8 phpcs
test: #launch tests
	php bin/console doctrine:fixtures:load --env=test --no-interaction
	php bin/phpunit

stan:
	./vendor/bin/phpstan analyse src

stan8:
	./vendor/bin/phpstan analyse src --level 8

phpcs:
	./vendor/bin/phpcs src
