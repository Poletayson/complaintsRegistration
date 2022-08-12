# complaintsRegistration
 Регистрация обращений/жалоб на поликлиники

### Запуск
Чтобы запустить приложение, нужно:
  * Запустить локально Postgresql
  * Создать базу данных **complaintsRegistration**
  * Выполнить миграцию для создания таблиц: 
    ```
    php artisan migrate
    ```
  * Выполнить команды для наполнения таблиц: 
    ```
    php artisan db:seed polyclinicsSeeder
    php artisan db:seed clientsSeeder
    php artisan db:seed reasonsSeeder
    php artisan db:seed complaintsSeeder
    ```
  * Запустить сервер:
    ```
    php artisan serve
    ```
