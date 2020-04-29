An online Pizza ordering application

Frontend - React JS
Backend - Laravel


Getting Started

Follow the below intructions to run this application on local environment



1 Git Clone the repository

```sh
git clone https://github.com/sumitsouda1987/pizzatest.git

```


2 Front End (React App)

2.1 web folder contains the react code

```sh
cd web
```

2.2 Installed the required packages for this app on local environment

```sh
npm Install
```

2.3 Start local server

This will open the browser with "http://localhost:3000";
```sh
npm start
```


3 Back-end (Admin Panel + Api )

3.1 Go back and enter into the "pizza" directory

```sh
cd pizza
```

3.2 Install laravel installer

```sh
composer global require "laravel/installer"
```

3.3 Create database for the application e.g pizzastore

3.4 Open .env file and change the db settings 

```sh
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=pizzastore
DB_USERNAME=root
DB_PASSWORD=
```

3.5 Run following command to install neccessary packages

```sh
composer install
```

3.6 Create db tables from migrations

```sh
php artisan migrate
```

3.7 Make sure you have linked your storage directory

```sh
php artisan storage:link
```

3.8 Generate Keys

```sh
php artisan key:generate
```

3.9 cache the configs

```sh
php artisan config:cache
```

3.10 Run the application

```sh
php artisan serve
```

3.11 Passport key generation

```sh
php artisan passport:install
```

Note - After all these instruction, if found something like file found in storage directory
Run following commands

```sh
php artisan config:clear
php artisan cache:clear
php artisan config:cache
php artisan serve
```
