<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemoignageController;
use App\Http\Controllers\PartenairesController;
use App\Http\Controllers\LiensController;
use App\Http\Controllers\AdherentController;
use App\Http\Controllers\ActualiteController;
use App\Models\Adherent;
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

/*===== LOGIN =====*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/*===== ACTUALITE =====*/
Route::resource('/actualites', ActualiteController::class)->middleware('auth');
/*===== PARTENAIRES =====*/
Route::resource('dashboard/partenaires', PartenairesController::class)->middleware('auth');
/*===== LIENS =====*/
Route::resource('liens', LiensController::class)->middleware('auth');
/*===== TEMOIGNAGE =====*/
Route::resource('dashboard/temoignage', TemoignageController::class)->middleware('auth');
/*===== ADHERENT =====*/
Route::resource('dashboard/adherent', AdherentController::class)->middleware('auth');