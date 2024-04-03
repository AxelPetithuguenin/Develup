<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimplyRouteController;
    use App\Http\Controllers\PartenairesController;
    use App\Http\Controllers\TemoignageController;



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

/*===== LANDING PAGE (ACCUEIL PAGE) =====*/
Route::get('/', function () {
    return view('accueil');
});


/*===== NAVBAR ROUTES =====*/

    /*===== ACCUEIL PAGE =====*/
    Route::get('/engagement-leucemie', [SimplyRouteController::class,'accueil'])->name('accueil-show'); 

    /*===== TEMOIGNAGE =====*/  
        /*===== TEMOIGNAGE PAGE =====*/ 
        Route::get('/temoignage', [TemoignageController::class, 'index'])->name('temoignage-show');
        /*===== PERSONNAL TEMOIGNAGE PAGE =====*/ 
        Route::get('/temoignage/{id}', [TemoignageController::class, 'show'])->name('personnal_temoignage');

    /*===== ACTIONS =====*/


    
    /*===== DON MOELLE OSSEUSE =====*/
        /*===== DON MOELLE OSSEUSE PAGE =====*/ 
        Route::get('/don-moelle-osseuse', [SimplyRouteController::class,'don_moelle_osseuse'])->name('don-moelle-osseuse-show'); 
        /*===== AGE DON MOELLE OSSEUSE PAGE =====*/ 
        Route::get('/pourquoi-18-35-ans-don-moelle-osseuse', [SimplyRouteController::class,'age_don_moelle_osseuse'])->name('age-moelle-osseuse-show'); 

    /*===== ASSOCIATION =====*/
        /*===== PRESENTATION PAGE =====*/ 
        Route::get('/presentation-bureau', [SimplyRouteController::class,'presentation'])->name('presentation-show'); 
        /*===== PARTENAIRES =====*/ 
        Route::get('/partenaires', [PartenairesController::class,'index'])->name('partenaires-show'); 
        /*===== RESULTATS PAGE =====*/ 
        Route::get('/resultats', [SimplyRouteController::class,'resultats'])->name('resultats-show'); 
        /*===== ADHERER PAGE  =====*/ 
        Route::get('/adherer', [SimplyRouteController::class,'adherer'])->name('adherer-show'); 

    /*===== NOUS CONTACTER =====*/
        /*===== NOUS CONTACTER PAGE =====*/ 
        Route::get('/nous-contacter', [SimplyRouteController::class,'contact'])->name('contact-show'); 
    
    /*===== DEVENIR DONNEUR =====*/
        /*===== DEVENIR DONNEUR =====*/ 
        Route::get('/devenir-donneur', [SimplyRouteController::class,'devenir_donneur'])->name('devenir-donneur-show'); 
