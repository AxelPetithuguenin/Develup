<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actions = Action::all();
        return view('dashboard.action.action', compact('actions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.action.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       /* $request->validate([
            'is_private_action' => 'required|in:0,1',
        ]);*/

        //dd($request);
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
 
        return redirect()->route('actions.index')->with('success', 'Action créé avec succès!');
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
        $action = Action::findOrFail($id);
        return  view("dashboard.action.edit", compact('action'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $action = Action::find($id);
        

        $action->titre_action = $request->input('titre_action');
        $action->date_action = $request->input('date_action');
        $action->heure_action = $request->input('heure_action');
        $action->adresse = $request->input('adresse_action');
        $action->code_postal = $request->input('code_postal_action');
        $action->ville = $request->input('ville_action');
        $action->nb_inscrits = $request->input('nb_inscrits_action');
        $action->is_private = $request->input('is_private_action');
        $action->nb_sensibilises = $request->input('nb_sensibilises_action');
 
        $action->save();
 
        return redirect()->route('actions.index')->with('success', 'Action modifiée avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $action = Action::find($id);
        
        $action->delete();
        return redirect()->route('actions.index')->with('success', 'Action suppriméee avec succès!');
    }
}
