Framework: Laravel
Requirements: LAMP or XAMPP, Laravel framework

-------------------------------------------
Initialize for development: 
-------------------------------------------
- clone repository to webservice directory
- chown and chmod
-------------------------------------------

-------------------------------------------
bash:
-------------------------------------------
cd directoryToProject/kochen
composer install
cp .env.example .env
restart apache service
php artisan cache:clear
php artisan config:cache
php artisan key:generate
-------------------------------------------

website default port 8000: http://localhost:8000

-------------------------------------------
to configure your databse connection
-------------------------------------------
edit /kochen/.env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= //yourDatabaseName
DB_USERNAME= //databaseUser
DB_PASSWORD= //databsePassword
-------------------------------------------

bash:
-------------------------------------------
php artisan migrate:fresh --seed
php artisan serve
-------------------------------------------
