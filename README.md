# Hotelaz

A full-featured hotel management web application built with Laravel. Guests can browse rooms, check availability, and make reservations with payment-proof upload; admins manage rooms, bookings, galleries, testimonials, and users from a dedicated dashboard with revenue statistics.

## Features

### Guest / Public
- **Room browsing & search** — room listings with detail pages, features, and image galleries; keyword/date search
- **Reservation flow** — pick check-in/check-out dates, automatic price calculation per night, availability check against overlapping bookings
- **Payment proof upload** — upload bukti pembayaran (JPG/PNG/PDF, validated) attached to the reservation
- **Email notifications** — automatic emails on reservation creation and confirmation (Laravel Mailables)
- **Testimonials** — guests submit reviews, shown after admin approval
- **Marketing pages** — home, about, contact form, newsletter subscription, gallery, and facility pages (restaurant, swimming pool, spa, fitness)
- **Authentication** — register, login, logout, and profile management

### Admin (protected by `IsAdmin` middleware)
- **Dashboard** — total/available rooms, total & pending reservations, registered users, paid revenue, 6-month monthly revenue chart data, recent reservations, pending testimonials
- **Room management** — full CRUD with per-room quantity, features (array-cast), featured image + gallery images, and individual **room units** with room numbers and status (available / booked / maintenance)
- **Reservation management** — review, confirm, and manage bookings and payment proofs
- **Testimonial moderation** — approve or reject guest reviews
- **Gallery & user management** — full CRUD for site gallery and user accounts
- **Image upload** — dedicated admin image upload endpoint

## Tech Stack

- **Backend:** Laravel (PHP), Eloquent ORM, Blade templating
- **Frontend:** Tailwind CSS, Vite
- **Database:** MySQL/ MariaDB (Eloquent migrations)
- **Mail:** Laravel Mailables with Blade email templates

## Key Implementation Details

- **Availability logic:** reservations are checked against overlapping date ranges (`whereBetween` + containment checks) compared to each room's `quantity`, preventing overbooking
- **Data integrity:** `RoomUnit` table tracks each physical room separately from the room type; migrations handle schema evolution (payment proof, unit tracking)
- **Authorization:** route middleware separates guest and admin areas; policies guard reservation ownership (`view`/`update` before cancel)
- **File handling:** validated payment-proof uploads stored on the public disk with a dedicated serving route

## Getting Started

```bash
git clone https://github.com/sakeeeeeeee/hotelaz.git
cd hotelaz
composer install
cp .env.example .env
php artisan key:generate
npm install && npm run build
php artisan migrate
php artisan serve
```

Configure your database connection in `.env` before migrating.

## Project Structure

```
app/
├── Http/Controllers/
│   ├── Admin/          # Dashboard, rooms, reservations, testimonials, galleries, users
│   ├── HomeController, RoomController, ReservationController, ...
├── Http/Middleware/IsAdmin.php
├── Mail/               # ReservationCreated, ReservationConfirmed
└── Models/             # Room, RoomUnit, Reservation, Testimonial, Gallery, User, NewsletterSubscriber
database/migrations/    # rooms, room_units, reservations (+payment proof), testimonials, galleries
resources/views/        # Blade: public site, reservations, auth, admin panel, email templates
```

## What I Learned

- Designing an availability/overbooking check with overlapping date-range queries
- Structuring a Laravel app with separated guest and admin areas (middleware, resource controllers, policies)
- Handling file uploads with validation and serving stored media securely
- Sending transactional email with Mailables and Blade templates
- Building an admin dashboard with aggregate statistics (revenue per month, pending items)

## Status

Learning/portfolio project — actively being improved. Next steps: feature tests for the reservation flow and CI via GitHub Actions.
