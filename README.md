# Paystub X – Professional Paystub Generator

Paystub X is a Laravel‑based web application that generates professional paystubs for multiple regions (USA, UK, Canada, Global) and supports W‑2 forms. It includes a modern **admin dashboard** with a premium "Rich Aesthetic" (dark mode, glassmorphism, vibrant gradients) and a user‑facing portal for managing templates, subscriptions, and invoices.

---

## ✨ Key Features

- **Multi‑Region Templates** – USA, UK, Canada, and Global paystub templates.
- **W‑2 Form Generation** – Built‑in support for US W‑2 forms.
- **Premium Admin UI** – Dark theme, glass‑morphism cards, gradient accents, and responsive layout.
- **Livewire Components** – Dynamic tables, forms, and real‑time validation.
- **PDF Export** – High‑quality PDFs via DOMPDF.
- **Payment Integration** – PayPal (sandbox & live) for subscriptions and one‑time purchases.
- **Authentication** – Email/password, Google OAuth, OTP login.
- **Role‑Based Access** – Admin (role_id = 1) with dedicated routes under `/admin`.
- **Configurable Settings** – SMTP, PayPal, and application constants defined in `config/constants.php`.

---

## 📂 Project Structure Highlights

- `resources/views/Admin/` – Blade templates for login, dashboard, settings, templates, deductions, etc.
- `public/Admin/assets/css/admin_redesign.css` – Centralised design system (variables, glass‑effect utilities, dark theme).
- `routes/web.php` – Admin routes are prefixed with `admin` and protected by `auth` + `userCheck` middleware.
- `app/Http/Controllers/SettingController.php` – Handles admin settings.
- `app/Models/*` – Eloquent models for `User`, `Template`, `Plan`, `Deduction`, etc.
- `database/seeders/AdminSeeder.php` – Seeds default admin credentials:
    - **Email:** `admin@admin.com`
    - **Password:** `12345678`

---

## 🛠 Prerequisites

- PHP >= 8.0.2
- Composer
- PostgreSQL or MySQL
- Node.js & NPM (for frontend assets)

---

## 🚀 Installation

```bash
# Clone the repository
git clone https://github.com/ermradulsharma/paystub.git
cd paystub

# Install PHP dependencies
composer install

# Copy environment file and configure
cp .env.example .env
# Edit .env – set DB credentials, mail server, PayPal keys, etc.

# Generate application key
php artisan key:generate

# Run migrations and seeders (includes admin user)
php artisan migrate --seed

# Install frontend assets
npm install
npm run dev   # or npm run build for production

# Serve the application
php artisan serve
```

The app will be available at `http://127.0.0.1:8000`.

---

## 🔐 Admin Access

- URL: `http://127.0.0.1:8000/admin/login`
- Credentials (seeded by `AdminSeeder`):
    - **Email:** `admin@admin.com`
    - **Password:** `12345678`

After logging in you will see the redesigned dashboard with glass‑styled cards for **Template Library**, **Tax Deduction Rules**, and **Design Palettes**.

---

## ⚙️ Configuration

### PayPal

```env
PAYPAL_MODE=sandbox
PAYPAL_SANDBOX_CLIENT_ID=your_client_id
PAYPAL_SANDBOX_CLIENT_SECRET=your_client_secret
```

### Google OAuth

```env
GOOGLE_CLIENT_ID=your_client_id
GOOGLE_CLIENT_SECRET=your_client_secret
GOOGLE_CALLBACK_URL=http://your-domain.com/google/callback
```

### Application Constants (`config/constants.php`)

- `APP_NAME`, `APP_URL`
- Admin, developer, and super‑admin email/username constants
- Status codes and generic messages used throughout the API

---

## 🤝 Contributing

Please see the [CONTRIBUTING.md](CONTRIBUTING.md) for guidelines on how to submit pull requests, report bugs, or propose new features.

---

## 🔒 Security

Report any security vulnerabilities via the [SECURITY.md](SECURITY.md) file.

---

## 📄 License

This project is licensed under the MIT License – see the [LICENSE](LICENSE) file for details.
