---
name: paystubx-workflows
description: >-
  Operational runbooks and step-by-step developer procedures for adding new admin views,
  modifying settings, handling SQLite constraints, and testing routes in PaystubX.
---

# PaystubX Developer Workflows & Runbooks

Cheatsheet of common developer procedures for working on the PaystubX codebase.

---

## 🛠️ Workflow 1: Adding a New Admin Route & View

1. **Register Route in `routes/web.php`:**
   Add route inside `Route::prefix('admin')->middleware(['userCheck'])`:
   ```php
   Route::match(['get', 'post'], 'feature-name', [SettingController::class, 'featureName'])->name('admin.feature-name');
   ```

2. **Add Handler in `SettingController.php`:**
   ```php
   public function featureName(Request $request)
   {
       if ($request->isMethod('post')) {
           Setting::updateOrCreate(
               ['name' => 'feature_setting_key'],
               [
                   'value' => $request->value,
                   'description' => 'Feature configuration setting'
               ]
           );
           return redirect()->back()->with('success', 'Settings updated successfully.');
       }
       return view('Admin.feature-name');
   }
   ```
   *Note: Always pass `description` to prevent SQLite `NOT NULL constraint failed: settings.description` errors.*

3. **Create Blade View in `resources/views/Admin/feature-name.blade.php`:**
   Wrap view in `@extends('Admin.layouts.default')` and `@section('content')`. Use `.apple-card` containers and `.page-header-wrapper`.

4. **Add Menu Item in `sidebar.blade.php`:**
   ```html
   <li class="nav-item">
       <a class="nav-link {{ request()->is('admin/feature-name*') ? '' : 'collapsed' }}" href="{{ route('admin.feature-name') }}">
           <i class="bi bi-gear-fill"></i>
           <span>Feature Name</span>
       </a>
   </li>
   ```

---

## 🧪 Workflow 2: Testing Local Web Server

Run local server from terminal:
```bash
php artisan serve
```
Access at `http://127.0.0.1:8000/admin/dashboard`.
