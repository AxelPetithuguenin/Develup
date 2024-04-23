<?php

namespace App\Http\Controllers;
use App\Models\Bureau;
use App\Models\Fonction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BureauController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            // RETOURNE TOUT LES PARTENAIRES //
            $bureaux = Bureau::all();
            return view('dashboard.bureau.bureau', compact('bureaux'));
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
            // RECUPERE ET RETOURNE TOUT LES BUREAUX //
            $fonctions = Fonction::all();
                
            // RETOURNE LE FORMULAIRE POUR CREER UN PARTENAIRE AVEC LES LIENS
            return view('dashboard.bureau.create_bureau', compact('fonctions'));
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
    // Validation des données
    $validator = Validator::make($request->all(), [
        'nom' => 'required|min:1',
        'prenom' => 'required|array|min:1', // Assurez-vous que prenom est un tableau
        'prenom.*' => 'required|min:1',
        'fonction_id' => 'required|array|min:1', // Assurez-vous que fonction_id est un tableau
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2 Mo maximum
    ]);

   // if ($validator->fails()) {
    //    return back()->withErrors($validator)->withInput();
    //}

    try {
        // Traitement de l'image 
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = $photo->getClientOriginalName(); // Nom original du fichier
            $photoPath = $photo->storeAs('public/pdp', $photoName);
        }

        // Création d'un membre du bureau
        $bureau = new Bureau();
        $bureau->nom = $request->input('nom');
        $bureau->prenom = $request->input('prenom'); // Assurez-vous que prenom est un tableau
        $bureau->photo = $photoName; // Utilise le nom du fichier
        $bureau->save();

        // Récupérer les rôles sélectionnés
        $roles = $request->input('fonction_id');
        // Associer chaque rôle à un bureau
        $bureau->fonctions()->attach($roles);

        return redirect()->route('bureau.index')->with('success', 'Bureau créé avec succès!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la création du bureau.');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
         // RECUPERE ET RETOURNE TOUT LES LIENS DE LA TABLE LIEN //
         $bureaux= Bureau::all();
        
         // RETOURNE LE FORMULAIRE POUR MODIFIER UN PARTENAIRE //
         $bureaux = Bureau::find($id);

         $fonctions = Fonction::all();

         return view('dashboard.bureau.edit_bureau', compact('bureaux','fonctions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
         // Valider les données
         $validator = Validator::make($request->all(), [
            'nom' => 'required|min:1',
            'prenom' => 'required|min:1',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2 Mo maximum
            'fonction_id.*' => 'required|min:1',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Récupérer les bureaux
        $bureau = Bureau::find($id);
        $bureau->nom = $request->input('nom');
        $bureau->prenom = $request->input('prenom');

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = $photo->getClientOriginalName(); 
            $photoPath = $photo->storeAs('public/pdp', $photoName);
            $bureau->photo= $photoPath;
            
        }
        // Enregistrer les modifications du bureau
        $bureau->save();

        // Mettre à jour les fonctions associées au bureau
        $bureau->fonctions()->syncWithoutDetaching($request->input('fonction_id'));
        

            return redirect()->route('bureau.index')->with('success', 'Bureau modifié avec succès!');
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
        // Trouver le bureau à supprimer
        $bureaux = Bureau::find($id);
            
        // Vérifier si le partenaire existe
        if (!$bureaux) {
            return redirect()->route('bureau.index')->with('error', 'bureau non trouvé!');
        }
    
        // Supprimer la photo du dossier
        $logoPath = storage_path("app/public/logos/{$bureaux->photo}");
        if (file_exists($logoPath)) {
            unlink($logoPath);
        }
    
        // Supprimer le partenaire
        $bureaux->delete();
    
        return redirect()->route('bureau.index')->with('success', 'Bureau supprimé avec succès!');
    }
}
