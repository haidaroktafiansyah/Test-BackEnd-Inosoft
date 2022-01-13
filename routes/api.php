<?php

use App\Http\Controllers\KendaraanController;

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


Route::resource('kendaraan', KendaraanController::class);
Route::get('mobil', [KendaraanController::class, 'getAllMobil']);
Route::get('motor', [KendaraanController::class, 'getAllMotor']);
