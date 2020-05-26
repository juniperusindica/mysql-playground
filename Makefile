up:
	docker-compose up -d
	docker exec -it playground-db service supervisor start

status:
	docker-compose ps

stop:
	docker-compose stop

reload:
	docker-compose stop && docker-compose up -d

prepare-db:
	docker exec -it playground-app php /app/commands/prepare.php
