<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\MessageController;

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
Route::get('login', [AccountController::class, 'login'])->name('login');
Route::post('auth', [AccountController::class, 'auth'])->name('auth');
Route::get('account', [AccountController::class, 'index'])->name('account')->middleware('auth');
Route::post('account', [AccountController::class, 'store'])->name('accountPost');
Route::post('message', [MessageController::class, 'store'])->name('messagePost')->middleware('auth');;
Route::get('message', [MessageController::class, 'index'])->name('messages')->middleware('auth');;
Route::get('message/{id}', [MessageController::class, 'detail'])->name('messageDetail')->middleware('auth');;
Route::get('/', [HomeController::class, 'index'])->name('home');
