<?php

namespace App\Http\Controllers;

use App\Models\Fonction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FonctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            // RETOURNE TOUTE LES FONCTIONS // 
            $fonctions = Fonction::all();
            return view('dashboard.fonction.fonction', compact('fonctions'));
        } 
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite.');
        }
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try{
            // RETOURNE LE FORMULAIRE POUR CREER UNE FONCTION //
            return view('dashboard.fonction.create_fonction');
        } 
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            // Validation des données
            $validator = Validator::make($request->all(), [
                'role' => 'required|min:2', 
            ]);
        
            //if ($validator->fails()) {
            //    return back()->withErrors($validator)->withInput();
            //}
        
            // Création du lien
            $add_fonction = new Fonction();
            $add_fonction->role = $request->input('role');
            $add_fonction->save();

            return redirect()->route('fonction.index')->with('success', 'Rôle créé avec succès!');
        } 
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
  
        try{
            // RETOURNE LE FORMULAIRE POUR MODIFIER UNE FOCNTION //
            $fonctions =  Fonction::find($id);
            return view('dashboard.fonction.edit_fonction', compact('fonctions'));

        } 
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            // Valider les données
            $validator = Validator::make($request->all(), [
                'role' => 'required|min:1', 
            ]);
        
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
        
            $fonction = Fonction::find($id);   
            $fonction->role = $request->input('role');
    
        
            $fonction->save();
        
            return redirect()->route('fonction.index')->with('success', 'Rôle modifié avec succès!');
        } 
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            // SUPPRIMER UN LIEN
            $fonction = Fonction::find($id);
            $fonction->delete();
        
            return redirect()->route('fonctions.index')->with('success', 'Rôle supprimé avec succès!');
        } 
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite.');
        }
    }
}
