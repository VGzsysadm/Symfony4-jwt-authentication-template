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
DATABASE_URL=mysql://user:user_pw@localhost:3306/db_name
```
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

Grant permissions in the directory to the web user:

```
chown -R www-data Symfony4.2-jwt-authentication-template
```
Allow .htacces inside the public directory
```
<Directory /var/www/Symfony4.2-jwt-authentication-template/public>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
        </Directory>
```
## Routes
/api/register
```
curl --header "Content-Type: application/json" \
  --request POST \
  --data '{"_name":"John","_username":"administrator","_email":"John@thedev.dev","_password":"johnpassword"}' \
  192.168.1.212/api/register
```
response:
```
{
    "code": 200,
    "error": false,
    "data": {
        "id": 1,
        "name": "John",
        "email": "John@thedev.dev",
        "username": "administrator",
        "plain_password": "johnpassword",
        "roles": [
            "ROLE_USER"
        ],
        "created_at": "2018-12-10T16:10:59+01:00",
        "updated_at": "2018-12-10T16:10:59+01:00",
        "is_active": true,
        "terms_accepted": true,
        "lang": "en_EN"
    }
}
```
/api/login_check
```
curl --header "Content-Type: application/json" \
  --request POST \
  --data '{"_username":"administrator","_password":"johnpassword"}' \
  ip.address.of.host/api/login_check
```
response:
```
{"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzUxMiJ9.eyJpYXQiOjE1NDQ0NTQ3MTcsImV4cCI6MTU0NDQ1ODMxNywicm9sZXMiOlsiUk9MRV9VU0VSIl0sInVzZXJuYW1lIjoiYWRtaW5pc3RyYXRvciJ9.JLMUOJp5hXBIKwT2eO8t7A73hoDTyPfSEzX9k4VjnV44BIEedWPOz4mEK7C8vCKchV-NNf7p0kYEbZdMGKPdx8adocBSjoZNXl6rtsy9VtDjGEw7ete9G4FvbHgneuxklK94066JiYg7EEt03Zk9A4LFx1xO8o0CqR6FVY19dX-DOrjGSIKBsc0ME1L_d5F5-Xm6pa-GqLE83sjFJHFRHBa1MPeHiVUtFX4kNhcJXyJXzFlTroLXGV4gemasc_dSjBsmTrpeyqBZ63fDC9EuNsOUNdNKCXoPq-66yBN1-01zonaZomCVJuZ-OQ4yNY4XSFcXrR0Gt23i6W8pXr0yF_X_kYpag__9S5NIfH1nzEJgKw0gmGbgBKsYmJzdf0pgtXmECKF1NyV2_h4b1Zk6kgZfKZ7kzaEhFk2KtdhEvQblj_o88RXYT0LjiNznkrqX_g34UYTbwRLe7qlgY5YkGHOjySL-rnjZnsu4ukTjA8OJLO7Jvn0OM2OyBft-v1PZfcd0bbL9hO6evB7SOWhIc_gTrRWa3vJK4vnfH00bDybFHqqGue5CUEfHOzsko47upaswaJ8TUKuiSQfMycYhfdIhrBrX5qbuOvIuhwKHkjSK7tr6pb5_HubR0h6p9Fsb-Kk42y3rvpKfz_4Mr1iiQI1t9MIsZseYG4nHFINir3I"}
```
/api/v1
```
curl -H 'Accept: application/json' -H "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzUxMiJ9.eyJpYXQiOjE1NDQ0NTQ3MTcsImV4cCI6MTU0NDQ1ODMxNywicm9sZXMiOlsiUk9MRV9VU0VSIl0sInVzZXJuYW1lIjoiYWRtaW5pc3RyYXRvciJ9.JLMUOJp5hXBIKwT2eO8t7A73hoDTyPfSEzX9k4VjnV44BIEedWPOz4mEK7C8vCKchV-NNf7p0kYEbZdMGKPdx8adocBSjoZNXl6rtsy9VtDjGEw7ete9G4FvbHgneuxklK94066JiYg7EEt03Zk9A4LFx1xO8o0CqR6FVY19dX-DOrjGSIKBsc0ME1L_d5F5-Xm6pa-GqLE83sjFJHFRHBa1MPeHiVUtFX4kNhcJXyJXzFlTroLXGV4gemasc_dSjBsmTrpeyqBZ63fDC9EuNsOUNdNKCXoPq-66yBN1-01zonaZomCVJuZ-OQ4yNY4XSFcXrR0Gt23i6W8pXr0yF_X_kYpag__9S5NIfH1nzEJgKw0gmGbgBKsYmJzdf0pgtXmECKF1NyV2_h4b1Zk6kgZfKZ7kzaEhFk2KtdhEvQblj_o88RXYT0LjiNznkrqX_g34UYTbwRLe7qlgY5YkGHOjySL-rnjZnsu4ukTjA8OJLO7Jvn0OM2OyBft-v1PZfcd0bbL9hO6evB7SOWhIc_gTrRWa3vJK4vnfH00bDybFHqqGue5CUEfHOzsko47upaswaJ8TUKuiSQfMycYhfdIhrBrX5qbuOvIuhwKHkjSK7tr6pb5_HubR0h6p9Fsb-Kk42y3rvpKfz_4Mr1iiQI1t9MIsZseYG4nHFINir3I" ip.address.of.host/api/v1
```
response:
```
Logged in as administrator
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



