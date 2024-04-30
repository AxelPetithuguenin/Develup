<?php

namespace App\Http\Controllers;

use App\Models\Bureau;
use Illuminate\Http\Request;

class BureauController extends Controller
{
    // RETOURNE TOUTES LES INFORMATIONS DU BUREAU
    public function index()
    {
        $bureau =  Bureau::orderBy('created_at', 'asc')->get();
        return view('/presentation', compact('bureau'));
    }
}
