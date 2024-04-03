<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temoignage;

class TemoignageController extends Controller
{
    // RETOURNE TOUTES LES INFORMATIONS DES TEMOIGNAGES
    public function index()
    {
        $temoignages = Temoignage::paginate(10); // A VOIR 
        return view('temoignage', compact('temoignages'));
    }    
    
    // RETOURNE LA PAGE DU TEMOIGNAGE D'UN ID SPÉCIFIQUE
    public function show($id)
    {
        // Récupérer le témoignage avec l'ID spécifié
        $temoignage = Temoignage::find($id);
        
        // Retourner la vue du témoignage individuel avec les données du témoignage
        return view('personnal_temoignage', compact('temoignage'));
    }
}
