<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $actions = Action::Paginate(10);
            return view('dashboard.actions.action', compact('actions'));
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try{
            return view('dashboard.actions.create');
        }catch (\Exception $e) {
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
                'titre_action' => 'required|min:3', 
                'date_action' => 'required',
                'heure_action' => 'required', 
                'adresse_action' => 'required', 
                'code_postal_action' => 'required|min:5|max:5',
                'ville_action' => 'required|min:3', 
                'is_private_action' => 'required', 
                'nb_sensibilises_action' => 'required', 
                'titre.*' => 'required|min:3', 
                'photo.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2 Mo maximum
                'legende.*' => 'required|min:3', 
            ], [
                'titre_action.required' => 'Le champ titre est requis.',
                'date_action.required' => 'Le champ date est requis.',
                'heure_action.required' => 'Le champ heure est requis.',
                'adresse_action.required' => 'Le champ adresse est requis.',
                'code_postal_action.required' => 'Le champ code postal est requis.',
                'ville_action.required' => 'Le champ ville est requis.',
                'is_private_action.required' => 'Le champ accessible par tous est requis.',
                'nb_sensibilises_action.required' => 'Le champ nombre de sensibilisés est requis.',
                'titre.*.required' => 'Le champ titre de l\'image est requis.',
                'photo.*.required' => 'L\'image est requise.',
                'legende.*.required' => 'Le champ légende de l\'image est requis.',
            ]);
    
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            
            // Enregistrement de l'action
            $nv_action = new Action();
            $nv_action->titre_action = $request->input('titre_action');
            $nv_action->date_action = $request->input('date_action');
            $nv_action->heure_action = $request->input('heure_action');
            $nv_action->adresse = $request->input('adresse_action');
            $nv_action->code_postal = $request->input('code_postal_action');
            $nv_action->ville = $request->input('ville_action');
            $nv_action->nb_inscrits = $request->input('nb_inscrits_action');
            $nv_action->is_private = $request->input('is_private_action');
            $nv_action->nb_sensibilises = $request->input('nb_sensibilises_action');
            $nv_action->save();
    
            // Traitement des images
            if ($request->hasFile('photo')) {
                foreach ($request->file('photo') as $key => $photo) {
                    $photoName = $photo->getClientOriginalName();
                    $photoPath = $photo->storeAs('public/photos', $photoName);
    
                    // Enregistrement de la photo dans la table photos
                    $newPhoto = new Photo();
                    $newPhoto->titre = $request->input('titre')[$key]; // Utilisation de l'index $key pour accéder à chaque élément du tableau
                    $newPhoto->legende = $request->input('legende')[$key]; // Utilisation de l'index $key pour accéder à chaque élément du tableau
                    $newPhoto->photo = $photoPath;
                    $newPhoto->id_actions = $nv_action->id; 
                    $newPhoto->save();
                }
            }
            return redirect()->route('actions.index')->with('success', 'Action  créées avec succès!');
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
            $action = Action::findOrFail($id);
            return  view("dashboard.actions.edit", compact('action'));
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite.');
        }
    }   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Validation des données
            $validator = Validator::make($request->all(), [
                'titre_action' => 'required|min:3', 
                'date_action' => 'required',
                'heure_action' => 'required', 
                'adresse_action' => 'required|min:5', 
                'code_postal_action' => 'required|min:5|max:5',
                'ville_action' => 'required|min:3', 
                'is_private_action' => 'required|in:0,1', 
                'nb_sensibilises_action' => 'required|min:1', 
                'titre.*' => 'required|min:3', 
                'legende.*' => 'required|min:3', 
            ], [
                'titre_action.required' => 'Le champ titre est requis.',
                'date_action.required' => 'Le champ date est requis.',
                'heure_action.required' => 'Le champ heure est requis.',
                'adresse_action.required' => 'Le champ adresse est requis.',
                'code_postal_action.required' => 'Le champ code postal est requis.',
                'ville_action.required' => 'Le champ ville est requis.',
                'is_private_action.required' => 'Le champ accessible par tous est requis.',
                'nb_sensibilises_action.required' => 'Le champ nombre de sensibilisés est requis.',
                'titre.*.required' => 'Le champ titre de l\'image est requis.',
                'legende.*.required' => 'Le champ légende de l\'image est requis.',
            ]);
    
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            
            // Récupération de l'action à modifier
            $action = Action::findOrFail($id);
    
            // Mise à jour des données de l'action
            $action->titre_action = $request->input('titre_action');
            $action->date_action = $request->input('date_action');
            $action->heure_action = $request->input('heure_action');
            $action->adresse_action = $request->input('adresse_action');
            $action->code_postal_action = $request->input('code_postal_action');
            $action->ville_action = $request->input('ville_action');
            $action->nb_inscrits_action = $request->input('nb_inscrits_action');
            $action->is_private_action = $request->input('is_private_action');
            $action->nb_sensibilises_action = $request->input('nb_sensibilises_action');
            $action->save();
    
            // Traitement des photos si des nouvelles sont fournies
            if ($request->hasFile('photo')) {
                foreach ($request->file('photo') as $key => $photo) {
                    $photoName = $photo->getClientOriginalName();
                    $photoPath = $photo->storeAs('public/photos', $photoName);
    
                    // Enregistrement de la photo dans la table photos
                    $newPhoto = new Photo();
                    $newPhoto->titre = $request->input('titre')[$key];
                    $newPhoto->legende = $request->input('legende')[$key];
                    $newPhoto->photo = $photoPath;
                    $newPhoto->id_actions = $action->id;
                    $newPhoto->save();
                }
            }
    
            return redirect()->route('actions.index')->with('success', 'Action modifiées avec succès!');
        
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la modification.');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $action = Action::findOrFail($id);
            $action->delete();
            return redirect()->route('actions.index')->with('success', 'Action supprimée avec succès!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la suppression.');
        }
    }
    
}
