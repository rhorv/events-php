init: composer.phar
	php composer.phar install --no-interaction --optimize-autoloader --prefer-dist

## Installs composer locally
composer.phar:
	curl -sS https://getcomposer.org/installer | php

