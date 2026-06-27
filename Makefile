.PHONY: up import start backup

BACKUP_DIR ?= backups
BACKUP_FILE ?= $(BACKUP_DIR)/nomurakamotsu-db-$(shell date +%Y%m%d-%H%M%S).sql

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

backup:
	mkdir -p "$(BACKUP_DIR)"
	docker compose exec -T db sh -c 'mysqldump --single-transaction --quick --default-character-set=utf8mb4 -u"$$MYSQL_USER" -p"$$MYSQL_PASSWORD" "$$MYSQL_DATABASE"' > "$(BACKUP_FILE)"
	gzip -f "$(BACKUP_FILE)"
	@echo "Backup saved: $(BACKUP_FILE).gz"
