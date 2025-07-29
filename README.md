# Laravel TALL Stack Platform

[![Laravel](https://img.shields.io/badge/Laravel-12.x-ff2d20?logo=laravel&logoColor=white)](https://laravel.com)
[![Livewire](https://img.shields.io/badge/Livewire-3.x-purple?logo=laravel&logoColor=white)](https://livewire.laravel.com)
[![Tailwind CSS](https://img.shields.io/badge/TailwindCSS-3.x-06b6d4?logo=tailwindcss&logoColor=white)](https://tailwindcss.com)
[![Alpine.js](https://img.shields.io/badge/Alpine.js-latest-8bc0d0?logo=alpine.js&logoColor=white)](https://alpinejs.dev)
[![PHP](https://img.shields.io/badge/PHP-8.2%2B-777bb4?logo=php&logoColor=white)](https://www.php.net)
[![Stripe](https://img.shields.io/badge/Stripe-Integrated-635bff?logo=stripe&logoColor=white)](https://stripe.com)
[![License](https://img.shields.io/badge/License-MIT-brightgreen.svg)](LICENSE)
[![GitHub Stars](https://img.shields.io/github/stars/MahmoudSalah53/BlogPost?style=social)](https://github.com/MahmoudSalah53/BlogPost/stargazers)

A comprehensive content management platform built with the TALL stack (Tailwind CSS, Alpine.js, Laravel, Livewire) featuring role-based access control, subscription management, and analytics dashboard.

---

## 🛠️ Tech Stack

- **Laravel 12** – Backend framework
- **Livewire 3.0** – Full-stack framework for Laravel
- **Alpine.js** – Minimal JavaScript framework
- **Tailwind CSS** – Utility-first CSS framework
- **Livewire Starter Kit** – Authentication scaffolding
- **Flux UI** – Modern UI components
- **Filament 3.0** – Admin panel framework
- **Stripe** – Payment processing
- **Ajax & NPM** – Frontend build tools

---

## ✨ Features

### Role-Based Access Control
- **Admin Panel** – Full system administration with analytics dashboard
- **Author Panel** – Content creation and management
- **Reader Panel** – Content consumption and interaction

### Content Management
- **Post Publishing** – Create, edit, and publish articles
- **Engagement System** – Like, save, and comment on posts
- **Author Following** – Follow favorite content creators

### Analytics & Reporting
- Graphical admin dashboard with charts
- Revenue tracking and profit visualization
- User engagement metrics

### Subscription System
- **Stripe Integration** – Secure payment processing
- **Temporary Subscriptions** – Time-based access control
- **Subscription Management** – Admin oversight of user subscriptions

---

## 📋 System Requirements

- PHP 8.2+
- Laravel 12
- Composer
- NPM
- MySQL

---

## 🚀 Installation

```bash
# 1. Clone the repository
git clone https://github.com/MahmoudSalah53/BlogPost.git
cd BlogPost

# 2. Install PHP dependencies
composer install

# 3. Install NPM dependencies
npm install

# 4. Set up environment variables
cp .env.example .env
php artisan key:generate

# 5. Configure database and run migrations
php artisan migrate --seed

# 6. Link storage
php artisan storage:link

# 7. Build assets
npm run dev

# 8. Start the development server
php artisan serve
