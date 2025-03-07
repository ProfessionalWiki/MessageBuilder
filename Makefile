ci: phpstan phpunit psalm
cs: phpstan psalm
test: phpunit

phpunit:
	php ./vendor/bin/phpunit -c phpunit.xml.dist

coverage-html:
	php ./vendor/bin/phpunit -c phpunit.xml.dist --coverage-html=./build/coverage/html

psalm:
	./vendor/bin/psalm

# docker run --rm --interactive --tty --volume $PWD:/app -w /app --volume ~/.composer:/composer --user $(id -u):$(id -g) composer:2 ./vendor/bin/psalm --no-cache --set-baseline=psalm-baseline.xml
psalm-baseline:
	./vendor/bin/psalm --set-baseline=psalm-baseline.xml

phpstan:
	./vendor/bin/phpstan analyse -c phpstan.neon --no-progress

stan-baseline:
	./vendor/bin/phpstan analyse -c phpstan.neon --generate-baseline
