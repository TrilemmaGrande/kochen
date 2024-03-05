Framework: Laravel<br>
Requirements: LAMP or XAMPP, Laravel framework<br>

-------------------------------------------
Initialize for development: 
-------------------------------------------
- clone repository to webservice directory<br>
- chown and chmod
-------------------------------------------
bash:
-------------------------------------------

cd directoryToProject/kochen<br>
composer install<br>
cp .env.example .env<br>
restart apache service<br>
php artisan cache:clear<br>
php artisan config:cache<br>
php artisan key:generate<br>

-------------------------------------------

website default port 8000: http://localhost:8000<br>

-------------------------------------------

to configure your databse connection
-------------------------------------------
edit /kochen/.env:<br>

DB_CONNECTION=mysql<br>
DB_HOST=127.0.0.1<br>
DB_PORT=3306<br>
DB_DATABASE= //yourDatabaseName<br>
DB_USERNAME= //databaseUser<br>
DB_PASSWORD= //databsePassword<br>

-------------------------------------------

bash:
-------------------------------------------
php artisan migrate:fresh --seed<br>
php artisan serve<br>

-------------------------------------------
