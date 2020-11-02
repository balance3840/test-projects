#!/bin/bash

NL=$'\n'

echo "Starting containers"
docker-compose up -d --build

echo "Waiting 20 seconds for containers to be ready."
sleep 20

echo "
============================${NL}
Login project${NL}
============================${NL}"

echo "Installing dependencies"
docker-compose run composer install

echo "Running database migrations"
docker-compose run php bin/console doctrine:migrations:migrate -n

echo "Filling the database with mock data"
docker-compose run php bin/console doctrine:fixtures:load -n

echo "
============================${NL}
User created${NL}
Email: test.email@gmail.com${NL}
Password: 123456${NL}
============================${NL}"

echo "
============================${NL}
Pig Latin project${NL}
============================${NL}"

echo "Installing dependencies"
docker-compose run node npm install

echo "Running tests"
docker-compose run node npm test

echo "
============================${NL}
JSON parse project${NL}
============================${NL}"

echo "Installing dependencies"
docker-compose run composer install --working-dir=/json-project

echo "
============================${NL}
Everything is set now.${NL}
Json project is running on http://127.0.0.1:9005${NL}
Login project is running on http://127.0.0.1:8000/login (POST) Example request:${NL}
curl --location --request POST 'http://127.0.0.1:8000/login' \
--header 'Content-Type: application/json' \
--data-raw '{
    \"email\": \"test.email@gmail.com\",
    \"password\": \"123456\"
}'${NL}
You can re-run pig Latin running docker-compose run node npm test${NL}
============================${NL}"