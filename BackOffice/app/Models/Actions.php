<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adherent extends Model
{
    use HasFactory;
    protected $table = 'actions';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'prenom', 'email'];
    protected $guarded = [];
    public $timestamps = true;
}
