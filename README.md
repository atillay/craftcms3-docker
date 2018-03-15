# Craft CMS 3 (RC-14) + Docker

About CraftCMS : https://github.com/craftcms

## Quickstart
- Configure env: `cp .env.example .env` 
- Start container: `$ docker-compose up -d` 
- Enter container: `$ docker-compose exec php bash` 
    - `$ composer install` 
    - `$ craft install` 
    - `$ craft migrare/up` (optional, generates a homepage & maildev settings)
- Visit: `http://localhost:8084` (/admin to access Craft admin)

You can manage the database : `http://localhost:8085`  
You can view sent mails : `http://localhost:8086`  
You can view logs in : `docker/volumes/nginx`

## Customize PHP image
The PHP image is host on Docker Hub because first build takes a long time.  
You can use your own custom version by modifying your docker-compose.yml.
```yml
services:
    php:
        build:
            context: ./docker/php
```

### Release new version on Docker Hub
- `$ docker build -t atillay/craftcms3-php ./docker/php` 
- `$ docker push atillay/craftcms3-php` 