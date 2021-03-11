# NRS Guillermo Gurrieri
## Desarrollo en Laravel 8.x

### Requisitos previos 
 - PHP >= 7.1.3
 - OpenSSL PHP Extension
 - PDO PHP Extension
 - Mbstring PHP Extension
 - Tokenizer PHP Extension
 - XML PHP Extension
 - Ctype PHP Extension
 - JSON PHP Extension
 - BCMath PHP Extension
 - Composer
 - Node
 - npm

## Installation

Clone repository in local machine: [https://github.com/GurrieriGuillermo/NRS-Guillermo-Gurrieri](https://github.com/GurrieriGuillermo/NRS-Guillermo-Gurrieri) 

```sh
git clone https://github.com/GurrieriGuillermo/NRS-Guillermo-Gurrieri.git
```
Install project with composer and npm

```sh
cd NRS-Guillermo-Gurrieri
composer install
npm install
```

copy .env.example and Generate APP KEY with Artisan

```sh
cp .env.example .env
php artisan key:generate
```
create database and configure .env 

run migration and seeders
```sh
php artisan migrate --seed
```

run laravel aplication

```sh
php artisan serve
```
Enjoy 😊

## users

> Only if the seeders were run, you can create other users later
USER: Admin@gmail.com
PASSWORD: admin

