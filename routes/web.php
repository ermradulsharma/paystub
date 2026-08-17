<?php

use App\Http\Controllers\AddressBookController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\PayStubController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TemplateFormController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =========================================================================
// 1. Public & Country Paystub Routes
// =========================================================================
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::match(['get', 'post'], 'usa/paystub', [PayStubController::class, 'usaPayStub'])->name('usa.payStub');

Route::match(['get', 'post'], 'global', [PayStubController::class, 'templateGlobal'])->name('global');
Route::match(['get', 'post'], 'global/paystub', [PayStubController::class, 'globlePaystub'])->name('global.payStub');

Route::get('uk', function () {
    return view('uk');
})->name('uk');
Route::match(['get', 'post'], 'uk/paystub', [PayStubController::class, 'ukPayStub'])->name('uk.payStub');

Route::get('canada', function () {
    return view('canada');
})->name('canada');
Route::match(['get', 'post'], 'canada/paystub', [PayStubController::class, 'canadaPayStub'])->name('canada.payStub');

Route::get('w2form', function () {
    return view('forms');
})->name('w2form');
Route::match(['get', 'post'], 'w2form/paystub', [PayStubController::class, 'w2formPayStub'])->name('w2form.paystub');

Route::post('generate-pdf', [TemplateFormController::class, 'generatePDF'])->name('generate');

// =========================================================================
// 2. Static Content & Information Routes
// =========================================================================
Route::get('terms', function () {
    return view('terms');
})->name('terms');

Route::get('privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('refund', function () {
    return view('refund');
})->name('refund');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::post('contact-form', [HomeController::class, 'contactForm'])->name('contact-form');

Route::get('template-view', function () {
    return view('template');
})->name('template-view');

Route::get('userDashboard', function () {
    return view('user-dashboard');
})->name('userDashboard');

Route::get('verify', function () {
    return view('mail.verify');
})->name('verify');

// =========================================================================
// 3. Authentication & Password Management Routes
// =========================================================================
Route::post('auth/login', [LoginController::class, 'loginWithGoogle'])->name('login.google');
Route::match(['get', 'post'], 'google/callback', [LoginController::class, 'callbackFromGoogle'])->name('google.callback');

Route::get('loginWithOtp', function () {
    return view('auth.OtpLogin');
})->name('loginWithOtp.view');
Route::post('loginWithOtp', [LoginController::class, 'loginWithOtp'])->name('loginWithOtp');
Route::post('sendOtp', [LoginController::class, 'sendOtp'])->name('sendOtp');
Route::post('login', [LoginController::class, 'login'])->name('login');

Route::post('forgot/password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot.password');
Route::get('password/reset/{token}', [ForgotPasswordController::class, 'resetPasswordFromWeb'])->name('password.reset');
Route::post('password/update/{token}', [ForgotPasswordController::class, 'passwordUpdate'])->name('password.update');

// =========================================================================
// 4. Form Processing & Template Render Routes
// =========================================================================
Route::post('templates', [TemplateFormController::class, 'templates'])->name('templates');
Route::post('canada/templates', [TemplateFormController::class, 'templates'])->name('canada.templates');
Route::post('uk/templates', [TemplateFormController::class, 'templates'])->name('uk.templates');

