install:
	composer install

test:
	composer exec phpunit tests

lint:
	composer exec phpcs -- --standard=PSR12 src tests --colors

lint-fix:
	composer exec phpcbf -- --standard=PSR12 src tests --colors
