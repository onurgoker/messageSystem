<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('account', [AccountController::class, 'index'])->name('account');
Route::get('login', [AccountController::class, 'login'])->name('login');
Route::post('account', [AccountController::class, 'store'])->name('accountPost');
Route::get('/', [HomeController::class, 'index'])->name('home');
