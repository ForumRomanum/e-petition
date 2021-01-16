<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PetitionController;
use App\Http\Controllers\SignController;
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

Route::get('/', [HomeController::class, 'index'])
    ->name('main-page');

Route::get('/petitions', [PetitionController::class, 'index'])
    ->name('petitions');

Route::get('/petitions/{id}', [PetitionController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('single-petition');

Route::post('/petitions/{id}/sign', [SignController::class, 'sign'])
    ->where('id', '[0-9]+')
    ->name('sign-petition');
Route::get('/confirm-signature/{token}', [SignController::class, 'confirmSignature'])
    ->name('confirm-signature');

Route::middleware('auth')->group(function () {
    Route::get('/petitions/create', function () {
        return view('pages.create-petition');
    })->name('create-petition');

    Route::post('/petitions/create', [PetitionController::class, 'create']);

    Route::get('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});

//AUTH
Route::get('/login', function () {
    return view('pages.auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('pages.auth.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register']);
