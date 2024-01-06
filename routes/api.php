<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    CurrencyController,
    DirectionController,
    ExchangeController
};
use App\Http\Controllers\Api\Auth\{
    LoginController,
    RegisterController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [LoginController::class, 'login'])->name('login_post');
Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::middleware('auth:api')->group( function () {
    Route::resources([
        'currencies' => CurrencyController::class,
        'directions' => DirectionController::class,
        'exchanges' => ExchangeController::class
    ]);
});

