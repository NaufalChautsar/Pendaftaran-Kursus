<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<br></br>
### Prepare dependencies
    - composer install / update
    - cp .env.example .env

### Change Database Config
    Change Database configuration in .env

### Generate and Migration
    - php artisan key:generate
    - php artisan migrate
    - php artisan db:seed --class=AdminSeeder

### Run PHP Development Server
    - php artisan serve
