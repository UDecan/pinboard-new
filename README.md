<h1>Pinboard-new</h1>

If your docker-compose version is less than 3, change the make file in 5 line `docker compose` to `docker-compose`.

1. make build
2. make up
3. make app_bash
4. php bin/console doctrine:migrations:execute --up DoctrineMigrations\\Version20231109083314
5. php bin/console doctrine:fixtures:load
<br>
Login: admin@admin.com
<br>
Password: admin
<br>
http://127.0.0.1:888/

# Cold-start

1 - запустить миграцию
2 - поменять движок бд с pinba на innodb

--------------
composer install
<br>
npm install
<br>
npm i bootstrap-icons
<br>
php bin/console doctrine:migrations:execute --up DoctrineMigrations\\Version20231109083314
<br>
php bin/console doctrine:migrations:migrate
<br>
php bin/console doctrine:fixtures:load

В конфигах mysql docker надо будет убрать это свойство навсегда.
```
docker exec -ti mysql sh
mysql -u root -p;
SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));
SET PERSIST sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));
SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));
```