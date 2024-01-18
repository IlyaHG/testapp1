*Тестовое задание *

#Installation
1. Вам нужно убедиться, что на вашем компьютере установлен PHP, Composer и Laravel. 

2. Создайте новую базу данных, MySQL, PostgreSQL.

Скачайте проект

Настройте файл .env: Создайте копию файла .env.example и переименуйте его в .env. Откройте файл .env и настройте данные для подключения к вашей базе данных

Создать базу данных так же можно при помощи этих команд:
-mysql -u root -p  (Нажмите Enter, введите пароль, если он есть, если нет, нажмите Enter еще раз).
-CREATE DATABASE ("Название базы данных, его же укажите в файле .env в строке "DB_DATABASE=").

3. Выполните команды:

- composer install (Данная команда установит зависимости)
- php artisan migrate (Выполнятся миграции базы данных)
- php artisan serve (Запустится локальный сервер Laravel)

4. Пройти по ссылке http://"ваш-домен"/import-products
