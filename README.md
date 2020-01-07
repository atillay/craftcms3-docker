# Craft CMS 3 + Docker
> Get started playing with Craft CMS 3 in a few command lines with Docker

About CraftCMS : https://github.com/craftcms  
Download Docker : https://www.docker.com/community-edition#/download

## :rocket: Quickstart
- Configure env: `$ cp .env.example .env` 
- Start container: `$ docker-compose up -d` 
- Enter container: `$ docker-compose exec php bash` 
    - `$ composer install` 
    - `$ craft install` 

| Service      | Path                    |
| ------------ | ----------------------- |
| Website      | `http://localhost:8080` | 
| PhpMyAdmin   | `http://localhost:8081` |
| Mail catcher | `http://localhost:8082` |
| Logs         | `log/`                  |

:warning: Always run commands from container (ex: `docker-compose exec php craft` or `docker-compose exec php composer require guzzlehttp/guzzle`)

## :up: Craft update process
- Get the latest version number : https://github.com/craftcms/cms/releases
- Change `craftcms/cms` version in `composer.json`
- Start and enter container (cf: Quickstart)
- Run `$ composer update`
- Run `$ craft migrate/all`

## :tent: Use a virtual host
- Run `$ sudo nano /etc/hosts` and add `127.0.0.1   myhost.local`
- Modify `.env` and set `SITE_URL=myhost.local` + `CRAFT_PORT=80`
- Run `$ docker-compose up`
- If it fails make sure no service like Apache is running on port 80 

## :whale: Customize PHP or Nginx image
The PHP and Nginx images are host on Docker Hub because first build takes a long time.  
You can use volume in `docker-compose.yml` to override files in images  
The docker images sources are available : https://github.com/atillay/docker-images/tree/master/craftcms3

## About MySQL credentials
If you change mysql credentials in .env you have to re-create mysql container:
- Database will be deleted, make a dump with PhpMyAdmin
- Remove db folder  : `$ rm -rf docker/db`
- Run : `docker-compose up` 
- Re-import your database on PhpMyAdmin
___
**Release new version on Docker Hub :**  
`$ docker build -t atillay/craftcms3-php ./docker/php`  
`$ docker push atillay/craftcms3-php` 
