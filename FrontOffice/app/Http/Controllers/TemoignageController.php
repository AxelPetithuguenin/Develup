<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temoignage;

class TemoignageController extends Controller
{
    // RETOURNE TOUTES LES INFORMATIONS DES TEMOIGNAGES POUR LA PAGE D'ACCUEIL
    public function index_accueil()
    {
        $temoignages = Temoignage::take(5)->get();
        return view('accueil', compact('temoignages'));
    }

    // RETOURNE LA VIEW DE TOUS LES TEMOIGNAGES
    public function index()
    {
        $temoignages = Temoignage::paginate(10);
        return view('temoignage', compact('temoignages'));
    }

    // RETOURNE LA PAGE DU TEMOIGNAGE D'UN ID SPÉCIFIQUE
    public function show($id)
    {
        $temoignage = Temoignage::find($id);
        return view('personnal_temoignage', compact('temoignage'));
    }
}
