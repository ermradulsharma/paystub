# PaystubX Enterprise Architecture & Senior Developer Guidelines

Welcome to the PaystubX codebase repository. This document defines the enterprise architecture, security standards, database integrity protocols, and code quality benchmarks established by 15+ years experienced Senior Staff Laravel Developers and Architects.

---

## 🚀 Tech Stack Overview

- **Framework:** Laravel 9.x (PHP 8.5)
- **Database:** SQLite 3 (`database/database.sqlite`)
- **PDF Engine:** DomPDF 2.0
- **Frontend Stack:** Blade Templating, Bootstrap 5, Chart.js, Custom Vanilla CSS
- **Design System:** Apple / Stripe / Vercel Ultra-High Density Minimalist Light UX Theme

---

## 🏛️ 1. Core Architecture Principles (Senior Staff Developer Standards)

1. **Controller - Service - Model Layered Architecture:**
   - Code MUST follow a strict 3-tier architecture pattern:
     - **Controllers (`app/Http/Controllers`):** HTTP layer ONLY. Must be ultra-slim and strictly handle request validation, middleware, and returning JSON/Blade responses.
     - **Services (`app/Services`):** Business logic layer. All tax calculations, paystub engines, PDF assembly, subscription processing, and external payment gateway integrations MUST be encapsulated inside dedicated Service classes.
     - **Models (`app/Models`):** Data access layer. Manages Eloquent relationships, mass-assignment attributes (`$fillable`), local query scopes, and model mutators.
2. **Strict Type Safety & PSR-12 Compliance:**
   - Use strict scalar type hints (`string`, `int`, `array`, `bool`, `float`), return type declarations, and PHP 8.1+ features throughout all controllers, services, and models.
3. **DRY & Single Responsibility Principle (SRP):**
   - No code duplication across controllers. Shared PDF building logic, currency formatting, or address formatting MUST reside in dedicated helpers or service providers.

---

## 🛡️ 2. Security & Defense-in-Depth Protocol

1. **Zero Trust Authentication & OAuth Security:**
   - Social OAuth callbacks MUST ALWAYS verify identity via server-side OAuth providers (`Socialite::driver('google')->user()`). NEVER accept untrusted raw request parameters (`$request->email`, `$request->sub`) for login or session creation.
   - Newly created OAuth accounts MUST use cryptographically secure random passwords (`Hash::make(Str::random(32))`). NEVER use hardcoded dummy passwords like `'123456dummy'`.
2. **IDOR & Authorization Guards:**
   - All authenticated actions (`updateProfile`, `deleteAddress`, `fetchInvoice`) MUST strictly bind queries to `Auth::id()`. NEVER trust user-supplied primary keys without ownership verification.
3. **Data Sanitization & XSS / SQLi Prevention:**
   - Input strings MUST be sanitized with `strip_tags()` or `filter_var()`. File uploads MUST undergo MIME-type whitelist verification (`image/jpeg`, `image/png`, `application/pdf`) and random filename generation (`bin2hex(random_bytes(16))`).
4. **Information Disclosure Prevention:**
   - Catch blocks in API controllers and web handlers MUST NEVER return raw exception messages containing local file paths or line numbers (`$e->getFile()`, `$e->getLine()`). Log errors securely with `Log::error($e)` and return clean, user-friendly messages (`DEFAULT_ERROR_MESSAGE`).

---

## ⚡ 3. Database Integrity & High-Performance ORM Standards

1. **N+1 Query Prevention & Eager Loading:**
   - ALWAYS eager load model relationships (`with(['user', 'plan'])`) when returning collections in controllers or API endpoints to prevent N+1 performance bottlenecks.
2. **Query Caching Strategy:**
   - Frequently accessed read-heavy datasets (State Tax tables, Deduction lists, Global System Settings) MUST be cached via `Cache::remember('key', duration, closure)` to minimize SQLite database hits.
3. **Atomic Database Transactions:**
   - Operations modifying multiple database tables (e.g. User creation + Subscription creation + Invoice log) MUST be wrapped inside `DB::transaction(function() { ... })` to ensure database consistency.
4. **SQLite Schema Constraint Protection:**
   - Models interacting with `settings` or strict tables MUST supply all required non-nullable columns (e.g., `'description' => ...`) to prevent `Integrity constraint violation: NOT NULL constraint failed` runtime crashes.
5. **Database Indexing:**
   - Foreign key columns (`user_id`, `plan_id`, `order_id`) and frequent lookup columns (`status`, `type`, `email`) MUST be indexed via migrations.

---

## 🎨 4. Design System & Frontend UX Standards

1. **Apple / Stripe / Vercel Ultra-Density UX Theme:**
   - All Admin views MUST follow the established design tokens in [`admin_redesign.css`](file:///d:/github/Laravel%20Project/paystubx-website/public/Admin/assets/css/admin_redesign.css): Slate 50 background (`#f8fafc`), Pure White `.apple-card` containers (`#ffffff`), Hairline borders (`#e2e8f0`), Brand Indigo (`#4f46e5`), and Plus Jakarta Sans typography.
2. **Dynamic UI Math & Responsive Layouts:**
   - Card containers MUST default to `height: auto` to shrink-wrap content naturally. Modal dialogs and action buttons must include active hover states and micro-interactions.

---

## 🌐 5. API & RESTful Response Standardization

1. **Standardized Response Envelope:**
   - All API endpoints MUST return a consistent JSON schema:
     ```json
     {
       "success": true,
       "status": 200,
       "message": "Human-readable description",
       "data": {}
     }
     ```
2. **Correct HTTP Response Status Codes:**
   - Validation errors MUST return `400 Bad Request` or `422 Unprocessable Entity` (NEVER 301 Redirect or hardcoded 200 OK). Server errors MUST return `500 Internal Server Error`.

---

## ⛔ 6. Production Code Quality & No Dummy / Mock Content Rule

1. **Zero Tolerance for Mock / Placeholder Data:**
   - Application controllers, models, and analytics dashboards MUST process authentic database records and real transaction queries. Mock array fallbacks, hardcoded revenue multipliers, and dummy placeholder strings are strictly prohibited.
2. **Environment Variable Security:**
   - Credentials, API secrets, system emails, and application URLs MUST be loaded dynamically from `.env` using `env()` helpers with safe production fallbacks.
