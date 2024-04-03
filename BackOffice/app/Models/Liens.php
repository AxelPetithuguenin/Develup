<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Liens extends Model
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
        return $this->belongsToMany(Partenaires::class, 'partenaire_lien', 'lien_id', 'partenaire_id')
                    ->withPivot('lien');
    }
}
