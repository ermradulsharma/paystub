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

Route::get('/', function () {
    return view('paystub');
});
// Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
// Route::get('auth/google/callback', 'handleGoogleCallback');
Route::get('Login', [LoginController::class, 'loginWithGoogle'])->name('login.google');
Route::any('callback', [LoginController::class, 'callbackFromGoogle'])->name('callback');

Route::get('generate-pdf', [W2FormController::class, 'generatePDF']);
Route::get('preview-pdf', [W2FormController::class, 'previewPDF']);

Route::get('tempBasic-pdf', [TemplateFormController::class, 'BasicPaystubUsaPDF']);
Route::get('paystubBlue-pdf', [TemplateFormController::class, 'BasicpatstubBluePDF']);

// shubham
Route::get('cerulean-pdf', [TemplateFormController::class, 'advanceCeruleanUsa']);
Route::get('district-pdf', [TemplateFormController::class, 'advanceDistrictUsa']);
// shubham end


Route::get('usa', [UsaController::class, 'index']);
Route::get('canada-paystub', [CanadaController::class, 'index']);
Route::get('uk-paystub', [UkController::class, 'index']);
Route::get('globle', [UsaController::class, 'templateGloble']);

// payal //
Route::get('pt_green-pdf', [TemplateFormController::class, 'AdvancePtGreenPaystubPDF']);
Route::get('pt_blue-pdf', [TemplateFormController::class, 'AdvancePtBlueUsaPDF']);
Route::get('pt_brown-pdf', [TemplateFormController::class, 'AdvancePtBrownUsaPDF']);
Route::get('prior-pdf', [TemplateFormController::class, 'BasicPriorUsaPDF']);
Route::get('check-pdf', [TemplateFormController::class, 'AdvanceCheckUsaPDF']);
Route::get('pin_blue-pdf', [TemplateFormController::class, 'BasicPinBlueUkPDF']);
Route::get('uk-tawny-pdf', [TemplateFormController::class, 'BasicTawnyUkPDF']);

// gurvinder
Route::get('bluebox-pdf', [TemplateFormController::class, 'AdvanceBlueBoxUsaPDF']);
Route::get('globle-pdf', [TemplateFormController::class, 'AdvanceglobleUsaPDF']);
Route::get('modern-pdf', [TemplateFormController::class, 'AdvanceModernUsaPDF']);
Route::get('sageblue-pdf', [TemplateFormController::class, 'BasicUkPDF']);

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
Route::get('prizing', function () {
    return view('prizing');
});







Route::name('admin')->prefix('backend')->group(function () {


    Route::get('/', function () {
        return view('Admin/login');
    });
    Route::get('welcome', function () {
        return view('Admin/layouts/default');
    });

    Route::get('dashboard', function () {
        return view('Admin/dashboard');
    });
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




