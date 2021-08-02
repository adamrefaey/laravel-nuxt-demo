<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
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

Route::middleware('guest:sanctum')->group(function () {
    Route::post('/register', Register::class)->name('register');
    Route::post('/login', Login::class)->name('login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', Logout::class)->name('logout');
});
