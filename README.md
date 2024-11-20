# IPSC Practice BE

## Docker
All docker commands are executed from `docker` folder.

1. Copy `.env.example` to `.env` in same folder and correct the values.
2. Run this command: `docker compose build --no-cache ipsc-be-php` when first build. 
3. After it has been built, run this command: `docker network create -d bridge app-network-ipsc-fe` to create network.

If you change any dockers `.env` variables, run first command.

## App
Then log into container: `docker exec -it ipsc-be-php sh` and follow this steps:
1. Copy `.env.example` to `.env` in same folder and correct the values.
2. `composer install`
2. generate app key: `php artisan key:generate`
3. run migrations: `php artisan migrate`
4. run role seeder: `php artisan db:seed --class=RoleSeeder`
