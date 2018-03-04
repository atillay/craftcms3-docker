# Craft CMS 3 (RC-13) + Docker

About CraftCMS : https://github.com/craftcms

## Quickstart
- Configure env: `cp .env.example .env` 
- Start container: `$ docker-compose up -d` 
- Enter container: `$ docker-compose exec app bash` 
    - `$ composer install` 
    - `$ craft install` 
    - `$ craft migrare/up` (optional, generates a homepage & maildev settings)
- Visit: `http://localhost:8084` (/admin to access Craft admin)

You can manage the database : `http://localhost:8085`  
You can view sent mails : `http://localhost:8086` 
