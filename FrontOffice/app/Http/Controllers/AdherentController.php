<?php

namespace App\Http\Controllers;

use App\Models\Adherent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdherentController extends Controller
{
    // RETOURNE LA VIEW
    public function showForm()
    {
        return view('adherer');
    }

    // RENVOYER LES INFORMATIONS DANS LA BASE DE DONNEE
    public function store(Request $request)
    {
        try{
            // Validation des données
            $validator = Validator::make($request->all(), [
                'nom' => 'required|min:2', 
                'prenom' => 'required|min:2', 
                'email' => 'required|email|unique:adherents,email|max:255',
            ]);
        
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }        
                
            // Création du adhérent
            $adherent = new Adherent();
            $adherent->nom = $request->input('nom');
            $adherent->prenom = $request->input('prenom');
            $adherent->email = $request->input('email');
            $adherent->save();
        
            return redirect()->route('adherer-show')->with('success', 'Adhesions réussite!');
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite.');
        }
    
    }
}
