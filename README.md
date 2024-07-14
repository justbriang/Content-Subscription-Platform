# Content Subscription Platform

This Laravel project is designed to allow users to subscribe to websites and receive notifications via email whenever new posts are published. It includes functionalities for creating posts, subscriptions, and handling background email notifications.

## Features

- **Create Posts**: Admins can add new posts to their subscribed websites.
- **Subscribe**: Users can subscribe to websites to receive updates.
- **API Documentation**: Automatically generated with Scribe.
- **Automated Tests**: 
- **Email Notifications**: Subscribers receive email notifications about new posts asynchronously through queued jobs intiated through laravel's command utility.

### Prerequisites

What things you need to install the software and how to install them:

- PHP >= 7.4
- Composer
- Laravel >= 11.0
- A database system (MySQL, PostgreSQL)
- Node.js and NPM (for compiling assets)


## Getting Started

Clone the project repository by running the command below if you use SSH

```bash
git clone git@github.com:justbriang/Content-Subscription-Platform.git
```

If you use https, use this instead

```bash
git clone https://github.com/justbriang/Content-Subscription-Platform.git
```

After cloning,run:

```bash
composer install
```

Duplicate `.env.example` and rename it `.env`

Then run:

-   setup your environement variable for your database and meilisearch
-   Run:

    ```bash
    php artisan key:generate
    ```

-   Run Database Migrations and Seeders

-   Be sure to fill in your database details in your `.env` file before running the migrations:

    ```bash
    php artisan migrate --seed
    ```

-   To run tests , execute:

    ```bash
    php artisan test
    ```


-   And finally, start the application:

    ```bash
    php artisan serve
    ```

-   visit [http://localhost:8000/](http://localhost:8000/) to see the application in action.




Alternatively, check out this repo here[https://github.com/justbriang/laravel-docker-local-env] for a template that I use to run laravel application on docker
Instructions on how to set it up are on the repository.


##Usage

-  Generate API Documentation

    ```bash
    composer require knuckleswtf/scribe
    ```

-  Publish the config file by running:

    ```bash
    php artisan vendor:publish --tag=scribe-config
    ```

-  Generate API Documentation

    ```bash
    php artisan scribe:generate

    ```

-   visit [http://localhost/docs/index.html/](http://localhost/docs/index.html/) to see the api documentation in action.

### Alternatively

Use the api endpoints on a tool like postman to create a website, use the websites id to create a post, create a subscription.Fololowing which you can use the command 

   ```bash
    php artisan app:send-post-notifications 
   ```

to send out notifications.

