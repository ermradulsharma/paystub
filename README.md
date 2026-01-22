# Paystub X - Professional Paystub Generator

Paidstub X is a powerful and flexible Laravel-based web application designed to generate professional paystubs for various regions, including the USA, UK, Canada, and Global templates. It also supports W2 forms and includes a comprehensive admin dashboard for managing templates, users, and subscriptions.

![Laravel](https://img.shields.io/badge/Laravel-9.x-FF2D20?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?style=for-the-badge&logo=php)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

## 🚀 Features

- **Multi-Region Support**: specialized templates for USA, UK, Canada, and generic Global options.
- **W2 Form Generation**: Easy-to-use W2 form creator.
- **Admin Dashboard**: Manage users, templates, color codes, and deductions.
- **User Dashboard**: Users can save profiles, manage subscriptions, and view order history.
- **PDF Generation**: High-quality PDF export using DOMPDF.
- **Payment Integration**: PayPal integration for handling subscriptions and one-time payments.
- **Authentication**: Secure login with email/password, Google OAuth, and OTP support.

## 🛠 Prerequisites

- PHP >= 8.0.2
- Composer
- PostgreSQL or MySQL
- Node.js & NPM (for frontend assets)

## 📦 Installation

1.  **Clone the Repository**

    ```bash
    git clone https://github.com/yourusername/paystubx-website.git
    cd paystubx-website
    ```

2.  **Install PHP Dependencies**

    ```bash
    composer install
    ```

3.  **Environment Setup**
    Copy the example environment file and configure it:

    ```bash
    cp .env.example .env
    ```

    Update the `.env` file with your database credentials, mail server details, and PayPal keys.

4.  **Generate App Key**

    ```bash
    php artisan key:generate
    ```

5.  **Database Migration**

    ```bash
    php artisan migrate --seed
    ```

6.  **Install Frontend Dependencies**

    ```bash
    npm install
    npm run build
    ```

7.  **Serve Application**
    ```bash
    php artisan serve
    ```

## ⚙️ Configuration

### Payment Gateways

Configure your PayPal credentials in `.env`:

```env
PAYPAL_MODE=sandbox
PAYPAL_SANDBOX_CLIENT_ID=your_client_id
PAYPAL_SANDBOX_CLIENT_SECRET=your_client_secret
```

### Social Login

To enable Google Login, add your Google Console credentials:

```env
GOOGLE_CLIENT_ID=your_client_id
GOOGLE_CLIENT_SECRET=your_client_secret
GOOGLE_CALLBACK_URL=http://your-domain.com/google/callback
```

## 🤝 Contributing

We welcome contributions! Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details on how to get started.

## 🔒 Security

If you discover any security related issues, please refer to [SECURITY.md](SECURITY.md) for reporting instructions.

## 📄 License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). This project also follows the MIT license. See [LICENSE](LICENSE) for more information.
