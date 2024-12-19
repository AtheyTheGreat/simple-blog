# Laravel Simple Blog Project

Javaabu Inteview Assessment.

## Features

- **Laravel Framework:** Version 11.x
- **PHP 8.2+:** Modern PHP features supported
- **MySQL 8:** For database management
- **Media Management:** Powered by Spatie’s Media Library
- **Query Builder:** Advanced query filtering with Spatie’s Laravel Query Builder
- **Seeding:** Preloaded with example articles and associated media
- **Docker Support:** Full containerized setup with Laravel Sail
- **Frontend Development:** Requires Node.js 22+ for asset compilation

---

## Prerequisites

Ensure the following are installed on your system:

- **PHP:** Version 8.2 or higher
- **MySQL:** Version 8
- **Node.js:** Version 22 or higher
- **Composer:** Latest version
- **Docker:** (Optional, for Laravel Sail)

---

## Installation

Follow the steps below to set up and run the project:

1. Clone the Repository

git clone <repository_url>
cd <repository_folder>

3. Install Dependencies
   
composer install
npm install

5. Configure Environment
Copy the example environment file and update the configuration:

cp .env.example .env

Update the .env file with your database, application, and media storage settings.

4. Run Database Migrations
   
php artisan migrate

6. Seed the Database
Seed the database with example articles and media:

php artisan db:seed --class=ArticleSeeder

Serving the Application
Using Local PHP Server Start the development server:

php artisan serve

In a separate terminal, compile frontend assets:

npm run dev


Using Laravel Sail (Docker)
Install dependencies with Docker:

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs


Pull and build the containers:

sail up -d

    
Run migrations:

sail artisan migrate


Start the frontend dev server:

npm run dev


Requirements Summary
Software	Version
Laravel Framework	11.x
PHP	8.2 or higher
MySQL	8
Node.js	22 or higher
Running Seeder
To populate the database with example articles:

php artisan db:seed --class=ArticleSeeder
Note: Ensure that the public/images directory contains valid image files (e.g., .jpg, .jpeg, .png).





