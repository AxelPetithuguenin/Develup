<?php

namespace App\Http\Controllers;

use App\Models\Temoignage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TemoignageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            // RETOURNE TOUT LES TEMOIGNAGE // 
            $temoignages = Temoignage::all();
            return view('dashboard.temoignage.temoignages', compact('temoignages'));
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
            // RETOURNE LE FORMULAIRE POUR CREER UN TEMOIGNAGE //
            return view('dashboard.temoignage.creer_temoignage');
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
                'titre_temoignage' => 'required|min:1', 
                'prenom_temoignage' => 'required|min:1', 
                'image_temoignage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2 Mo maximum
                'date_temoignage' => 'required', 
                'contenu_temoignage' => 'required|min:5', 
            ]);
        
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
        
            // Traitement de l'image uploadée
            if ($request->hasFile('image_temoignage')) {
                $image_temoignage = $request->file('image_temoignage');
                $image_temoignageName = $image_temoignage->getClientOriginalName(); 
                $logoPath = $image_temoignage->storeAs('public/image_temoignage', $image_temoignageName);    
            }
        
                
            // Création du témoignage
            $temoignage = new Temoignage();
            $temoignage->titre_temoignage = $request->input('titre_temoignage');
            $temoignage->prenom_temoignage = $request->input('prenom_temoignage');
            $temoignage->date_temoignage = $request->input('date_temoignage');
            $temoignage->contenu_temoignage = $request->input('contenu_temoignage');
            $temoignage->image_temoignage = $image_temoignageName; // Utilise le nom du fichier
            $temoignage->save();
        
            return redirect()->route('temoignage.index')->with('success', 'Témoignage créé avec succès!');
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
        try {    
            // RETOURNE LE FORMULAIRE POUR MODIFIER UN TEMOIGNAGE //
            $temoignage = Temoignage::find($id);
            return view('dashboard.temoignage.edit_temoignage', compact('temoignage'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite.');
        }
    }    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Récupérer le témoignage à mettre à jour
            $temoignage = Temoignage::find($id);

            // Vérifier si le témoignage existe
            if (!$temoignage) {
                return redirect()->route('temoignage.index')->with('error', 'Témoignage non trouvé!');
            }   

            // Validation des données
            $validator = Validator::make($request->all(), [
                'titre_temoignage' => 'required|min:1',
                'prenom_temoignage' => 'required|min:1',
                'image_temoignage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2 Mo maximum
                'date_temoignage' => 'required',
                'contenu_temoignage' => 'required|min:5',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            // Traitement de l'image uploadée
            if ($request->hasFile('image_temoignage')) {
                $image_temoignage = $request->file('image_temoignage');
                $image_temoignageName = $image_temoignage->getClientOriginalName();
                $logoPath = $image_temoignage->storeAs('public/image_temoignage', $image_temoignageName);
                // Mettre à jour le nom de l'image seulement si une nouvelle image est uploadée
                $temoignage->image_temoignage = $image_temoignageName;
            }

            // Mettre à jour les autres propriétés du témoignage
            $temoignage->titre_temoignage = $request->input('titre_temoignage');
            $temoignage->prenom_temoignage = $request->input('prenom_temoignage');
            $temoignage->date_temoignage = $request->input('date_temoignage');
            $temoignage->contenu_temoignage = $request->input('contenu_temoignage');
            $temoignage->save();

            return redirect()->route('temoignage.index')->with('success', 'Témoignage mis à jour avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            // Trouver le partenaire à supprimer
            $temoignage = Temoignage::find($id);
            
            // Vérifier si le temoignage existe
            if (!$temoignage) {
                return redirect()->route('temoignage.index')->with('error', 'Témoignage non trouvé!');
            }
        
            // Supprimer le logo du dossier "logos"
            $logoPath = storage_path("app/public/logos/{$temoignage->image_temoignage}");
            if (file_exists($logoPath)) {
                unlink($logoPath);
            }
        
            // Supprimer le temoignage
            $temoignage->delete();
        
            return redirect()->route('temoignage.index')->with('success', 'Témoignage supprimé avec succès!');
        } 
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite.');
        }
    }
}
