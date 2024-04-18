<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actualite;

class ActualiteController extends Controller
{
    // RETOURNE TOUTES LES INFORMATIONS DES ACTUALITES
    public function index()
    {
        $actualites =  Actualite::orderBy('created_at', 'desc')->paginate(10);
        return view('/actualite', compact('actualites'));
    }

    // RETOURNE LA PAGE DE L'ACTU D'UN ID SPÉCIFIQUE
    public function show($id)
    {
        $actualites = Actualite::find($id);
        return view('personnal_actualite', compact('actualites'));
    }
}
