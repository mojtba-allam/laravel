# Job Board Application

This is a Laravel-based job board application that allows users to browse, post, and manage job listings.

## Features

- **Job Listings**: Browse available job postings with details like title and salary
- **Job Management**: Create, edit, and delete job listings (with proper authorization)
- **User Authentication**: Register and login functionality for users
- **Contact Form**: Static contact page with form validation
- **Authorization**: Role-based access control for job editing
- **Email Notifications**: Automatic email notifications when jobs are posted
- **Background Jobs**: Queue-based job processing

## Tech Stack

- **Backend**: Laravel 11.x with PHP 8.2+
- **Frontend**: Vue.js 3 with Inertia.js for SPA-like experience
- **Styling**: TailwindCSS with PrimeVue components
- **Database**: MySQL/MariaDB or SQLite
- **Queue Processing**: Laravel Queues for background job handling

## Key Components

- **Models**: Job, Employer, User, Tag
- **Controllers**: JobController, RegisteredUserController, SessionController, PageController
- **Views**: Built with Vue.js and Inertia.js (resources/js/Pages/)
- **Routes**: Defined in routes/web.php

## Installation

1. Clone the repository
2. Install PHP dependencies: `composer install`
3. Install Node dependencies: `npm install`
4. Copy and configure `.env` file: `cp .env.example .env`
5. Generate application key: `php artisan key:generate`
6. Run migrations: `php artisan migrate`
7. Build assets: `npm run build`

## Development

To start the development server:

```bash
composer run dev
```

This will start the Laravel server, queue listener, log watcher, and Vite development server concurrently.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
