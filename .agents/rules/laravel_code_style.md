# PaystubX Senior Laravel Architecture & Code Style Rules

Development rules and architecture guidelines defined by 15+ years experienced Senior Staff Laravel Developers for maintaining enterprise code quality.

## ⚙️ Eloquent Models, Caching & Database Schema

1. **N+1 Query Prevention & Eager Loading:**
   - ALWAYS eager load model relationships (`with(['user', 'plan'])`) when returning collections to prevent N+1 performance bottlenecks.
2. **Query Caching Strategy:**
   - Frequently accessed read-heavy datasets (State Tax tables, Deduction lists, Global System Settings) MUST be cached via `Cache::remember('key', duration, closure)` to minimize SQLite database hits.
3. **SQLite NOT NULL Constraints:**
   - When calling `Setting::updateOrCreate(['name' => $name], [...])`, ALWAYS provide both `'value' => ...` AND `'description' => ...` to prevent `Integrity constraint violation: 19 NOT NULL constraint failed: settings.description` errors.
4. **Fillable & Guarded Attributes:**
   - Ensure all database table attributes modified by controllers are listed in the model's `$fillable` array.

---

## 🗺️ Controller - Service - Model Architecture

1. **Strict 3-Tier Layered Pattern:**
   - **Controllers (`app/Http/Controllers`):** Ultra-slim HTTP entry points. Responsible ONLY for request validation, middleware enforcement, and returning JSON/Blade view responses.
   - **Services (`app/Services`):** Encapsulates ALL business logic, paystub computation, tax calculation algorithms, PDF document building, and third-party API integrations (PayPal, Mail).
   - **Models (`app/Models`):** Data layer ONLY. Handles Eloquent relations, fillable attributes, database table mappings, and local query scopes.
2. **Named Routes:** All admin routes MUST have named routes using the `admin.` prefix (e.g., `admin.settings`, `admin.profile`, `admin.revenue`).
3. **Blade Actions:** Form actions in Blade views MUST use `route('admin.xxx')` instead of hardcoding relative paths.

---

## 🌐 API & RESTful Standardization

1. **Standard Envelope:** All API responses MUST return `{ "success": bool, "status": int, "message": string, "data": array|object }`.
2. **Correct HTTP Return Codes:** Validation failures MUST return `400 Bad Request` or `422 Unprocessable Entity` (NEVER 301 Redirect or hardcoded 200 OK).

---

## ⛔ Strict No Dummy / Placeholder Rule

1. **Production Real Data Only:**
   - NEVER commit or generate dummy passwords (`'123456dummy'`), mock analytics data, static array fallbacks, or dummy placeholder text in production controllers or Blade views.
   - All logic MUST use dynamic database models, real user inputs, and cryptographically secure random values (`Str::random()`).
