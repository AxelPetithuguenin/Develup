<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimplyRouteController extends Controller
{
    /*===== NAVBAR ROUTES =====*/

    /*===== DON MOELLE OSSEUSE =====*/
        /*===== DON MOELLE OSSEUSE PAGE =====*/ 
        function don_moelle_osseuse(){
            return view('don_moelle_osseuse'); 
        }
        /*===== AGE DON MOELLE OSSEUSE PAGE =====*/ 
        function age_don_moelle_osseuse(){
            return view('age_don_moelle_osseuse'); 
        }

    /*===== NOS ACTIONS =====*/
        /*===== NOUS CONTACTER PAGE =====*/ 
        function actions(){
            return view('actions'); 
        }

    /*===== ASSOCIATION =====*/
        /*===== PRESENTATION PAGE =====*/ 
        function presentation(){
            return view('presentation'); 
        }

        /*===== RESULTATS PAGE =====*/ 
        function resultats(){
            return view('don_moelle_osseuse'); 
        }

    /*===== NOUS CONTACTER =====*/
        /*===== NOUS CONTACTER PAGE =====*/ 
        function contact(){
            return view('contact'); 
        }
}
