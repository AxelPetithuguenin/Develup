<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actualite;

class ActualiteController extends Controller
{
    // RETOURNE TOUTES LES INFORMATIONS DES ACTUALITES
    public function index()
    {
    $actualite =  Actualite::all();
    return view('/partenaires', compact('actualite'));
    }
}
