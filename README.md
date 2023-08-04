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
docker exec -it laravel10_post bash # access to execution in container
composer install # install laravel in container
php artisan key:generate # generate an app key
php artisan migrate # setup database
npm install && npm run dev # run Vite outside container
```

## Laravel Packages
- Breeze
- Sanctum
- Swagger

### cloudinary
https://github.com/cloudinary-devs/cloudinary-laravel
- cloudinary-labs/cloudinary-laravel
- cloudinary/cloudinary_php
