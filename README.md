<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://binghr.io/home/wp-content/uploads/2022/03/BingHR-01-PNG-HQ-Cropped-600x206.png" width="400"></a></p>

## BingHR Exercise Solution

A take home execise solution for BingHR.io

## Requirements

- PHP >= v7.4 (Tested on PHP 7.4.26)
- MySQL >= v5.7 (Tested on MySQL 5.7.36)
- Apache >= v2.4 (Tested on PHP 2.4.51)
- Composer >= v2.2 (Tested on Composer 2.2.9)

*Preferably: Install WAMP/XAMP, LAMP or MAMP for Windows, Linux or MAC respectively to get PHP, MySQL, and Apache setup on your system. (Tested on Wampserver 3.2.6)

## Development Environment (Local Machine) Setup

1. Clone the repo: `https://github.com/ifeekz/BingHR-Exercise.git`
2. Change to project directory: `cd BingHR-Exercise`
3. Run the following command to generate your environment variable file:
  * WINDOWS OS: `copy .env.example .env`
  * Linux or MAC OS: `cp .env.example .env`
4. Setup the database credentials in the `.env` file:
    * `DB_CONNECTION=mysql` - the type of DB to use, (e.g. `mysql`, `sqlite`, etc.)
    * `DB_HOST=127.0.0.1` - your DB host name
    * `DB_PORT=3306` - your DB port
    * `DB_DATABASE=binghr` - change the value to the name of your DB
    * `DB_USERNAME=root` - change the value to your DB username
    * `DB_PASSWORD=` - add your DB password of leave empty if not required
5. Run the following commends:
	* `composer install` - to install dependencies
	* `php artisan key:generate` - to generate application key
	* `php artisan migrate` - to run database migration files
	* `php artisan serve` - to start the application
6. Finally, open the URL displayed on your terminal on the browser