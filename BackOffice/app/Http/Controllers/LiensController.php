<?php

namespace App\Http\Controllers;

use App\Models\Liens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class LiensController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            // RETOURNE TOUT LES LIENS // 
            $liens = Liens::Paginate(20);
            return view('dashboard.liens.lien', compact('liens'));
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
            // RETOURNE LE FORMULAIRE POUR CREER UN LIEN //
            return view('dashboard.liens.creer_lien');
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
                'nom' => 'required|min:1|unique:liens', 
                'icone' => 'required|file|mimes:svg|max:2048',
            ]);
        
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
        
            // Traitement de l'image uploadée
            if ($request->hasFile('icone')) {
                $icone = $request->file('icone');
                $iconeName = $icone->getClientOriginalName(); 
                $logoPath = $icone->storeAs('public/icone', $iconeName);    
            }
        
            // Création du lien
            $add_lien = new Liens();
            $add_lien->nom = $request->input('nom');
            $add_lien->icone = $iconeName; // Utilise le nom du fichier
        
            $add_lien->save();
        
            return redirect()->route('liens.index')->with('success', 'Lien créé avec succès!');
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
            // RETOURNE LE FORMULAIRE POUR MODIFIER UN LIEN //
            $liens =  Liens::find($id);
            return view('dashboard.liens.edit_lien', compact('liens'));
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
                'nom' => [
                    'required',
                    'min:1',
                    Rule::unique('liens')->ignore($id),
                ], // Permet de changer l'icone sans devoir modifier le nom à cause du unique
                'icone' => 'nullable|file|mimes:svg|max:2048',
            ]);
        
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
        
            $lien = Liens::find($id);   
            $lien->nom = $request->input('nom');
        
            // Traitement du nouveau logo si fourni
            if ($request->hasFile('icone')) {
                $icone = $request->file('icone');
                $iconeName = $icone->getClientOriginalName(); 
                $icone->storeAs('public/icone', $iconeName); 
                $lien->icone = $iconeName; 
            }
        
            $lien->save();
        
            return redirect()->route('liens.index')->with('success', 'Lien modifié avec succès!');
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
            $lien = Liens::find($id);
        
            // SUPPRIME LE LOGO DU DOSSIER "LOGOS"s
            $logoPath = storage_path("app/public/icone/{$lien->icone}");
            unlink($logoPath); // (unlink) Supprimer le fichier du système de fichiers
        
            $lien->delete();
        
            return redirect()->route('liens.index')->with('success', 'Lien supprimé avec succès!');
        } 
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite.');
        }
    }
}
