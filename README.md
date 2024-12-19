Laravel Project

This project is a skeleton application built on the Laravel framework. It provides a setup for a modern Laravel-based application with support for file uploads, database seeding, and media management.

Features
	•	Laravel Framework: Version 11.x
	•	PHP 8.2+: Modern PHP features supported
	•	MySQL 8: For database management
	•	Media Management: Powered by Spatie’s Media Library
	•	Query Builder: Advanced query filtering with Spatie’s Laravel Query Builder
	•	Seeding: Preloaded with example articles and associated media
	•	Docker Support: Full containerized setup with Laravel Sail
	•	Frontend Development: Requires Node.js 22+ for asset compilation

Prerequisites

Ensure the following are installed on your system:
	•	PHP: Version 8.2 or higher
	•	MySQL: Version 8
	•	Node.js: Version 22 or higher
	•	Composer: Latest version
	•	Docker: (Optional, for Laravel Sail)

Installation

Follow the steps below to set up and run the project:

1. Clone the Repository

git clone <repository_url>
cd <repository_folder>

2. Install Dependencies

composer install
npm install

3. Configure Environment

Copy the example environment file and update the configuration:

cp .env.example .env

Update the .env file with your database, application, and media storage settings.

4. Run Database Migrations

php artisan migrate

5. Seed the Database

Seed the database with example articles and media:

php artisan db:seed --class=ArticleSeeder

Serving the Application

Using Local PHP Server
	1.	Start the development server:

php artisan serve


	2.	In a separate terminal, compile frontend assets:

npm run dev



Using Laravel Sail (Docker)
	1.	Pull and build the containers:

sail up -d


	2.	Install dependencies with Docker:

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs


	3.	Run migrations:

sail artisan migrate


	4.	Start the frontend dev server:

npm run dev

Development Commands
	•	Artisan: Laravel’s command-line tool

php artisan <command>


	•	Frontend Assets:

npm run dev


	•	Docker (Sail):

sail <command>

Included Composer Packages
	•	Spatie Media Library: Simplifies file uploads and management
	•	Spatie Query Builder: Advanced query filtering
	•	Laravel Tinker: Interactive shell for Laravel

Example Seeder

The project includes an example seeder (ArticleSeeder) that:
	•	Creates 5 articles using Faker
	•	Associates random images from the public/images directory with each article

Requirements Summary

Software	Version
Laravel Framework	11.x
PHP	8.2 or higher
MySQL	8
Node.js	22 or higher

Running Seeder

To populate the database with example articles:

php artisan db:seed --class=ArticleSeeder

Ensure that the public/images directory contains valid image files (jpg, jpeg, png).

Contribution

Feel free to fork the repo and submit pull requests for improvements or new features.

License

This project is licensed under the MIT License.
