<?php

namespace App\Http\Controllers;

use App\Models\Adherent;
use Illuminate\Http\Request;

class AdherentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            // RETOURNE TOUT LES LIENS // 
            $adherents = Adherent::Paginate(20);
            return view('dashboard.adherents.adherent', compact('adherents'));
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            // Trouver le partenaire à supprimer
            $adherent = Adherent::find($id);
            
            // Vérifier si l'adherent existe
            if (!$adherent) {
                return redirect()->route('adherent.index')->with('error', 'Témoignage non trouvé!');
            }

            // Supprimer l'adherent
            $adherent->delete();
        
            return redirect()->route('adherent.index')->with('success', 'Adhérent supprimé avec succès!');
        } 
        catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite.');
        }
    }
}
