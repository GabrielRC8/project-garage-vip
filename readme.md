# Project Starter

Initial project for freelancers

## Installation

```
$ docker-compose build
$ docker-compose up -d
$ docker ps
$ docker exec -it 5bf01106a779 bash
$ php composer.phar install
$ cp .env.example .env
$ php artisan key:generate
```

Config .env file

```
$ php composer.phar dump-auto
$ php artisan migrate
$ php artisan db:seed --class="CidadesSeeder"
```

Permissions

```
$ chgrp -R www-data storage bootstrap/cache
$ chmod -R ug+rwx storage bootstrap/cache
```

Access http://localhost:8090/public/

