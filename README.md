<h1>Pinboard-new</h1>

#- make app_bash
- docker exec -ti --user=root php-fpm bash
- composer install
- apk add --update npm