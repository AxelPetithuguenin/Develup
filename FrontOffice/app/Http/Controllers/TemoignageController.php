<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temoignage;
use App\Models\Actualite;

class TemoignageController extends Controller
{
    // RETOURNE TOUTES LES INFORMATIONS DES TEMOIGNAGES POUR LA PAGE D'ACCUEIL
    public function index_accueil()
    {
        $temoignages = Temoignage::take(7)->get();
        $actualites = Actualite::take(5)->get();
        return view('accueil', compact('temoignages', 'actualites'));
    }

    // RETOURNE LA VIEW DE TOUS LES TEMOIGNAGES
    public function index()
    {
        $temoignages = Temoignage::orderBy('created_at', 'desc')->paginate(12);
        return view('temoignage', compact('temoignages'));
    }

    // RETOURNE LA PAGE DU TEMOIGNAGE D'UN ID SPÉCIFIQUE
    public function show($id)
    {
        $temoignage = Temoignage::find($id);
        return view('personnal_temoignage', compact('temoignage'));
    }
}
