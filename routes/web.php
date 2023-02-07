<?php

use App\Http\Controllers\CanadaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TemplateFormController;
use App\Http\Controllers\UkController;
use App\Http\Controllers\UsaController;
use App\Http\Controllers\W2FormController;
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





Route::get('patstubx_modern-pdf', [UkController::class, 'patstubx_modern']);
Route::get('pin_blue_uk-pdf', [UkController::class, 'pin_blue_uk']);
Route::get('sage_blue_uk-pdf', [UkController::class, 'sage_blue_uk']);

Route::get('tawny-pdf', [UkController::class, 'tawny']);
Route::get('taffy-pdf', [UkController::class, 'taffy']);
Route::get('mint-pdf', [UkController::class, 'mint']);
Route::get('aegean-pdf', [UkController::class, 'aegean']);
Route::get('fog-pdf', [UkController::class, 'fog']);

Route::get('generate-pdf', [W2FormController::class, 'generatePDF']);
Route::get('preview-pdf', [W2FormController::class, 'previewPDF']);

Route::get('pin_blue-pdf', [TemplateFormController::class, 'BasicPinBlueUkPDF']);
Route::get('uk-tawny-pdf', [TemplateFormController::class, 'BasicTawnyUkPDF']);
Route::get('sageblue-pdf', [TemplateFormController::class, 'BasicUkPDF']);






Route::match(['get', 'post'], 'usa', [UsaController::class, 'index']);
Route::get('canada-paystub', [CanadaController::class, 'index']);
Route::get('uk-paystub', [UkController::class, 'index']);
Route::get('globle', [UsaController::class, 'templateGloble']);




Route::get('canada', function () {
    return view('canada');
});
Route::get('uk', function () {
    return view('uk');
});

Route::get('form', function () {
    return view('forms');
});
Route::get('terms', function () {
    return view('terms');
});

Route::get('privacy', function () {
    return view('privacy');
});
Route::get('refund', function () {
    return view('refund');
});

Route::get('w2paystub', function () {
    return view('w2paystub');
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
/* Route::get('prizing', function () {
    return view('prizing');
}); */

Route::get('/', function () {
    return view('paystub');
})->name('welcome');

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

Route::group(['middleware' => ['auth']], function () {
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
    Route::get('usa/edit/{id}', [UsaController::class, 'edit'])->name('invoice-Usa-Edit');
    Route::get('prizing', [UsaController::class, 'prizing'])->name('prizing');
    Route::get('subscription', [TemplateFormController::class, 'subscription'])->name('subscription');
});
