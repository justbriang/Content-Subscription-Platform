# Content Subscription Platform

This Laravel project is designed to allow users to subscribe to websites and receive notifications via email whenever new posts are published. It includes functionalities for creating posts, subscriptions, and handling background email notifications.

## Features

- **Create Posts**: Admins can add new posts to their subscribed websites.
- **Subscribe**: Users can subscribe to websites to receive updates.
- **Email Notifications**: Subscribers receive email notifications about new posts asynchronously through queued jobs.


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
git clone git@github.com:justbriang/todo-list-web.git
```

If you use https, use this instead

```bash
git clone https://github.com/justbriang/todo-list-web.git
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

-   Run Database Migrations

-   Be sure to fill in your database details in your `.env` file before running the migrations:

    ```bash
    php artisan migrate
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
# Content-Subscription-Platform
