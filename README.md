<h4> Project Setup</h4>

* get .env file
* `docker-compose up -d`
* `composer install`
* `php artisan migrate` (run this command inside php container)
* `php artisan db:seed` (run this command inside php container)
* app/storage/framework directory must contain `cache`, `sessions`, and `views` directories. Create Them if they don't exist
* `sudo chmod -R 777 bootstrap/`

   `sudo chmod -R 777 public/`
   
   `sudo chmod -R 777 storage/`