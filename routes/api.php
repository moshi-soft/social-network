<?php

use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\PageController;
use App\Http\Controllers\API\RegistrationController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->group(static function (){
    Route::prefix('page')->group(function () {
        Route::post('create', [PageController::class, 'create']);
    });
});
Route::prefix('auth')->group(function () {
    Route::post('register', [RegistrationController::class, 'register']);
    Route::post('login', [LoginController::class, 'login']);
});

