PYTHON ?= python3
ENV_FILE ?= .env
DB_SQL ?= db.sql
COMPOSE ?= $(shell if docker compose version >/dev/null 2>&1; then printf 'docker compose'; else printf 'docker-compose'; fi)
DOCKER_ENV_FILE ?= .env.docker
COMPOSE_ENV = $(if $(wildcard $(DOCKER_ENV_FILE)),--env-file "$(DOCKER_ENV_FILE)",)
SERVICE ?=
TAIL ?= 100
BACKUP_FILE ?= perpustakaan/berkas/database-$(shell date +%Y%m%d-%H%M%S).sql

.DEFAULT_GOAL := help

.PHONY: help env setup db generate-db docker-up docker-start docker-stop docker-down \
	docker-build docker-restart docker-logs docker-logs-once docker-status \
	docker-shell docker-socket-shell docker-db docker-db-backup docker-cache-clear \
	docker-urls up down restart logs status shell

help: ## Tampilkan daftar shortcut (default saat menjalankan make).
	@printf 'Always Ngoding - shortcut lokal\n\n'
	@awk 'BEGIN { FS = ":.*## " } /^[a-zA-Z0-9_-]+:.*## / { printf "  make %-22s %s\n", $$1, $$2 }' $(MAKEFILE_LIST)
	@printf '\nAlias: make up / down / restart / logs / status / shell\n'
	@printf 'Opsi: SERVICE=app|socket|db, TAIL=200, DOCKER_ENV_FILE=.env.docker.lokal\n'
	@printf 'Database: ENV_FILE=.env, DB_SQL=db.sql, BACKUP_FILE=path/backup.sql\n'

env: ## Buat .env dan .env.docker dari contoh jika belum ada.
	@set -eu; umask 077; \
	for env_file in .env .env.docker; do \
		if [ -e "$$env_file" ] || [ -L "$$env_file" ]; then \
			printf 'Konfigurasi sudah ada: %s\n' "$$env_file"; \
		else \
			cp "$$env_file.example" "$$env_file"; \
			chmod 600 "$$env_file"; \
			printf 'Konfigurasi dibuat: %s\n' "$$env_file"; \
		fi; \
	done

setup: env ## Siapkan contoh environment lalu build dan jalankan Docker.
	@$(MAKE) docker-up

db: generate-db ## Generate db.sql untuk instalasi native dari environment aktif.

generate-db: ## Generate SQL; mendukung ENV_FILE dan DB_SQL.
	@$(PYTHON) scripts/generate_db.py --env-file "$(ENV_FILE)" --input raw_db.sql --output "$(DB_SQL)"

docker-up: ## Build dan jalankan semua layanan sampai siap.
	$(COMPOSE) $(COMPOSE_ENV) up -d --build --wait --renew-anon-volumes

docker-start: ## Jalankan layanan memakai image yang sudah tersedia.
	$(COMPOSE) $(COMPOSE_ENV) up -d --no-build --wait

docker-stop: ## Stop container; container dan volume tetap disimpan.
	$(COMPOSE) $(COMPOSE_ENV) stop $(SERVICE)

docker-down: ## Stop dan hapus container/jaringan; volume data tetap disimpan.
	$(COMPOSE) $(COMPOSE_ENV) down

docker-build: ## Build image saja; opsional SERVICE=app atau socket.
	$(COMPOSE) $(COMPOSE_ENV) build $(SERVICE)

docker-restart: ## Restart container; opsional SERVICE=app, socket, atau db.
	$(COMPOSE) $(COMPOSE_ENV) restart $(SERVICE)

docker-logs: ## Ikuti log; opsional SERVICE=app dan TAIL=200.
	$(COMPOSE) $(COMPOSE_ENV) logs --tail=$(TAIL) --follow $(SERVICE)

docker-logs-once: ## Tampilkan log terakhir sekali lalu selesai.
	$(COMPOSE) $(COMPOSE_ENV) logs --tail=$(TAIL) $(SERVICE)

docker-status: ## Tampilkan status semua layanan.
	$(COMPOSE) $(COMPOSE_ENV) ps

docker-shell: ## Buka Bash dalam container aplikasi.
	$(COMPOSE) $(COMPOSE_ENV) exec app bash

docker-socket-shell: ## Buka shell dalam container Node.js/socket.
	$(COMPOSE) $(COMPOSE_ENV) exec socket sh

docker-db: ## Buka MySQL dengan akun dan database aplikasi.
	@$(COMPOSE) $(COMPOSE_ENV) exec db sh -c 'MYSQL_PWD="$$MYSQL_PASSWORD" exec mysql --user="$$MYSQL_USER" --database="$$MYSQL_DATABASE"'

docker-db-backup: ## Export database ke SQL privat; opsional BACKUP_FILE=path.sql.
	@set -eu; umask 077; \
	backup_path="$(BACKUP_FILE)"; \
	mkdir -p "$$(dirname "$$backup_path")"; \
	backup_tmp="$$(mktemp "$$backup_path.tmp.XXXXXX")"; \
	trap 'rm -f "$$backup_tmp"' EXIT; \
	$(COMPOSE) $(COMPOSE_ENV) exec -T db sh -c \
		'MYSQL_PWD="$$MYSQL_PASSWORD" exec mysqldump --user="$$MYSQL_USER" --single-transaction --routines --triggers --events --no-tablespaces --set-gtid-purged=OFF --databases "$$MYSQL_DATABASE"' > "$$backup_tmp"; \
	mv "$$backup_tmp" "$$backup_path"; \
	printf 'Backup database disimpan: %s\n' "$$backup_path"

docker-cache-clear: ## Hapus file cache aplikasi; pertahankan berkas penjaga folder.
	$(COMPOSE) $(COMPOSE_ENV) exec -T app sh -c 'find /var/www/html/aplikasi/cache -type f ! -name index.html ! -name .htaccess -delete'

docker-urls: ## Tampilkan URL website, login, dan socket dari container aplikasi.
	@$(COMPOSE) $(COMPOSE_ENV) exec -T app sh -c 'printf "Website: %s\nPengurus: %s/area-pengurus/masuk\nAnggota: %s/masuk\nSocket: %s\n" "$$APP_URL" "$$APP_URL" "$$APP_URL" "$$ANG_SOCKET_URL"'

up: docker-up
down: docker-down
restart: docker-restart
logs: docker-logs
status: docker-status
shell: docker-shell