// =========================================================================
// 5. Authenticated User Routes (Auth Middleware)
// =========================================================================
Route::middleware(['auth'])->group(function () {

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // Invoices & Subscriptions
    Route::post('usaStoreData', [TemplateFormController::class, 'usaStoreData'])->name('usaStoreData');
    Route::get('invoiceList', [TemplateFormController::class, 'invoiceList'])->name('invoiceList');
    Route::post('invoiceDelete/{id}', [TemplateFormController::class, 'invoiceDelete'])->name('invoiceDelete');
    Route::get('invoiceMail/{id?}', [TemplateFormController::class, 'invoiceMail'])->name('invoiceMailId');
    Route::get('invoiceEdit/{id}', [TemplateFormController::class, 'edit'])->name('invoiceEdit');
    Route::get('prizing', [PayStubController::class, 'prizing'])->name('prizing');
    Route::get('subscription', [TemplateFormController::class, 'subscription'])->name('subscription');

    // User Profile
    Route::get('profile', [HomeController::class, 'userDetails'])->name('profile');
    Route::post('profile/details/save', [HomeController::class, 'storeDetails'])->name('store.details');
    Route::post('profile-setup', [HomeController::class, 'storeDetails'])->name('profile-setup');
    Route::post('account/delete', [HomeController::class, 'accountDelete'])->name('delete.account');
    Route::post('update-password', [HomeController::class, 'userDetails'])->name('update-password');
    Route::post('change-password', [HomeController::class, 'changePassword'])->name('changePassword');
    Route::get('forgotpassword', function () {
        return view('auth.passwords.email');
    })->name('forgotpassword');

    // Address Book
    Route::get('address/fetch', [AddressBookController::class, 'fetchAddress'])->name('fetch.address');
    Route::get('address/fetch/data', [AddressBookController::class, 'fetchAddressById'])->name('get.address');
    Route::post('address/save', [AddressBookController::class, 'storeAddress'])->name('store.address');
    Route::post('address/{id}/delete', [AddressBookController::class, 'deleteAddress'])->name('delete.address');
    Route::get('address/get/options', [AddressBookController::class, 'addressOptions'])->name('address.option');

    // =========================================================================
    // 6. Admin Panel Routes (Auth + userCheck Middleware)
    // =========================================================================
    Route::prefix('admin')->middleware(['userCheck'])->group(function () {
        Route::get('welcome', function () {
            return view('Admin.layouts.default');
        })->name('admin.welcome');

        Route::get('dashboard', function () {
            return view('Admin.dashboard');
        })->name('admin.dashboard');

        Route::get('template', function () {
            return view('Admin.template');
        })->name('admin.template');

        Route::get('color', function () {
            return view('Admin.color-codes');
        })->name('admin.color');

        Route::get('deduction', function () {
            return view('Admin.deduction');
        })->name('admin.deduction');

        Route::get('users', [SettingController::class, 'users'])->name('admin.users');
        Route::get('payslips', [SettingController::class, 'payslips'])->name('admin.payslips');
        Route::get('subscriptions', [SettingController::class, 'subscriptions'])->name('admin.subscriptions');
        Route::match(['get', 'post'], 'plans', [SettingController::class, 'plans'])->name('admin.plans');

        Route::get('analytics', [SettingController::class, 'analytics'])->name('admin.analytics');
        Route::match(['get', 'post'], 'state-taxes', [SettingController::class, 'stateTaxes'])->name('admin.state-taxes');
        Route::get('audit-logs', [SettingController::class, 'auditLogs'])->name('admin.audit-logs');
        Route::get('emails', [SettingController::class, 'emailTemplates'])->name('admin.emails');
        Route::get('export', [SettingController::class, 'exportData'])->name('admin.export');
        Route::get('faqs', [SettingController::class, 'faqs'])->name('admin.faqs');
        Route::get('health', [SettingController::class, 'health'])->name('admin.health');
        Route::get('coupons', [SettingController::class, 'coupons'])->name('admin.coupons');
        Route::get('watermarks', [SettingController::class, 'watermarks'])->name('admin.watermarks');
        Route::get('languages', [SettingController::class, 'languages'])->name('admin.languages');
        Route::get('broadcast', [SettingController::class, 'broadcast'])->name('admin.broadcast');

        Route::match(['get', 'post'], 'settings', [SettingController::class, 'settings'])->name('admin.settings');
    });
});

Route::match(['get', 'post'], 'admin/settings', [SettingController::class, 'settings'])->name('settings');

Route::get('currency-converter', function() {
    return view('currency-converter');
})->name('currency.converter');

// =========================================================================
// 7. Payment Processing Routes (PayPal)
// =========================================================================
Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction/{details}', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
Route::get('check/test', [TemplateFormController::class, 'deleteExtraPdf'])->name('check.test');

Route::post('payment/process', [PaymentController::class, 'processPayPal'])->name('payment.process');
Route::get('payment/success', [PaymentController::class, 'success'])->name('paypal.success');
Route::get('payment/cancel', [PaymentController::class, 'cancel'])->name('paypal.cancel');
