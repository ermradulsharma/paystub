<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PayStubController;
use App\Http\Controllers\TemplateFormController;
use App\Http\Controllers\PayPalController;
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
Route::get('template-view', function () {
    return view('template');
});
Route::get('userDashboard', function () {
    return view('user-dashboard');
});



Route::get('auth/Login', [LoginController::class, 'loginWithGoogle'])->name('login.google');
Route::match(['get', 'post'], 'google/callback', [LoginController::class, 'callbackFromGoogle'])->name('google.callback');
Route::post('loginWithOtp', [LoginController::class, 'loginWithOtp'])->name('loginWithOtp');
Route::get('loginWithOtp', function () {
    return view('auth/OtpLogin');
})->name('loginWithOtp');
Route::any('sendOtp', [LoginController::class, 'sendOtp']);
Route::post('login', [LoginController::class, 'login']);

Route::post('templates', [TemplateFormController::class, 'templates'])->name('templates');
Route::post('canada/templates', [TemplateFormController::class, 'canadaTemplates'])->name('canada.templates');
Route::post('uk/templates', [TemplateFormController::class, 'unitedKingdomTemplates'])->name('uk.templates');

Route::group(['middleware' => ['auth'],'namespace'=>'App\Http\Controllers'], function () {
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
    });

    Route::post('usaStoreData', [TemplateFormController::class, 'usaStoreData'])->name('usaStoreData');
    Route::get('invoiceList', [TemplateFormController::class, 'invoiceList'])->name('invoiceList');
    Route::post('invoiceDelete/{id}', [TemplateFormController::class, 'invoiceDelete'])->name('invoiceDelete');
    Route::get('invoiceMail/{id}', [TemplateFormController::class, 'invoiceMail'])->name('invoiceMailId');
    Route::get('invoiceMail', [TemplateFormController::class, 'invoiceMail'])->name('invoiceMail');
    Route::get('invoiceEdit/{id}', [TemplateFormController::class, 'edit'])->name('invoiceEdit');
    Route::get('prizing', [PayStubController::class, 'prizing'])->name('prizing');
    Route::get('subscription', [TemplateFormController::class, 'subscription'])->name('subscription');
    // Route::resource('admin/plans', 'PlanController');


});

    Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
    Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
    Route::get('success-transaction/{planId}', [PayPalController::class, 'successTransaction'])->name('successTransaction');
    Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
