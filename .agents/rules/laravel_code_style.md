# PaystubX Laravel Code Style & Database Rules

Development rules and database constraints for maintaining high code quality across the PaystubX codebase.

## ⚙️ Eloquent Models & Database Schema

1. **SQLite NOT NULL Constraints:**
   - The `settings` table schema defines `name`, `description`, and `value` as non-nullable columns.
   - When calling `Setting::updateOrCreate(['name' => $name], [...])`, ALWAYS provide both `'value' => ...` AND `'description' => ...` to prevent `Integrity constraint violation: 19 NOT NULL constraint failed: settings.description` errors.
2. **Model Imports:**
   - Always import Eloquent models at the top of controller files (e.g., `use App\Models\PaySlip;`, `use App\Models\Setting;`, `use App\Models\User;`).
3. **Fillable Properties:**
   - Ensure all database table attributes modified by controllers are listed in the model's `$fillable` array.

---

## 🗺️ Route Conventions

1. **Named Routes:** All admin routes MUST have named routes using the `admin.` prefix (e.g., `admin.settings`, `admin.profile`, `admin.revenue`).
2. **Blade Actions:** Form actions in Blade views MUST use `route('admin.xxx')` instead of hardcoding relative paths.
