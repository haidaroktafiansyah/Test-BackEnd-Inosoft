<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GetUserController;
use App\Http\Controllers\KendaraanController;
use Illuminate\Auth\Events\Logout;
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


Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);
Route::get('logout', LogoutController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('kendaraan', KendaraanController::class);
    Route::get('mobil', [KendaraanController::class, 'getAllMobil']);
    Route::get('motor', [KendaraanController::class, 'getAllMotor']);
});
