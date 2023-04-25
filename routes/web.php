<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PayStubController;
use App\Http\Controllers\TemplateFormController;
use App\Http\Controllers\AddressBookController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Router;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

Route::get('terms', function () {
    return view('terms');
});

Route::get('privacy', function () {
    return view('privacy');
});
Route::get('refund', function () {
    return view('refund');
});

Route::get('contact', function () {
    return view('contact');
});
Route::post('contact-form', [HomeController::class, 'contactForm'])->name('contact-form');
Route::get('template-view', function () {
    return view('template');
});
Route::get('userDashboard', function () {
    return view('user-dashboard');
});

Route::get('verify', function () {
    return view('mail.verify');
});

Route::post('auth/login', [LoginController::class, 'loginWithGoogle'])->name('login.google');
Route::match(['get', 'post'], 'google/callback', [LoginController::class, 'callbackFromGoogle'])->name('google.callback');
Route::post('loginWithOtp', [LoginController::class, 'loginWithOtp'])->name('loginWithOtp');
Route::get('loginWithOtp', function () {
    return view('auth/OtpLogin');
})->name('loginWithOtp');
Route::any('sendOtp', [LoginController::class, 'sendOtp'])->name('sendOtp');
Route::post('login', [LoginController::class, 'login']);

Route::post('forgot/password', [ForgotPasswordController::class, 'forgotPassword'])->name('forgot.password');
Route::get('password/reset/{token}', [ForgotPasswordController::class, 'resetPasswordFromWeb'])->name('password.reset');
Route::post('password/update/{token}', [ForgotPasswordController::class, 'passwordUpdate'])->name('password.update');

Route::post('templates', [TemplateFormController::class, 'templates'])->name('templates');
Route::post('canada/templates', [TemplateFormController::class, 'canadaTemplates'])->name('canada.templates');
Route::post('uk/templates', [TemplateFormController::class, 'unitedKingdomTemplates'])->name('uk.templates');

Route::group(['middleware' => ['auth'], 'namespace' => 'App\Http\Controllers'], function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::group(['name' => 'admin', 'prefix' => 'admin', 'middleware' => ['userCheck']], function () {
        Route::get('welcome', function () {
            return view('Admin/layouts/default');
        });
        Route::get('dashboard', function () {
            return view('Admin/dashboard');
        })->name('admin.dashboard');
        Route::get('template', function () {
            return view('Admin/template');
        });
        Route::get('color', function () {
            return view('Admin/color-codes');
        });
        Route::get('deduction', function () {
            return view('Admin/deduction');
        });
        Route::match(['GET', 'POST'], 'settings', [SettingController::class, 'settings'])->name('settings');
    });

    Route::post('usaStoreData', [TemplateFormController::class, 'usaStoreData'])->name('usaStoreData');
    Route::get('invoiceList', [TemplateFormController::class, 'invoiceList'])->name('invoiceList');
    Route::post('invoiceDelete/{id}', [TemplateFormController::class, 'invoiceDelete'])->name('invoiceDelete');
    Route::get('invoiceMail/{id}', [TemplateFormController::class, 'invoiceMail'])->name('invoiceMailId');
    Route::get('invoiceMail', [TemplateFormController::class, 'invoiceMail'])->name('invoiceMail');
    Route::get('invoiceEdit/{id}', [TemplateFormController::class, 'edit'])->name('invoiceEdit');
    Route::get('prizing', [PayStubController::class, 'prizing'])->name('prizing');
    Route::get('subscription', [TemplateFormController::class, 'subscription'])->name('subscription');
    // Route::match(['GET', 'POST'], 'settings', [SettingController::class, 'settings'])->name('settings');

    Route::get('profile', [HomeController::class, 'userDetails'])->name('profile');
    Route::post('profile/details/save', [HomeController::class, 'storeDetails'])->name('store.details');
    Route::post('profile-setup', [HomeController::class, 'storeDetails'])->name('profile-setup');

    Route::get('address/fetch', [AddressBookController::class, 'fetchAddress'])->name('fetch.address');
    Route::get('address/fetch/data', [AddressBookController::class, 'fetchAddressById'])->name('get.address');
    Route::post('address/save', [AddressBookController::class, 'storeAddress'])->name('store.address');
    Route::post('address/{id}/delete', [AddressBookController::class, 'deleteAddress'])->name('delete.address');
    Route::get('address/get/options', [AddressBookController::class, 'addressOptions'])->name('address.option');

    Route::post('account/delete', [HomeController::class, 'accountDelete'])->name('delete.account');
    Route::post('update-password', [HomeController::class, 'userDetails'])->name('update-password');
    Route::post('change-password', [HomeController::class, 'changePassword'])->name('changePassword');
    Route::get('forgotpassword', [HomeController::class, 'forgotpassword'])->name('forgotpassword');
});

Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction/{details}', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
Route::get('check/test', [TemplateFormController::class, 'deleteExtraPdf'])->name('check.test');
