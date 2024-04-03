<?php

use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\TemoignageController;
use App\Http\Controllers\PartenairesController;
use App\Http\Controllers\LiensController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*===== PARTENAIRES =====*/
Route::resource('dashboard/partenaires', PartenairesController::class);
/*===== LIENS =====*/
Route::resource('liens', LiensController::class);

/*===== TEMOIGNAGE =====*/
Route::resource('dashboard/temoignage', TemoignageController::class);
Route::resource('/actualites', ActualiteController::class);