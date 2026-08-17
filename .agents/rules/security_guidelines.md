# PaystubX Security & Hardening Rules

Mandatory security protocols and hardening constraints for all controllers, middleware, and route handlers.

## 🛡️ Authentication & Access Control

1. **Admin Middleware Protection:** All `/admin/*` routes MUST be registered inside `Route::prefix('admin')->middleware(['userCheck'])` in `routes/web.php`.
2. **Role Check Verification:** `RoleCheck.php` MUST strictly enforce `$userObj->role_id == 1`. Unauthenticated or non-admin access MUST be blocked immediately.
3. **No Standalone Unprotected Admin Routes:** NEVER declare fallback unauthenticated admin routes outside the middleware group.

---

## 🔒 Form Handling & Data Sanitization

1. **IDOR Prevention:** User updates MUST ALWAYS bind strictly to `Auth::id()`. NEVER trust user IDs provided directly in request parameters.
2. **Password Change Security:** Changing or updating passwords MUST ALWAYS require entering the current password (`old_password`), validated using `Hash::check($request->old_password, $user->password)`.
3. **XSS Input Sanitization:** All text inputs MUST be sanitized using `strip_tags()` or `filter_var(FILTER_SANITIZE_EMAIL)` before database persistence.
4. **File Upload Hardening:**
   - Verify uploaded file validity with `$file->isValid()`.
   - Validate MIME types strictly (`image/jpeg`, `image/png`, `image/jpg`, `image/gif`, `image/webp`).
   - Limit file size to `2048 KB`.
   - Generate safe, randomized filenames using `bin2hex(random_bytes(16))` to prevent Remote Code Execution (RCE) and path traversal attacks.
