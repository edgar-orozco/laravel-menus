# laravel-menus
Database Driven Laravel Menus

Instalation
===========

Or with composer command:

    composer require "edgar-orozco/laravel-menus": "*"

Add provider to your app/config/app.php providers:

    'EdgarOrozco\LaravelMenus\LaravelMenusServiceProvider',

Install migrations:

    php artisan migrate --package="edgar-orozco/laravel-menus"
