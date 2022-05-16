<?php

use App\Http\Controllers\SahamController;
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

Route::get('/dash', function () {
    return view('dashboard');
});

Route::get('/per', function () {
    return view('tableCompany');
});

Route::get('/dashboard2', function () {
    return view('dashboard');
})->name('dashboard_page');

Route::get('/back', function () {
    return ;
})->name('back');

Route::get('/demo', [SahamController::class, 'intraday_demo'])->name('demo');
Route::get('/dashboard', [SahamController::class, 'dashboard'])->name('dashboard_page');

Route::get('/intraday', [SahamController::class, 'stock_page'])->name('stock_page');
Route::post('/intraday-stock', [SahamController::class, 'intraday_stock'])->name('intraday_stock');
Route::post('/save-intraday-stock', [SahamController::class, 'save_intraday_stock'])->name('save_intraday_stock');

Route::get('/daily', [SahamController::class, 'daily_stock_page'])->name('daily_stock_page');
Route::post('/daily-stock', [SahamController::class, 'daily_stock'])->name('daily_stock'); 

Route::get('/forex', [SahamController::class, 'forex_page'])->name('forex_page');
Route::post('/intraday-forex', [SahamController::class, 'intraday_forex'])->name('intraday_forex');

Route::get('/exchange', [SahamController::class, 'exchange_page'])->name('exchange_page');
Route::post('/exchange-price', [SahamController::class, 'exchange_price'])->name('exchange_price');

Route::get('/company', [SahamController::class, 'company_page'])->name('company_page');
Route::post('/company-data', [SahamController::class, 'company_data'])->name('company_data');

Route::get('/company-list', [SahamController::class, 'company_list'])->name('company_list');