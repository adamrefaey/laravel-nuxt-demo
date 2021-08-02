<?php

use App\Http\Controllers\User\UpdateUser;
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
        Route::post('update', UpdateUser::class)->name('update');
    });
});
