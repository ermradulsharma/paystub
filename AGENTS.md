# PaystubX Platform Architecture & Developer Guide

Welcome to the PaystubX codebase repository. This document provides a high-level overview of the application architecture, design system, route structure, and security standards for developers and AI pair programmers.

---

## 🚀 Tech Stack Overview

- **Framework:** Laravel 9.x (PHP 8.5)
- **Database:** SQLite 3 (`database/database.sqlite`)
- **PDF Engine:** DomPDF 2.0
- **Frontend Stack:** Blade Templating, Bootstrap 5, Chart.js, Custom Vanilla CSS
- **Design System:** Apple / Stripe / Vercel Ultra-High Density Minimalist Light UX Theme

---

## 📁 Key File Locations

- **Admin Routes:** [`routes/web.php`](file:///d:/github/Laravel%20Project/paystubx-website/routes/web.php)
- **Admin Settings Controller:** [`app/Http/Controllers/SettingController.php`](file:///d:/github/Laravel%20Project/paystubx-website/app/Http/Controllers/SettingController.php)
- **Design System CSS:** [`public/Admin/assets/css/admin_redesign.css`](file:///d:/github/Laravel%20Project/paystubx-website/public/Admin/assets/css/admin_redesign.css)
- **Admin Layout Header:** [`resources/views/Admin/layouts/header.blade.php`](file:///d:/github/Laravel%20Project/paystubx-website/resources/views/Admin/layouts/header.blade.php)
- **Admin Layout Sidebar:** [`resources/views/Admin/layouts/sidebar.blade.php`](file:///d:/github/Laravel%20Project/paystubx-website/resources/views/Admin/layouts/sidebar.blade.php)
- **Workspace Agent Rules:** [`.agents/rules/`](file:///d:/github/Laravel%20Project/paystubx-website/.agents/rules/)

---

## 🎨 Design System Principles

1. **Colors:** Slate 50 background (`#f8fafc`), Pure White cards (`#ffffff`), Hairline borders (`#e2e8f0`), Brand Indigo (`#4f46e5`).
2. **Typography:** Plus Jakarta Sans (`'Plus Jakarta Sans', sans-serif`).
3. **Density:** Ultra-high density compact workspace (`#main` padding: `10px 14px`).
4. **Card Height:** All `.apple-card` elements default to `height: auto` so they shrink-wrap naturally around content.

---

## 🛡️ Security Protocol

1. All `/admin/*` routes MUST be protected by `Route::prefix('admin')->middleware(['userCheck'])`.
2. Admin access is enforced via `RoleCheck.php` (`role_id == 1`).
3. All profile updates bind strictly to `Auth::id()` to prevent IDOR attacks.
4. Input strings are sanitized with `strip_tags()`, and uploaded images undergo MIME type whitelist verification.
