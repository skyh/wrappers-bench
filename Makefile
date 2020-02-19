all: test bench

.PHONY: bench
bench:
	./vendor/bin/phpbench run bench --report=aggregate --retry-threshold=10

.PHONY: test
test:
	./vendor/bin/phpunit --bootstrap=vendor/autoload.php tests
