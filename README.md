<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## clone repository

```
cd <folder>
git clone https://github.com/kengketa/teaching-materials.git .
```

## Prepare ENV

```
cp .env.example .env
```

## build docker comtainer

```
docker compose up -d --build
```

## enter docker container

```
docker exec -it <CONTAINER_ID> /bin/bash
```

## install composer (inside container)

```
composer install
```

## generate app keys and migrate

```
php artisan key:generate
php artisan migrate:fresh --seed
```

## exit container

```
exit
```

## install node libs

```
npm install
npm run build
npm run dev
```

## restart docker

```
docker compose down
docker compose up -d
```

## เข้า web

```
http://localhost:8000
```

## เข้า db

```
http://localhost:8888
server:mysql
user:root
password:password
```
