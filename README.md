# Subscription Platform

This is a robust subscription platform built with PHP 8.* and Laravel, allowing users to subscribe to websites and receive email notifications for new posts.

## Features

- RESTful APIs for creating posts and managing subscriptions
- Automated email notifications for new posts
- Background job processing with queues
- API documentation
- Seeded data for quick start
- Caching for improved performance
- Event-driven architecture

## Requirements

- PHP 8.*
- Composer
- MySQL
- Redis (optional, for queue driver)

## Installation

1. Clone the repository
2. Run `composer install`
3. Copy `.env.example` to `.env` and configure your database settings
4. Run `php artisan key:generate`
5. Run `php artisan migrate`
6. Run `php artisan db:seed`

## Usage

1. Start the server: `php artisan serve`
2. To create a post: Send a POST request to `/posts` with `website_id`, `title`, and `description`
3. To subscribe a user: Send a POST request to `/subscriptions` with `website_id` and `email`
4. To send emails: Run `php artisan emails:send`

## Queue Setup

To use queues for background job processing:

1. Set up a queue driver in your `.env` file (e.g., database, redis)
2. Run `php artisan queue:work` to start the queue worker

## Scheduled Tasks

To set up the scheduled task for sending emails:

1. Add the following Cron entry to your server:
   ```
     cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
   ```
2. In `app/Console/Kernel.php`, add the following to the `schedule` method:
   ```php
   $schedule->command('emails:send')->daily();
   ```

This will run the email sending command once a day.