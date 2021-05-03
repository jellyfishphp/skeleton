APPLICATION_ENV ?= development

.PHONY: help
help: ## Show this help
	@egrep -h '\s##\s' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-40s\033[0m %s\n", $$1, $$2}'

.PHONY: ci
ci: composer-install generate-classes phpcs phpstan codeception ## Run ci tasks

.PHONY: dev
dev: composer-install generate-classes install-road-runner ## Run dev tasks

.PHONY: build
build: composer-install generate-classes phpcs phpstan codeception composer-install-nodev composer-dump-autoload install-road-runner ## Run build tasks

.PHONY: codeception
codeception: ## Run codeception
	./vendor/bin/codecept run

.PHONY: phpstan
phpstan: ## Run phpstan
	./vendor/bin/phpstan analyze ./src/Tentacle -l 7

.PHONY: phpcs
phpcs: ## Run phpcs
	./vendor/bin/phpcs --exclude=Generic.Files.LineLength --standard=vendor/squizlabs/php_codesniffer/src/Standards/PSR12/ruleset.xml ./src/Tentacle

.PHONY: composer-install
composer-install: ## Run composer install
	composer install

.PHONY: composer-install-nodev
composer-install-nodev: ## Run composer install (without dev dependencies)
	composer install --no-dev

.PHONY: composer-update
composer-update: ## Run composer install
	composer up

.PHONY: composer-dump-autoload
composer-dump-autoload: ## Run composer dump-autoload
	composer dump-autoload -a -o

.PHONY: generate-classes
generate-classes: ## Generate transfer classes
	APPLICATION_ENV=$(APPLICATION_ENV) ./vendor/bin/console transfer:generate

.PHONY: install-road-runner
install-road-runner: ## Install road runner
	./vendor/bin/rr get -n
	chmod +x rr

.PHONY: docker-start
docker-start: ## Start docker and docker-sync
	cd docker && docker-sync start && docker-compose up -d

.PHONY: docker-stop
docker-stop: ## Stop docker and docker-sync
	cd docker && docker-compose stop && docker-sync stop
