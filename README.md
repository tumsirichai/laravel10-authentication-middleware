# Laravel Post 
Post CMS and Simple Authentication.

## Server Requirements
- PHP 8.2.x
- Laravel 10.x
- MariaDB
- Docker

## Setup

```shell
docker-compose up -d # run docker
docker exec -it laravel10_phpfpm bash # access to execution in container
composer install # install laravel in container
php artisan migrate # setup database
npm install && npm run dev # run Vite outside container
```

## Laravel Packages
- Breeze
- Sanctum
