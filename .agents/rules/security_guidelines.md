# PaystubX Senior Developer Security & Hardening Rules

Mandatory security protocols and hardening constraints established by 15+ years Senior Laravel Architects for all controllers, middleware, services, and route handlers.

## 🛡️ Authentication & Access Control

1. **Admin Middleware Protection:** All `/admin/*` routes MUST be registered inside `Route::prefix('admin')->middleware(['userCheck'])` in `routes/web.php`.
2. **Role Check Verification:** `RoleCheck.php` MUST strictly enforce `$userObj->role_id == 1`. Unauthenticated or non-admin access MUST be blocked immediately.
3. **Zero Trust Google OAuth Guard:** Social OAuth callbacks MUST ALWAYS verify identity via server-side OAuth providers (`Socialite::driver('google')->user()`). NEVER accept untrusted raw request parameters (`$request->email`, `$request->sub`) for login or session creation.
4. **Secure Password Hashing:** Newly created OAuth accounts MUST use cryptographically secure random passwords (`Hash::make(Str::random(32))`). NEVER use hardcoded dummy passwords like `'123456dummy'`.

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
5. **Information Disclosure Prevention:**
   - Catch blocks MUST NEVER return raw exception messages containing local file paths or line numbers (`$e->getFile()`, `$e->getLine()`). Log errors securely with `Log::error($e)` and return clean, user-friendly messages (`DEFAULT_ERROR_MESSAGE`).
