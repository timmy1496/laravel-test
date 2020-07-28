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
   
The project will be available at http://localhost:8080

if there are problems with postgre - * `sudo chown 1001:1001 -R ./volumes
`   
   