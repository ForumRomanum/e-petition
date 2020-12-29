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

Route::get('/', 'HomeController@index');
Route::get('/search', 'HomeController@search');

//AUTH
Route::get('/login', function () {
    return view('pages.auth.login');
});
Route::post('/login', 'AuthController@login');

Route::get('/register', function () {
    return view('pages.auth.register');
});
Route::post('/register', 'AuthController@register');
