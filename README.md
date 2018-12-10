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
## Built With

* [Symfony 4](https://symfony.com/doc/current/index.html)

## Bundles

* [symfony/orm-pack](https://github.com/symfony/orm-pack)
* [lexik/jwt-authentication-bundle](https://github.com/lexik/LexikJWTAuthenticationBundle)
* [lcobucci/jwt](https://github.com/lcobucci/jwt)
* [jms/serializer-bundle](https://github.com/schmittjoh/JMSSerializerBundle)
* [friendsofsymfony/rest-bundle](https://github.com/FriendsOfSymfony/FOSRestBundle)
* [sensio/framework-extra-bundle](https://github.com/sensiolabs/SensioFrameworkExtraBundle)
* [nelmio/api-doc-bundle](https://github.com/nelmio/NelmioApiDocBundle)
* [twig](https://github.com/twigphp/Twig)
* [Symfony Assets](https://github.com/symfony/asset)
* [Symfony validator](https://github.com/symfony/validator)



