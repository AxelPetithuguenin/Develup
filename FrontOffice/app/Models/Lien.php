<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Lien extends Model
{
    use HasFactory;
    protected $table = 'liens';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'icone'];
    protected $guarded = [];
    public $timestamps = true;

    //========== RELATION BELONG TO MANY AVEC LES PARTENAIRES ==========//
    public function partenaires(): BelongsToMany
    {
        return $this->belongsToMany(Partenaire::class, 'partenaire_lien', 'lien_id', 'partenaire_id')
                    ->withPivot('liens');
    }
}
