<?php


use Illuminate\Support\Facades\Route;

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
Route::get('usa', function () {
    return view('usa');
});
Route::get('canada', function () {
    return view('canada');
});
Route::get('uk', function () {
    return view('uk');
});
Route::get('globle', function () {
    return view('globle');
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
Route::get('canada-paystub', function () {
    return view('canadaPaystub');
});
Route::get('uk-paystub', function () {
    return view('ukPaystub');
});
Route::get('w2paystub', function () {
    return view('w2paystub');
});
Route::get('contact', function () {
    return view('contact');
});

