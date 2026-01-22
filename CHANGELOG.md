# Changelog

All notable changes to this project are documented in this file.

The format follows [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) and the project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.1.0] - 2026-01-22

### Added

- Complete redesign of the admin dashboard with a premium "Rich Aesthetic" (dark mode, glassmorphism, vibrant gradients).
- New CSS design system in `public/Admin/assets/css/admin_redesign.css` with variables, glass effects, and responsive utilities.
- Updated Blade templates for login, header, sidebar, dashboard, and settings to use the new design system.
- Admin credentials seeded via `database/seeders/AdminSeeder.php` (email: `admin@admin.com`, password: `12345678`).
- Updated documentation (README, CONTRIBUTING, CODE_OF_CONDUCT, SECURITY, CHANGELOG) to reflect the new UI and setup steps.

### Changed

- Modified routes in `routes/web.php` to ensure admin routes are prefixed with `/admin` and protected by `auth` and `userCheck` middleware.
- Integrated Google Font "Outfit" across the admin UI.
- Adjusted form and table styles to match the new design system.

### Fixed

- Resolved visibility issues caused by dark theme color conflicts.
- Fixed missing asset paths for the redesigned login page.

## [1.0.0] - 2024-01-22

### Added

- Initial release of Paystub X.
- USA, UK, Canada, and Global paystub templates.
- W2 Form generation.
- Admin dashboard for template and user management.
- User dashboard with order history.
- PayPal payment integration.
- Email and Social (Google) authentication.

---

_For a full list of changes, see the commit history._
