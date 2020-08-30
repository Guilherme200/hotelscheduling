## Variables color
COLOR_RESET   = \033[0m
COLOR_INFO    = \033[32m
COLOR_COMMENT = \033[33m

## setup application
setup:
	@docker-compose build
	@docker-compose up -d --remove-orphans
	@docker-compose run app php -r "file_exists('.env') || copy('.env.example', '.env');"
	@docker-compose run --rm app composer install
	@docker-compose run --rm app php artisan key:generate
	@docker-compose run --rm app php artisan migrate --seed
	@docker-compose run --rm app php artisan view:clear
	@docker-compose run --rm app php artisan cache:clear
	@docker-compose run --rm app php artisan config:clear
	@docker-compose run --rm app npm install
	@docker-compose run --rm app npm run dev
	@make -s help

## clean application
clean:
	@docker-compose run --rm front rm -rf node_modules
	@docker-compose run --rm front npm cache clean --force
	@docker-compose down

## start application
start:
	@docker-compose stop
	@docker-compose up -d
	@make -s help

## stop application
stop:
	@docker-compose stop

## help application
help:
	@echo "$(COLOR_COMMENT)Aplicação: $(COLOR_RESET)http://localhost"
	@echo "$(COLOR_COMMENT)Mailcatcher: $(COLOR_RESET)http://localhost:1080"
	@echo "$(COLOR_COMMENT)Horizon: $(COLOR_RESET)http://localhost/horizon"