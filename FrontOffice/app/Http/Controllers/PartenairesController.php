<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partenaire;

class PartenairesController extends Controller
{
    // RETOURNE TOUTES LES INFORMATIONS DES PARTENAIRES
    public function index()
    {
        $partenaires =  Partenaire::orderBy('created_at', 'desc')->paginate(20);
        return view('/partenaires', compact('partenaires'));
    }
}
