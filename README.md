# Portfolio CMS

===========================================================

### Database

![iamgedemo](https://res.cloudinary.com/dadvtny30/image/upload/v1729098782/database/umrpnpvdw9oekzz8tl9o.png)

### Features :

-   ... Updating

### How to run the app (Development Environment)

1. Clone the repo and cd into it
2. Run `composer install` local dev environment (php version 8.2.12)
3. Copy `.env.example` file to `.env`
4. Update your `.env` file your password :
    ```env
    DB_PASSWORD = YOUR PASSWORD
    ```
5. Run command `php artisan key:generate`
6. In your terminal `php artisan serve`
7. Visit `localhost:8000` or `127.0.0.1:8000` in your browser

#### Requirements installation and configuration for Docker

-   **Docker**
-   **In project root run**: docker-compose up -d.
-   **Install laravel packages**: composer install
-   **Create .env file** Copy .env.example file to .env
-   **ENV**: rename DB_HOST=127.0.0.1 to DB_HOST=mysql and DB_PASSWORD
-   **Container ssh**: docker-compose exec php sh
-   **Run migrations**: php artisan:migrate:fresh --seed.

#### App demo :

-   Updating ...

### Screen :

![iamgedemo](https://res.cloudinary.com/dadvtny30/image/upload/v1730436687/portfolio/project/t3kzfgrhi5wlgt0effaf.png)

### Read the documentation

Read [the documentation of laravel](https://go.dev/doc/).
Read [the documentation of Datatable](https://gin-gonic.com/docs/)

## Author Contact

Contact me with any questions!<br>

Email: anquoc18092003@gmail.com
Facebook: https://www.facebook.com/tranphuocanhquoc2003

<p style="text-align:center">Thank You so much for your time !!!</p>
