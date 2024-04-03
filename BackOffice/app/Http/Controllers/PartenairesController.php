<?php

namespace App\Http\Controllers;

use App\Models\Partenaires;
use App\Models\Lien; // Pour la liste déroulante
use App\Models\Liens;
use Egulias\EmailValidator\Parser\PartParser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mockery\Generator\StringManipulation\Pass\Pass;

class PartenairesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            // RETOURNE TOUT LES PARTENAIRES // 
            $partenaires =  Partenaires::all();
            return view('dashboard.partenaires.partenaire', compact('partenaires'));
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
            // RECUPERE ET RETOURNE TOUT LES LIENS DE LA TABLE LIEN //
            $liens = Liens::all();
            
            // RETOURNE LE FORMULAIRE POUR CREER UN PARTENAIRE AVEC LES LIENS
            return view('dashboard.partenaires.creer_partenaire', compact('liens'));
        
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
        try {
            // Validation des données
            $validator = Validator::make($request->all(), [
                'nom_partenaire' => 'required|min:1',
                'logo_partenaire' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2 Mo maximum
                'lien_id.*' => 'required|exists:liens,id',
                'lien_url.*' => 'required|url',
            ]);
    
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
    
            // Traitement de l'image 
            if ($request->hasFile('logo_partenaire')) {
                $logo_partenaire = $request->file('logo_partenaire');
                $logoName = $logo_partenaire->getClientOriginalName(); // Nom original du fichier
                $logoPath = $logo_partenaire->storeAs('public/logos', $logoName);
            }
    
            // Création du partenaire
            $partenaire = new Partenaires();
            $partenaire->nom_partenaire = $request->input('nom_partenaire');
            $partenaire->logo_partenaire = $logoName; // Utilise le nom du fichier
            $partenaire->save();
    
            // Récupérer tous les liens
            $liens = $request->input('lien_id');
            $liensUrls = $request->input('lien_url');
    
            // Associer chaque lien au partenaire
            foreach ($liens as $key => $lienId) {
                $lienUrl = isset($liensUrls[$key]) ? $liensUrls[$key] : ''; // Récupérer l'URL correspondante
                $partenaire->liens()->attach($lienId, ['lien' => $lienUrl]);
            }
    
            return redirect()->route('partenaires.index')->with('success', 'Partenaire créé avec succès!');
        } catch (\Exception $e) {
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
            // RECUPERE ET RETOURNE TOUT LES LIENS DE LA TABLE LIEN //
            $liens = Liens::all();
        
            // RETOURNE LE FORMULAIRE POUR MODIFIER UN PARTENAIRE //
            $partenaires = Partenaires::find($id);
            return view('dashboard.partenaires.edit_partenaire', compact('partenaires', 'liens'));
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
        try {
            // Valider les données
            $validator = Validator::make($request->all(), [
                'nom_partenaire' => 'required|min:1',
                'logo_partenaire' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2 Mo maximum
                'lien_id.*' => 'required|exists:liens,id',
                'lien_url.*' => 'required|url',
            ]);
    
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
    
            // Récupérer le partenaire
            $partenaire = Partenaires::find($id);
            $partenaire->nom_partenaire = $request->input('nom_partenaire');
    
            if ($request->hasFile('logo_partenaire')) {
                $logo_partenaire = $request->file('logo_partenaire');
                $logoName = $logo_partenaire->getClientOriginalName(); 
                $logoPath = $logo_partenaire->storeAs('public/logos', $logoName);
                $partenaire->logo_partenaire = $logoPath;
            }

            $partenaire->save();
    
            // Associer chaque lien au partenaire
            foreach ($request->input('lien_id') as $key => $lienId) {
                $lienUrl = $request->input('lien_url')[$key];
                $partenaire->liens()->syncWithoutDetaching([$lienId => ['lien' => $lienUrl]]);
            }
    
            // Récupérer les liens à supprimer
            $liensASupprimer = array_diff($partenaire->liens()->pluck('id')->toArray(), $request->input('lien_id'));
    
            // Supprimer les URL associées aux liens supprimés de la base de données
            foreach ($liensASupprimer as $lienId) {
                $partenaire->liens()->detach($lienId);
            }
    
            // dd('Partenaire mis à jour avec succès !');
            return redirect()->route('partenaires.index')->with('success', 'Partenaire modifié avec succès!');
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
            // Trouver le partenaire à supprimer
            $partenaire = Partenaires::find($id);
            
            // Vérifier si le partenaire existe
            if (!$partenaire) {
                return redirect()->route('partenaires.index')->with('error', 'Partenaire non trouvé!');
            }
        
            // Supprimer les liens associés dans la table de liaison
            $partenaire->liens()->detach();
        
            // Supprimer le logo du dossier "logos"
            $logoPath = storage_path("app/public/logos/{$partenaire->logo_partenaire}");
            if (file_exists($logoPath)) {
                unlink($logoPath);
            }
        
            // Supprimer le partenaire
            $partenaire->delete();
        
            return redirect()->route('partenaires.index')->with('success', 'Partenaire supprimé avec succès!');
        } 
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite.');
        }
    }
}
