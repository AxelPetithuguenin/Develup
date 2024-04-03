<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temoignage extends Model
{
    use HasFactory;
    protected $table = 'temoignages';
    protected $primaryKey = 'id';
    protected $fillable = [
        'titre_temoignage',
        'prenom_temoignage',
        'image_temoignage',
        'date_temoignage',
        'contenu_temoignage',
    ];
    protected $guarded = [];
    public $timestamps = true;
}
