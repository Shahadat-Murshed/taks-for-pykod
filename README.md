<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Backend for the Basic Accounting Management System

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Requirements

-   PHP: v8.3.\*
-   Laravel: v11.\*
-   MySQL: v10.11.\*
-   or MariaDB: v10.11._
    = or SQLite: v3.4_._ / v3.3_.\*

## 🚀 How to Use

1.  **Clone Repository or Download**

    ```bash
    $ git clone https://github.com/Shahadat-Murshed/task-for-pykod.git
    ```

2.  **Setup**

    ```bash
    # Go into the repository
    $ cd task-for-pykod

    # Install dependencies
    $ composer install

    # Open with your text editor
    $ code .
    ```

3.  **.ENV**

    Rename or copy the `.env.example` file to `.env`

    ```bash
    # Generate app key
    $ php artisan key:generate
    ```

4.  **Setup Database**

    Setup your database credentials in your `.env` file.

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=task_pykod
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5.  **Seed Database**

    ```bash
    $ php artisan migrate:fresh --seed

    # Note: If showing an error, please try to rerun this command.
    ```

6.  **Link the storage folder with public folder**
    ```
    php artisan storage:link
    ```
7.  **Run Server**

    ```bash
    $ php artisan serve
    ```

Enjoy
