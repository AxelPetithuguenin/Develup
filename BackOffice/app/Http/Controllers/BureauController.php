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
            $bureaux = Bureau::Paginate(15);
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
                
            // RETOURNE LE FORMULAIRE POUR CREER BUREAU AVEC LES ROLES
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
            'prenom' => 'required|min:1',
            'fonction_id' => 'required|array|min:1', 
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', 
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

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
            $bureau->prenom = $request->input('prenom'); 
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


    /**
     * Show the form for editing the specified resource.
    */
    public function edit(string $id)
    {
        try{
            // RECUPERE ET RETOURNE TOUT LES LIENS DE LA TABLE FOCNTION //
            $fonctions = Fonction::all();
        
            // RETOURNE LE FORMULAIRE POUR MODIFIER UN BUREAU //
            $bureaux =  Bureau::find($id);
            return view('dashboard.bureau.edit_bureau', compact('fonctions', 'bureaux'));
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
                'nom' => 'required|min:1',
                'prenom' => 'required|min:1',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2 Mo maximum
                'fonction_id.*' => 'required|exists:fonctions,id',
            ], [
                'fonction_id.*.required' => 'Le rôle est requis.',
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
                $bureau->photo= $photoName;
                
            }

            $bureau->save();

            // Récupérer les identifiants des fonctions cochées dans le formulaire
            $fonctionsSelectionnees = $request->input('fonction_id', []);

            // Récupérer les identifiants des fonctions associées au bureau
            $fonctionsBureau = $bureau->fonctions->pluck('id')->toArray();

            // Supprimer les fonctions qui ne sont plus cochées dans le formulaire
            $fonctionsASupprimer = array_diff($fonctionsBureau, $fonctionsSelectionnees);
            foreach ($fonctionsASupprimer as $fonctionId) {
                $bureau->fonctions()->detach($fonctionId);
            }

            // Ajouter les nouvelles fonctions sélectionnées dans le formulaire
            $bureau->fonctions()->syncWithoutDetaching($fonctionsSelectionnees);

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
        $bureau = Bureau::find($id);
        
        // Vérifier si le bureau existe
        if (!$bureau) {
            return redirect()->route('bureau.index')->with('error', 'Bureau non trouvé!');
        }
    
        try {
            // Supprimer les entrées dans la table pivot bureau_fonctions
            $bureau->fonctions()->detach();
    
            // Supprimer la photo du dossier
            $photoPath = storage_path("app/public/pdp/{$bureau->photo}");
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
            
            // Supprimer le bureau
            $bureau->delete();
            
            return redirect()->route('bureau.index')->with('success', 'Bureau supprimé avec succès!');
        } catch (\Exception $e) {
            return redirect()->route('bureau.index')->with('error', 'Une erreur s\'est produite lors de la suppression du bureau.');
        }
    }    
}