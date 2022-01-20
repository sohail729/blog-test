# Setup Guide

1. Create local database with name `blog`.
2. Clone project `git clone https://github.com/sohail729/blog-test.git`.
3. Rename `.env.example` to `.env`.
4. Set `DB_DATABASE` to `blog` and `DB_USERNAME` & `DB_PASSWORD` to local phpmyadmin credentials in `.env` file.
5. Run `composer install` in terminal inside the folder.
6. Run `php artisan key:generate` to set application key.
7. Now run `npm install && npm run dev` to install and compile frontend-dependencies. 
8. Run `php artisan migrate:fresh --seed` to fill database with fake data. 
9. Start laravel development server `php artisan serve`.

```
Admin Dashboard:
URL -> http://127.0.0.1:8000/admin
Email -> admin@blog.com
Password -> admin0101

Blog:
http://127.0.0.1:8000/
```
>  #### PHP Version Requirment `>=7.3`
