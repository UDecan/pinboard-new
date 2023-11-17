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
6. http://127.0.0.1:888/