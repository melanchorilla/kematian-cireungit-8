<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;

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
    return view('landingpage');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::resource('/transaction', TransactionController::class)->middleware('auth')->except(['create', 'show']);
Route::get('/apitransaction', [TransactionController::class, 'apiTransaction'])->name('api.transaction')->middleware('auth');
Route::get('/transactionreportview', [TransactionController::class, 'transactionReportView'])->name('transaction.reportview')->middleware('auth');
Route::post('/transactionreportpdf', [TransactionController::class, 'transactionReportPdf'])->name('transaction.reportpdf')->middleware('auth');

Route::resource('/stock', StockController::class)->middleware('auth')->except(['create', 'show']);
Route::get('/apistock', [StockController::class, 'apiStock'])->name('api.stock')->middleware('auth');

Route::resource('/user', UserController::class)->middleware('auth')->except(['create', 'store', 'show']);
Route::get('/apiuser', [UserController::class, 'apiUser'])->name('api.user')->middleware('auth');
Route::get('/profile/{user}/edit', [UserController::class, 'editProfile'])->name('profile')->middleware('auth');
Route::put('/profile/{user}', [UserController::class, 'updateProfile'])->middleware('auth');
