
## Install project

- git clone https://github.com/abanoubtalaatr/fudex.git 
- cd fudex
- composer install
- cp .env.example .env
- php artisan key:generate
- create database in local named it (fudex)
- npm install
- npm run dev
- in .env file make (DB_DATABASE=fudex)
- php artisan migrate
- php artisan db:seed
- php artisan serve
