# Laravel Admin Dashboard with Bootstrap 5.3

server info
sudo systemctl restart php8.1-fpm
sudo systemctl restart nginx

database

sudo service mysql start

#use swap
sudo dd if=/dev/zero of=/swapfile bs=1024 count=1024k 

PHP 8.1.29
10.48.12

## Features

The Laravel Admin Dashboard is a web-based application that serves as a starting point for an Admin Dashboard panel, complete with User Management and Roles Permissions.

- Constructed using Laravel 10
- Incorporates Bootstrap 5.3
- Features an Authentication System
- Includes User Management with a Block/Unblock System
- Equipped with a Roles Permissions System
- Allows User Profile Viewing and Updating
- Enables User Password Changes
- More features to be added soon

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

CREATE USER 'cadoan_db_user'@'localhost' IDENTIFIED BY '2024@CaDoan';
create database cadoan_database;
GRANT ALL on cadoan_database.* to cadoan_db_user@localhost;


sudo chown -R www-data:www-data /var/www/user-management/storage /var/www/user-management/bootstrap/cache

sudo chmod -R 775 /var/www/user-management/storage /var/www/user-management/bootstrap/cache