<?php

use App\Http\Controllers\User\UpdateUser;
use App\Http\Controllers\User\ViewMe;
use App\Http\Controllers\User\ViewUser;
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

Route::prefix('user')->name('user.')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('me', ViewMe::class)->name('me');
        Route::post('update', UpdateUser::class)->name('update');
        Route::get('{user}', ViewUser::class)->name('view-user');
    });
});
