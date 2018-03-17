# Craft CMS 3 (RC-15) + Docker

About CraftCMS : https://github.com/craftcms  
Download Docker : https://www.docker.com/community-edition#/download

## :rocket: Quickstart
- Configure env: `$ cp .env.example .env` 
- Start container: `$ docker-compose up -d` 
- Enter container: `$ docker-compose exec php bash` 
    - `$ composer install` 
    - `$ craft install` 
    - `$ craft migrate/up` (optional, generates a homepage & mail settings)

> Website : `http://localhost:8080`  
> PhpMyAdmin : `http://localhost:8081`  
> Mail catcher : `http://localhost:8082`  
> Logs : `log/access.log` and `log/error.log`

:warning: Always run commands from container (ex: `docker-compose exec php bash` then `composer require guzzlehttp/guzzle`)

## :whale: Customize PHP image
The PHP image is host on Docker Hub because first build takes a long time.  
You can use your own custom version by modifying your docker-compose.yml.
```yml
services:
    php:
        build:
            context: ./docker/php
```
___
**Release new version on Docker Hub :**
1. `$ docker build -t atillay/craftcms3-php ./docker/php` 
2. `$ docker push atillay/craftcms3-php` 