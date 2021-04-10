# Super Basic Q&A

This little project was made as a coding challenge for applying to [Vegan Hacktivists](https://veganhacktivists.org/).

It makes use of Laravel 8 and MySQL, and requires PHP 7.4+.

## Challenge instructions

https://gist.github.com/GRardB/7e2990bbea8c2e50e2b501b712d8c169

## Demo website

http://vh-coding-challenge.pleesher.com 

Note: missing HTTPS as it's not meant to be used in any serious way!

## How to run the app locally

### Install dependencies

```
composer install
```

### Set up your environment

- Copy `.env.example` to `.env`
- Alter the `DB_*` environment variables to point to a local, empty database
  
### Create the database schema

```
php artisan migrate
```

### Run tests

```
php artisan test
```

### Serve the app

```
php artisan serve
```
