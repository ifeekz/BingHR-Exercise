<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://binghr.io/home/wp-content/uploads/2022/03/BingHR-01-PNG-HQ-Cropped-600x206.png" width="400"></a></p>

## BingHR Exercise Solution

A take home execise solution for BingHR.io

## DEMO
<div style="position: relative; padding-bottom: 56.25%; height: 0;"><iframe src="https://www.loom.com/embed/f588846a76974e809ba72ff6e275dd4a" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe></div>

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

## UI Observations
Though the UI might applicable jus for the purpose of the test, however, for real life experience, the following observations can be deduced:
1. The `title` of the page appearing on the already clustered header of the application
2. On the create user modal, `user roles (or groups)` listed as `application module permissions`

## Recommendations
1. The title of the page should rather be placed left of the `Add User` button, which I provided a place for in the solution
2. Assigning user permissions this way (selecting individual permissions when creating user) will rather become a vague when the application grows. I recommend using a role-based as well as granular permissions to handle access control (ACL) for users. In this case, you select a user role (already created) to a user when addning a user. (And can extend granular permissions to the user if need be using a different interface)

** Hence, because of observation `No. 2` I couldn't go further to implement the permissions strategy as found in the UI/UX. Here are my reasons:
- The users list table clearly indicated what type a user is on `column 2` of the table.
- But, on the add user modal, roles are been listed as system modules which are to be assigned `read/write/delete` permissions.

## TO DO
Aside using Vue.js to implement the CRUD opreations, I would have loved to do the following if I had extra time.
* Implement a content load like facebook, instagram, etc for the initial take of data loading using Vue.
* Add pagination to the user table list using Vue.
* Implement multiple delete of selected users.
* Using the `principle of least privilege` to implement the proposed role-based as well as granular permissions.