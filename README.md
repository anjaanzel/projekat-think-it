1. cd into the 
2. install composer (composer install)
3. npm install
4. create a copy of .env file (without .example)
5. Generate an app encryption key (php artisan key:generate)
6. Create an empty database and fill in .env file options: DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD) with the credentials of the database
7. Migrate the database (php artisan migrate)
8. Seed the database (php artisan db:seed)
9. php artisan serve
