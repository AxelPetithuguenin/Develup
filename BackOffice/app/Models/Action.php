<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $table = 'actions';
    protected $primaryKey = 'id';
    protected $fillable = ['titre_action','date_action','heure_action','adresse','code_postal','ville','nb_inscrits','is_private','nb_sensibilises'];
    protected $guarded = [];
    public $timestamps = true;


    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
