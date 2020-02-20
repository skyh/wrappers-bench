IMAGE_NAME := wrappers-bench
IMAGE_VERSION := 0.1.1
IMAGE_TAG = docker.pkg.github.com/skyh/wrappers-bench/${IMAGE_NAME}:${IMAGE_VERSION}

all: test bench

.PHONY: bench
bench:
	./vendor/bin/phpbench run bench --report=aggregate --retry-threshold=10

.PHONY: test
test:
	./vendor/bin/phpunit --bootstrap=vendor/autoload.php tests

.PHONY: publish
publish:
	docker build --tag=${IMAGE_TAG} .
	docker push ${IMAGE_TAG}

.PHONY: login
login:
	docker login -u skyh docker.pkg.github.com
