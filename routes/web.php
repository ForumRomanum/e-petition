<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('main-page');
Route::get('/search', [HomeController::class, 'search'])->name('search');

//AUTH
Route::get('/login', function () {
    return view('pages.auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('pages.auth.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register']);
