# Login

> This project provides an endpoint to authenticate a user.

# Requirements

* PHP => 7.2
* Composer
* Mysql 8
* Symfony CLI

# Testing the project
If you configured the project using the script provided: http://127.0.0.1:8000/login POST

``` bash
curl --location --request POST 'http://127.0.0.1:8000/login' \
--header 'Content-Type: application/json' \
--data-raw '{
    \"email\": \"test.email@gmail.com\",
    \"password\": \"123456\"
}'
```

If you have a local installation of the tools:

``` bash
# Install dependencies 
> composer install
# Run database migrations
> php bin/console doctrine:migrations:migrate -n
# Fill the databse with mock data
> php bin/console doctrine:fixtures:load -n
# Start the development server
> symfony server:start
# Open the server
> symfony open:local
```