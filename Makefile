.PHONY: up import start

build-no-cache:
	docker compose build --no-cache

up:
	docker compose up

#開発環境起動　phpmyadminが起動
up-dev:
	docker compose --profile dev up

upd:
	docker compose up -d --build

install:
	./install.sh

cache:
	docker compose exec php php cache flush --allow-root

down:
	docker compose down

login-php:
	docker compose exec php sh

prod-upd:
	docker compose up -d --build

prod-down:
	docker compose down