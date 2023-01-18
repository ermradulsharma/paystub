<?php

use App\Http\Controllers\API\TemplatesController;
use App\Http\Controllers\API\DeductionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    Route::group(['middleware' => ['auth:api']], function () {
    });
});
