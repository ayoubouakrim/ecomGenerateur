#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

echo "generating application key..."
php artisan key:generate --show

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate:reset

php artisan migrate --path=database/migrations/2014_10_12_000000_create_users_table.php
php artisan migrate --path=database/migrations/2014_10_12_100000_create_password_resets_table.php
php artisan migrate --path=database/migrations/2019_08_19_000000_create_failed_jobs_table.php
php artisan migrate --path=database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php
php artisan migrate --path=database/migrations/2024_11_13_150547_create_template_table.php
php artisan migrate --path=database/migrations/2024_11_13_150502_create_user_input_table.php
php artisan migrate --path=database/migrations/2024_11_13_150647_create_type_table.php
php artisan migrate --path=database/migrations/2024_11_13_150617_create_component_table.php
php artisan migrate --path=database/migrations/2024_11_13_150731_create_component_content_table.php 
