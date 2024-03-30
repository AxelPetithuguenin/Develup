<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partenaire;

class PartenairesController extends Controller
{
    // RETOURNE TOUTES LES INFORMATIONS DES PARTENAIRES
    public function index()
    {
        $partenaires = Partenaire::all();
        return view('partenaires.index', compact('partenaires'));
    }
}
