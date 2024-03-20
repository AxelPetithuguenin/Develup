<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimplyRouteController extends Controller
{
    /*===== NAVBAR ROUTES =====*/

    /*===== ACUUEIL =====*/
        /*===== ACUUEIL PAGE =====*/ 
        function accueil(){
            return view('accueil'); 
        }

    /*===== TEMOIGNAGE =====*/
        /*===== TEMOIGNAGE PAGE =====*/ 
        function temoignage(){
            return view('temoignage_page'); 
        }

    /*===== DON MOELLE OSSEUSE =====*/
        /*===== DON MOELLE OSSEUSE PAGE =====*/ 
        function don_moelle_osseuse(){
            return view('don_moelle_osseuse'); 
        }
        /*===== AGE DON MOELLE OSSEUSE PAGE =====*/ 
        function age_don_moelle_osseuse(){
            return view('age_don_moelle_osseuse'); 
        }

    /*===== ASSOCIATION =====*/
        /*===== PRESENTATION PAGE =====*/ 
        function presentation(){
            return view('presentation'); 
        }
        /*===== PARTENAIRES =====*/ 
        function partenaires(){
            return view('partenaires'); 
        }
        /*===== RESULTATS PAGE =====*/ 
        function resultats(){
            return view('don_moelle_osseuse'); // A FAIRE LA VIEW
        }
        /*===== ADHERER PAGE  =====*/ 
        function adherer(){
            return view('don_moelle_osseuse'); // A FAIRE LA VIEW
        }
    
    /*===== NOUS CONTACTER =====*/
        /*===== NOUS CONTACTER PAGE =====*/ 
        function contact(){
            return view('adherer'); // A FAIRE LA VIEW
        }

    /*===== DEVENIR DONNEUR =====*/
        /*===== DEVENIR DONNEUR =====*/ 
        function devenir_donneur(){
            return view('adherer');  // A FAIRE LA VIEW
        }
}
