<?php

use App\Http\Controllers\FundamentalSahamController;
use App\Http\Controllers\SahamController;
use App\Http\Controllers\SahamCtrl;
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
    return view('dashboard');
});

//Route::get('/', [SahamCtrl::class, 'getdb'])->name('dashboard_page');

Route::get('/per', function () {
    return view('tableCompany');
});

Route::get('/dashboard2', function () {
    return view('dashboard');
})->name('dashboard_page');

Route::get('/back', function () {
    return;
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

//Route::get('/exchange', [SahamController::class, 'exchange_page'])->name('exchange_page');
Route::post('/exchange-price', [SahamController::class, 'exchange_price'])->name('exchange_price');

Route::get('/company', [SahamController::class, 'company_page'])->name('company_page');
Route::post('/company-data', [SahamController::class, 'company_data'])->name('company_data');

Route::get('/company-list', [SahamController::class, 'company_list'])->name('company_list');

// Route::get('/eps', [FundamentalSahamController::class, 'eps_page'])->name('eps_page');
// Route::get('/per', [FundamentalSahamController::class, 'per_page'])->name('per_page');
// Route::get('/pbv', [FundamentalSahamController::class, 'pbv_page'])->name('pbv_page');
// Route::get('/roe', [FundamentalSahamController::class, 'roe_page'])->name('roe_page');
// Route::get('/dy', [FundamentalSahamController::class, 'dy_page'])->name('dy_page');
// Route::get('/der', [FundamentalSahamController::class, 'der_page'])->name('der_page');

Route::post('/fundamental-result', [FundamentalSahamController::class, 'fundamental'])->name('fundamental');
Route::post('/eps-result', [FundamentalSahamController::class, 'eps'])->name('eps');
Route::post('/per-result', [FundamentalSahamController::class, 'per'])->name('per');
Route::post('/pbv-result', [FundamentalSahamController::class, 'pbv'])->name('pbv');
Route::post('/roe-result', [FundamentalSahamController::class, 'roe'])->name('roe');
Route::post('/dy-result', [FundamentalSahamController::class, 'dy'])->name('dy');
Route::post('/der-result', [FundamentalSahamController::class, 'der'])->name('der');

Route::get('/fundamental', [FundamentalSahamController::class, 'fundamental_page'])->name('fundamental_page');
Route::get('/eps', [SahamController::class, 'eps_page'])->name('eps_page');
Route::get('/per', [SahamController::class, 'per_page'])->name('per_page');
Route::get('/pbv', [SahamController::class, 'pbv_page'])->name('pbv_page');
Route::get('/roe', [SahamController::class, 'roe_page'])->name('roe_page');
Route::get('/dy', [SahamController::class, 'dy_page'])->name('dy_page');
Route::get('/der', [SahamController::class, 'der_page'])->name('der_page');

Route::get('/exchange', [SahamCtrl::class, 'kurs_page'])->name('exchange_page');
