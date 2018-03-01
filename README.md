# Craft CMS 3 (RC-13) + Docker

## Quickstart
- Configure env: `cp .env.example .env` 
- Start container: `$ docker-compose up -d` 
- Enter container: `$ docker-compose exec app bash` 
    - `$ composer install` 
    - `$ craft install` 
    - `$ craft migrare/up` (optional, generates a homepage)
- Visit: `http://localhost:8084/admin`