<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::all();
        return view('dashboard.photo.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.photo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            // Validation des données
            $validator = Validator::make($request->all(), [
                'titre' => 'required|min:3', 
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', 
                'legende' => 'required|min:5', 
            ]);
        
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
        
            // Traitement de l'image uploadée
            if ($request->hasFile('photo')) {
                $photo = $request->file('photos_actions');
                $photoName = $photo->getClientOriginalName(); 
                $photoPath = $photo->storeAs('public/photos_actions', $photoName);    
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
        $photo = Photo::findOrFail($id);
        return  view("dashboard.photo.edit", compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $photo = Photo::find($id);

        $photo->titre = $request->input('titre_photo');
        $photo->legende = $request->input('legende_photo');
        
        $photo = $request->file('photo_action');
        $photoPath = $photo->store('image', 'public');
        $photo-> $photo = $photoPath;
    
        $photo->save();
    
        return redirect()->route('photos.index')->with('success', 'Photo bien ajouté avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $photo = Photo::find($id);
        
        $photo->delete();
        return redirect()->route('photos.index')->with('success', 'Photo suppriméee avec succès!');
    }
}
