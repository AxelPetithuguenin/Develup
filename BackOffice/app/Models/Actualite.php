<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    use HasFactory;
    protected $table = 'actualites'; 
    protected $primaryKey = 'id';
    protected $fillable = ['titre_actualite', '_date_actualite','contenu_actualite','image'];
    protected $guarded = [];
    public $timestamps = true;
}
