<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Partenaires extends Model
{
    protected $table = 'partenaires';
    protected $primaryKey = 'id';
    protected $fillable = ['nom_partenaire', 'logo_partenaire'];
    protected $guarded = [];
    public $timestamps = true;

    // Relation Many-to-Many avec le modèle Lien
    public function liens(): BelongsToMany
    {
        return $this->belongsToMany(Liens::class, 'partenaire_lien', 'partenaire_id', 'lien_id')
                    ->withPivot('lien');
    }
}