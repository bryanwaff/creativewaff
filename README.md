# Creative Waff

Creative Waff is a portfolio and service-catalog website for a creative studio offering software engineering, live event production, and visual design. Visitors can explore services and project case studies, then send an inquiry through the contact form.

## Features

- Responsive home, about, services, projects, and contact pages.
- Service catalog with category filters, detailed service pages, featured offerings, and WhatsApp inquiry links.
- Project portfolio with category filters, individual case studies, and related projects.
- Contact form with server-side validation, inquiry storage, email notifications, and a prefilled WhatsApp follow-up link.
- Account registration and authentication, email verification, password reset, two-factor authentication, passkey support, and profile/security settings.
- Custom brand logo and favicon assets.

## Built with

- PHP 8.3+ and Laravel 13
- Livewire, Volt, and Flux
- Tailwind CSS 4, Vite, and Node.js
- SQLite by default (other Laravel-supported databases can be configured)

## Getting started

1. Install PHP dependencies, create the local environment file and app key, run migrations, install JavaScript dependencies, and build the assets:

   ```sh
   composer setup
   ```

2. Configure `.env` for your environment. In particular, set up your database, mail delivery, `CONTACT_INQUIRY_RECIPIENTS`, and `WHATSAPP_PHONE_NUMBER`.

3. Start the application:

   ```sh
   php artisan serve
   npm run dev
   ```

   Open the URL printed by `php artisan serve`.

## Testing

Run the Laravel test suite with:

```sh
php artisan test
```
