<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        $nv_photo = new Photo();

        if ($request->hasFile('photo_action')) {
            $photo = $request->file('photo_action');
            $photoName = $photo->getClientOriginalName(); // Nom original du fichier
            $photoPath = $photo->storeAs('public/image', $photoName);
        }
        
            $nv_photo->image = $photoName;
            $nv_photo->titre = $request->input('titre_photo');
            $nv_photo->legende = $request->input('legende_photo');
        
    
            $nv_photo->save();
    
        return redirect()->route('photos.index')->with('success', 'Photo bien ajouté avec succès!');
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
