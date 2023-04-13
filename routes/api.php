<?php

use App\Http\Controllers\API\TemplatesController;
use App\Http\Controllers\API\DeductionController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Router;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api', 'middleware' => ['\App\Http\Middleware\LogAfterRequest::class']], function () {
    Route::get('get-templates', [TemplatesController::class, 'getTemplate']);
    Route::get('get-deduction', [DeductionController::class, 'getDeduction']);
    Route::get('get-state-taxes', [DeductionController::class, 'getStateTaxes']);
    Route::post('template-preview', [TemplatesController::class, 'templatesPreview']);
    Route::post('send-otp', [UserController::class, 'sendOtp']);
    Route::post('login', [UserController::class, 'loginWithOtp']);
    Route::post('email-login', [UserController::class, 'loginWithPassword']);
    Route::post('forgot-password', [UserController::class, 'forgotPassword']);
    Route::post('social-login', [UserController::class, 'socialLogin']);
    Route::post('generate-pdf', [TemplatesController::class, 'generatePdf']);

    // User account restore
    Route::post('restore-account', [UserController::class, 'restoreAccount']);
    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('logout', [UserController::class, 'logout']);
        Route::post('deactivate-account', [UserController::class, 'deactivateAccount']);
        Route::post('delete-account', [UserController::class, 'deleteAccount']);
        Route::get('get-profile', [UserController::class, 'getUserProfile']);
        Route::post('update-profile', [UserController::class, 'updateProfile']);

        Route::post('address-book', [UserController::class, 'addressBook']);
        Route::post('address-delete', [UserController::class, 'addressDelete']);
        Route::get('get-address', [UserController::class, 'getAddress']);
        Route::post('edit-address', [UserController::class, 'editAddress']);

        Route::post('account-update', [UserController::class, 'accountUpdate']);

        Route::post('update-user-profile', [UserController::class, 'updateUserProfile']);
        Route::post('save-form-data', [TemplatesController::class, 'templatesDataSave']);
        Route::get('get-pdf-list', [TemplatesController::class, 'getPdfList']);
        Route::post('delete-template', [TemplatesController::class, 'deleteTemplate']);
        Route::post('edit-form-data', [TemplatesController::class, 'editFormData']);
        Route::post('download-pdf', [TemplatesController::class, 'generatePdf']);
        Route::post('subscription', [TemplatesController::class, 'subscription']);
        Route::get('check-subscription', [TemplatesController::class, 'checkSubscription']);
        // Route::post('invoice', [TemplatesController::class, 'invoiceMail']);
    });
});
