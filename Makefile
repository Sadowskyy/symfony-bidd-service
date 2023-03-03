build:
	docker compose build --pull --no-cache
up:
	docker compose up -d
stop:
	docker compose down --remove-orphans
ci:
	vendor/bin/phpstan analyse src --level 9
	bin/console --env=test dev:test-db:init
	bin/phpunit -d memory_limit=512M
test:
	bin/console --env=test dev:test-db:init
	bin/phpunit
fix:
	vendor/bin/ecs check src --fix
