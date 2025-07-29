# Laravel TALL Stack Platform

A comprehensive content management platform built with the TALL stack (Tailwind CSS, Alpine.js, Laravel, Livewire) featuring role-based access control, subscription management, and analytics dashboard.

## 🛠️ Tech Stack

- **Laravel 12** - Backend framework
- **Livewire 3.0** - Full-stack framework for Laravel
- **Alpine.js** - Minimal JavaScript framework
- **Tailwind CSS** - Utility-first CSS framework
- **Livewire Starter Kit** - Authentication scaffolding
- **Flux UI** - Modern UI components
- **Filament 3.0** - Admin panel framework
- **Stripe** - Payment processing
- **Ajax & NPM** - Frontend build tools

## ✨ Features

### Role-Based Access Control
- **Admin Panel** - Full system administration with analytics dashboard
- **Author Panel** - Content creation and management
- **Reader Panel** - Content consumption and interaction

### Content Management
- **Post Publishing** - Create, edit, and publish articles
- **Engagement System** - Like, save, and comment on posts
- **Author Following** - Follow favorite content creators

### Analytics & Reporting
- Comprehensive admin dashboard with graphical charts
- Revenue tracking and profit visualization
- User engagement metrics

### Subscription System
- **Stripe Integration** - Secure payment processing
- **Temporary Subscriptions** - Time-based access control
- **Subscription Management** - Admin oversight of user subscriptions

## 📋 System Requirements

- Laravel 12
- NPM
- Composer

## 🚀 Installation

1. **Clone the repository**
   ```bash
   git clone [repository-url]
   cd [project-name]
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install NPM dependencies**
   ```bash
   npm install
   ```

4. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database Configuration**
   ```bash
   php artisan migrate --seed
   ```

6. **Storage Setup**
   ```bash
   php artisan storage:link
   ```

7. **Stripe Configuration**
   ```env
   STRIPE_KEY=your_stripe_publishable_key
   STRIPE_SECRET=your_stripe_secret_key
   ```

8. **Build Assets**
   ```bash
   npm run build
   ```

9. **Start Development Server**
   ```bash
   php artisan serve
   ```

## 🔧 Configuration

### Payment Integration
Configure Stripe webhooks in your Stripe dashboard to handle subscription events.

## 📱 Usage

### Admin Dashboard
- Access comprehensive analytics
- Manage users and roles
- Monitor subscription revenue
- View system statistics

### Author Panel
- Create and publish posts
- Manage content library
- View engagement metrics

### Reader Interface
- Browse and read content
- Like and save posts
- Comment and interact
- Follow authors
- Manage subscriptions

## 🤝 Contributing

This project was developed collaboratively by:
- [Mahmoud Salah](https://github.com/MahmoudSalah53)
- [khaled Abdalah](https://github.com/khaledAbdalah)

## 🔒 Security

- Stripe payment processing

## 📄 License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## 🐛 Issues & Support

If you encounter any issues or need support, please create an issue in the GitHub repository.

---

Built with ❤️ using the TALL Stack
