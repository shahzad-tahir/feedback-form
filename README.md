<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About Feedback Form

A customer feedback form with QR Code generation related to a specific vehicle. The project contains a Dashboard of all the feedbacks along with reports.

## Installation

Install all Laravel dependencies via composer
```
composer install
```

Install all JS dependencies via composer
```
npm install && npm run dev
```

Then create a environment file using this command-
```
cp .env.example .env
```

Then edit `.env` file with appropriate credential for your database server. Just edit these three parameters(`DB_USERNAME`, `DB_PASSWORD`, `DB_DATABASE`).

Then create a database named `feedback_db` in phpmyadmin or Mysqlworkbench whichever is configured and then do a database migration using this command-
```
php artisan migrate --seed
```

Generate application key, which will be used for password hashing, session and cookie encryption etc.
```
php artisan key:generate
```

Cache the updated config by running this command
```
php artisan config:cache
```

## Run server

Run server using this command-
```
php artisan serve
```

Then go to `http://localhost:8000` from your browser and see the app.

Login Credentials are `admin@feedback.com` `12345678`

### Follow these steps in case of deploying the code to hosting.

Edit `.env` file and update these parameters:
* Update `APP_NAME` to the desired name you want for your application e.g "Feedback Management System"
* Update `APP_ENV` value to `production`.
* Update `APP_DEBUG` value to `false`
* Update `APP_URL` value according to your domain name root url




