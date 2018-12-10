# Symfony4.2.1-jwt-authentication-template

Template in Symfony 4.2.1 with jwt authentification ready to use

### Requisites

* PHP 7.1 ( will not work with php 7.2 or 7.3 )
* Mysql
* Composer

## Getting Started

Clone the project

```
git clone https://github.com/VGzsysadm/Symfony4.2-jwt-authentication-template.git
```
### Installing

Install dependencies

```
cd Inventory-app
composer install
```
### Launch test server

Modify .env file with your database information.

Create the database and tables:

```
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

Turn on the dev server:

```
php -S 127.0.0.1:8000 -t public
```

First of all, fill the script configure.php with your database params & execute the script at [https:\\127.0.0.1:8000\configure.php](https://github.com/VGzsysadm/Inventory-app/blob/master/public/configure.php)

An admin user will be created with the user: admin and the password: admin.

Please remove script after the execution.

## Built With

* [Symfony 4](https://symfony.com/doc/current/index.html)

## Bundles

* [symfony/orm-pack](https://github.com/symfony/orm-pack)

## Third party apps

* [tableExport.jquery.plugin](https://github.com/hhurz/tableExport.jquery.plugin)

## Authors

* **VGzsysadm** - *https://sysadm.es* - [@VGzsysadm](https://github.com/VGzsysadm)

## License

This project is licensed under the MIT License - see the [LICENSE.md](https://github.com/VGzsysadm/Inventory-app/blob/master/LICENSE.md) file for details


