# Cakes shop :cake:
Simple cake shop
# Системные требования
| ПО | Версия |
|------------|:---------:|
| PHP | >= 7.3  |
| MySQL | >= 10.4  |
| Apache2 | >= 2.4  |
| Composer | >= 2.0.8  |
# Установка прокекта
После клонирования проекта ножно выгрузить все зависимости. Для этого выполните комманду `composer install` в каталоге с проектом.
# Настройка базы данных
Достаточно импортировать `cakesDB.sql` в существующую БД и настроить соединение в Laravel.
# Настройка Apache2 и Hosts
Нужно добаить запись к виртуальным хостам Apache и указать верный путь до каталога `public`
```
<VirtualHost *:80>
    ServerAdmin admin@cakes_server.com
    DocumentRoot "путь_к_каталогу_public"
    ServerName cakes.com
    ErrorLog "logs/dummy-host2.example.com-error.log"
    CustomLog "logs/dummy-host2.example.com-access.log" common
	<Directory "путь_к_каталогу_public">
		Options Indexes FollowSymLinks
		AllowOverride All
		Require all granted
	</Directory>
</VirtualHost>
```
Так же нужно добавить в файл `hosts` запись `127.0.0.1		cakes.com`
# Готово
Теперь в адрессную строку браузера можно написать `cakes.com` и вы в магазини с торитками