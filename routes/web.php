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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/payumoney',[\App\Http\Controllers\PayumoneyController::class, 'payuPayment'])->name('payumoney');
Route::get('/zapakpay',[\App\Http\Controllers\ZapakPayController::class, 'zapakpayPayment'])->name('zapakpay');

Route::post('/zapakpay/response',[\App\Http\Controllers\ZapakPayController::class, 'responsePayment'])->name('response');
Route::post('/payumoney/response',[\App\Http\Controllers\PayumoneyController::class, 'payuResponse']);
