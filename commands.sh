#!/usr/bin/env bash
set -ex
set -o pipefail

generate() {
  laravel new first_laravel_site
}

mig() {
  php artisan migrate
}

dev() {
  mig
  install
  php artisan serve
}

host=http://localhost:8000

queryStr() {
  curl $host/?name=Goodwin
}

controller() {
  php artisan make:controller PagesController
}

usersController() {
  php artisan make:controller UsersController
}

compFile=docker-compose.yml

post() {
  docker-compose -f $compFile build
  docker-compose -f $compFile up
}

repost() {
  set +e
  for c in eloquent_php_postgres; do
    docker kill $c
    docker rm $c
  done
  set -e
  post
}

u() {
  curl $host/user
}

ua() {
  curl $host/addUser
}

addlog4php() {
  composer require apache/log4php
}

install() {
  composer install
}

g() {
  curl $host/group
}

"$@"
