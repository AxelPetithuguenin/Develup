<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
        $actualites = Actualite::Paginate(10);
        return view('dashboard.actualite.index', compact('actualites'));
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
            return view('dashboard.actualite.create');
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
                'titre_actualite' => 'required|min:1',
                '_date_actualite' => 'required', 
                'contenu_actualite' => 'required|min:5', 
                'image_actualite' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
    
            //dd($request);
            $nv_actualite = new Actualite();
            $nv_actualite->titre_actualite = $request->input('titre_actualite');
            $nv_actualite->_date_actualite = $request->input('_date_actualite'); // Correction du nom du champ
            $nv_actualite->contenu_actualite = $request->input('contenu_actualite');
        
            /** @var UploadImage $image */
            $image = $request->file('image_actualite');
            $imagePath = $image->store('image', 'public');
            $nv_actualite->image = $imagePath;
        
            $nv_actualite->save();
        
            return redirect()->route('actualites.index')->with('success', 'Actualité créée avec succès!'); // Correction du message
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
            $actualite = Actualite::findOrFail($id);
            return  view("dashboard.actualite.edit", compact('actualite'));
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    try {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'titre_actualite' => 'required|min:1',
            '_date_actualite' => 'required|date', 
            'contenu_actualite' => 'required|min:5',
            'image_actualite' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $actualite = Actualite::findOrFail($id);

        $actualite->titre_actualite = $request->input('titre_actualite');
        $actualite->_date_actualite = $request->input('_date_actualite');
        $actualite->contenu_actualite = $request->input('contenu_actualite');

        if ($request->hasFile('image_actualite')) {
            $image = $request->file('image_actualite');
            $imagePath = $image->store('image', 'public');

            if ($actualite->image) {
                Storage::disk('public')->delete($actualite->image);
            }

            $actualite->image = $imagePath;
        }

        $actualite->save();

        return redirect()->route('actualites.index')->with('success', 'Actualité modifiée avec succès!');
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
            $actualite = Actualite::find($id);
            if ($actualite->image) {
                Storage::disk('public')->delete($actualite->image);
            }
            $actualite->delete();
            return redirect()->route('actualites.index')->with('success', 'Actualité supprimé avec succès!');
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite.');
        }
    }
}
