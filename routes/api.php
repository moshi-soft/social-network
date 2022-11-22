<?php

use App\Http\Controllers\API\FeedController;
use App\Http\Controllers\API\FollowController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\PageController;
use App\Http\Controllers\API\PostController;
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

Route::middleware('auth:sanctum')->group(static function () {
    Route::prefix('page')->group(function () {
        Route::post('create', [PageController::class, 'create']);
        Route::post('{pageId}/attach-post', [PostController::class, 'createPostForPage']);
    });
    Route::prefix('person')->group(function () {
        Route::post('attach-post', [PostController::class, 'createPostForPerson']);
        Route::get('feed', [FeedController::class, 'feeds']);
    });
    Route::prefix('follow')->group(function () {
        Route::put('person/{personId}', [FollowController::class, 'followPerson']);
        Route::put('page/{pageId}', [FollowController::class, 'followPage']);
    });

    Route::post('logout', [LoginController::class, 'logout']);
});
Route::prefix('auth')->group(function () {
    Route::post('register', [RegistrationController::class, 'register']);
    Route::post('login', [LoginController::class, 'login']);
});

