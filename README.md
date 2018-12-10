# Symfony4.2.1-jwt-authentication-template

Template in Symfony 4.2.1 with jwt authentification ready to use

### Requisites

* PHP 7.1 ( will not work with php 7.2 or 7.3 )

## Getting Started

Clone the project, and install with composer, fill the .env file with a default configuration.

```
git clone https://github.com/VGzsysadm/Symfony4.2-jwt-authentication-template.git
cd Symfony4.2-jwt-authentication-template
touch .env
composer install
```
### Configuration

Inside the project directory create the jwt folder and certs: ( pass phrase will be required )

```
mkdir config/jwt
openssl genrsa -out config/jwt/private.pem -aes256 4096
openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
```
Add the following data to the file .env or system env, depending if the project is prod mode or dev mode.

```
JWT_PRIVATE_KEY_PATH=config/jwt/private.pem
JWT_PUBLIC_KEY_PATH=config/jwt/public.pem
JWT_PASSPHRASE=yourpassphrase
JWT_TOKENTTL=3600
```
Create the database

```
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
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



