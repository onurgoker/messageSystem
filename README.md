# Simple Message System with Laravel

The purpose of this project to demonstrate simple message system by using Laravel PHP Framework.

# Requirements
You will need to install node package manager and composer in your system.

# Instructions
Clone the repository and execute the following command via console:

``````
composer install
``````

Set your default configurations in .env configuration file.

DB_CONNECTION=sqlite 

DB_HOST=localhost 

DB_PORT=3306 

DB_DATABASE=/home/laravel-project/database/database.sqlite 

For sqlite databases, you need to specify full path as above and place the sqlite file into root directory. 

Or skip this step and continue with the link below :)

### Database configuration
Check the following site for configuration: 

https://codeanddeploy.com/blog/laravel/how-to-use-sqlite-database-in-laravel-8-using-windows#2B9fcu1Nw6aojc7loMtho7NTv

### Migrations
Use the following command in project root directory via console to create database tables:

``````
php artisan migrate
``````

### Project Execution
Type the following command in your project root directory.

``````
php artisan serve
``````

Then check the 127.0.0.1:8000 on your browser!

# Future Works
Using blade template effectively

Tailwind css

Dockerizing the project

# Author
Onur GÖKER

info[at]onurgoker.com

www.onurgoker.com
