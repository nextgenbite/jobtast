<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\ResortController;
use App\Http\Controllers\API\ReservationController;
use App\Http\Controllers\API\HomeController;

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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::post('booking/{id}', [HomeController::class, 'AddBooking']);
   
Route::middleware('auth:api')->group( function () {
    Route::resource('customer', CustomerController::class);
    Route::resource('resort', ResortController::class);
    Route::resource('reservation', ReservationController::class);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

