## About

This is a simple RESTful API that I created to fulfill the test at surplus.id (PT Ekonomi Sirkular Indonesia).

## How To Use

Make sure your computer has PHP version 8.1 or higher, MySQL, and Composer installed. Then, follow these steps:

-   Clone this repo
    `git clone git@github.com:taufanbasri/surplus-challenge.git`

-   Move to directory
    `cd surplus-challenge`

-   Copy the environment
    `cp .env.example .env`

-   Edit the environment for the database connection

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=surplus_challenge
    DB_USERNAME=root
    DB_PASSWORD=password
    ```

-   Install composer
    `composer install`

-   Generate key
    `php artisan key:generate`

-   Create symlink
    `php artisan storage:link`

-   Start the app with:
    `php artisan serve`

-   Don't forget to edit `APP_URL` in `.env` file, for example:
    `APP_URL=http://localhost:8000`

You can start using the application by following the documentation below:
[Documentation](https://documenter.getpostman.com/view/25980738/2s93Jruizx)

## Thanks
Created by [me](https://github.com/taufanbasri) with :heart:
