cd into the project
install composer (composer install)
npm install
create a copy of .env file (without .example)
Generate an app encryption key (php artisan key:generate)
Create an empty database and fill in .env file options: DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD) with the credentials of the database
Migrate the database (php artisan migrate)
Seed the database (php artisan db:seed)
php artisan serve
