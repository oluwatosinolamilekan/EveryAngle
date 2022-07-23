<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UserController::class, 'login']);

//Route::middleware(['auth_api'])->group(function () {
    Route::get('/profile', [UserController::class, 'show']);
    Route::controller(CategoryController::class)->group(function () {
        Route::prefix('category')->group(function () {
            Route::get('/', 'index');
            Route::get('/show/{id}', 'view');
            Route::post('/store', 'create');
            Route::put('/update/{id}', 'update');
            Route::delete('/delete/{id}', 'delete');
        });
    });

    Route::controller(MediaController::class)->group(function () {
        Route::prefix('media')->group(function () {
            Route::get('/', 'index');
            Route::get('/show/{id}', 'view')->name('media.show');
            Route::post('/store', 'create');
            Route::put('/update/{id}', 'update');
            Route::delete('/delete/{id}', 'delete');
        });
    });
//});

