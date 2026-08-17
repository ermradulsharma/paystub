<?php

use App\Http\Controllers\API\DeductionController;
use App\Http\Controllers\API\TemplatesController;
use App\Http\Controllers\API\UserController;
use App\Http\Middleware\LogAfterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware([LogAfterRequest::class])->group(function () {

    // =========================================================================
    // 1. Public API Routes
    // =========================================================================
    Route::get('get-templates', [TemplatesController::class, 'getTemplate']);
    Route::get('get-deduction', [DeductionController::class, 'getDeduction']);
    Route::get('get-state-taxes', [DeductionController::class, 'getStateTaxes']);
    Route::post('template-preview', [TemplatesController::class, 'templatesPreview']);
    Route::post('generate-pdf', [TemplatesController::class, 'generatePdf']);

    // Public Auth & OTP
    Route::post('send-otp', [UserController::class, 'sendOtp']);
    Route::post('login', [UserController::class, 'loginWithOtp']);
    Route::post('email-login', [UserController::class, 'loginWithPassword']);
    Route::post('forgot-password', [UserController::class, 'forgotPassword']);
    Route::post('social-login', [UserController::class, 'socialLogin']);
    Route::post('restore-account', [UserController::class, 'restoreAccount']);

    // =========================================================================
    // 2. Authenticated API Routes (auth:api Middleware)
    // =========================================================================
    Route::middleware(['auth:api'])->group(function () {

        // User Account Management
        Route::post('logout', [UserController::class, 'logout']);
        Route::post('deactivate-account', [UserController::class, 'deactivateAccount']);
        Route::post('delete-account', [UserController::class, 'deleteAccount']);
        Route::get('get-profile', [UserController::class, 'getUserProfile']);
        Route::post('update-profile', [UserController::class, 'updateProfile']);
        Route::post('update-user-profile', [UserController::class, 'updateUserProfile']);
        Route::post('account-update', [UserController::class, 'accountUpdate']);

        // Address Book API
        Route::post('address-book', [UserController::class, 'addressBook']);
        Route::post('address-delete', [UserController::class, 'addressDelete']);
        Route::get('get-address', [UserController::class, 'getAddress']);
        Route::post('edit-address', [UserController::class, 'editAddress']);
        Route::get('get-address-list', [UserController::class, 'getAddressBook']);

        // Templates & PDF Management
        Route::post('save-form-data', [TemplatesController::class, 'templatesDataSave']);
        Route::get('get-pdf-list', [TemplatesController::class, 'getPdfList']);
        Route::post('delete-template', [TemplatesController::class, 'deleteTemplate']);
        Route::post('edit-form-data', [TemplatesController::class, 'editFormData']);
        Route::post('download-pdf', [TemplatesController::class, 'generatePdf']);

        // Subscriptions
        Route::post('subscription', [TemplatesController::class, 'subscription']);
        Route::get('check-subscription', [TemplatesController::class, 'checkSubscription']);
    });
});
