# Taekwondo management system

## System Requirements

- PHP 7.1
- MySQL 5.7
- NodeJS 8 / 10 with NPM

## How to Install

- Download project from https://github.com/CurosMJ/taekwondo-class 
- Run `composer install` (If not present, install from https://getcomposer.org/)
- Run `npm install`
- Edit `.env` file and set the database username and password (DB_USERNAME, DB_PASSWORD)
- Run `php artisan migrate`


## How to Run

- Run `npm run dev`
- Run `php artisan serve`

This command will open a new server at http://127.0.0.1:8000 which can be used to use the system.

## Default username and password

Please click on the "Login" button in top right of screen to enter admin area.

Username: test@test.com
Password: test