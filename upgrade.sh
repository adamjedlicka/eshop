#!/usr/bin/env bash

set -e

docker-compose down

git pull

rm -rf temp/cache

docker-compose up --build -d

docker-compose exec -T app php vendor/bin/phinx migrate
