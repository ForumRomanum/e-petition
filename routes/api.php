<?php

use App\Http\Controllers\Api\ApiPetitionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/signs-info', [ApiPetitionController::class, 'getSignsInfo'])
    ->name('api-signs-info');

Route::get('/petitions/{id}/get-pdf', [ApiPetitionController::class, 'generatePetitionPdf'])
    ->name('get-petition-in-pdf');
