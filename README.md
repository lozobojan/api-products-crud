This repository contains API for working with products. Some API actions require auth. The authentication is done via JWT.

To run the app follow the steps below:

- [ ] Clone this repository
- [ ] Run `composer install` command to download and install the dependencies
- [ ] Copy the `.env.example` file into the new `.env` file
- [ ] Run `php artisan key:generate` command to generate a new application key
- [ ] Run  `php artisan jwt:secret` to generate a new JWT secret key
- [ ] Create a new MySQL database. You can call it a name you want. I suggest `products_db`
- [ ] Link the new database with the app by setting `DB_DATABASE=products_db` in your  `.env` file
- [ ] Run `php artisan migrate --seed` to create tables and populate the data
- [ ] Finally, run the `php artisan serve` to run a local development server


All the API request have `/api` prefix and `PUT`, `POST` and `DELETE` requests are protected in a way that only an authenticated and authorized user (the one with admin access) can access them. To gain access, send a `POST` request to the `/api/auth/login` endpoint with the `email` and `password` parameters.

A Postman collection for testing this API can be found here: https://drive.google.com/file/d/1FCkHM8UwcPCTHd90Z3yufJzVbsF2GRaj/view?usp=drive_link
