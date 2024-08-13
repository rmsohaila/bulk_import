# Bulk Product Import utility in Laravel

## Envoirenment Configuration

LOG_CHANNEL=single

QUEUE_CONNECTION=database

MASTER_FEED_URL=https://crawl.**********/masterfeed.php

## Commands To be used

php artisan migrate:fresh

php artisan schedule:work

php artisan queue:work
