# API

This REST API is build using Laravel 8

![Logo Laravel](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg "Logo Laravel")

## Requirements:

- PHP ^7.3
- Composer
- MySQL / MariaDB

### Steps

Clone the GIT repository into your local computer and install everything

```bash
git clone https://github.com/abilioposada/API.git

cd API

composer install

php artisan key:generate
```

Set up the `.env` file with your own credentials information and make sure to create the database in your DBMS

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=root
DB_PASSWORD=password
```

Run the migrations and seeders

```bash
php artisan migrate --seed
```

Update PHPUnit variables in `phpunit.xml`

```XML
<server name="DB_CONNECTION" value="mysql"/>
<server name="DB_DATABASE" value="database"/>
```

Run the tests (Is not necessary the server to be running)

```bash
php artisan test
```

Run the server

```bash
php artisan serve
```

Browse to http://127.0.0.1:8000/api/authors from your REST client

**If you want to see all availables routes, run: `php artisan r:l`**

Download the [REST Client](URL: "https://github.com/abilioposada/APP" ) for this project