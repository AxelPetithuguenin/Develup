<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Fonction extends Model
{
    use HasFactory;

    protected $table = 'fonctions';
    protected $primaryKey = 'id';
    protected $fillable = ['role'];
    public $timestamps = true;

    public function bureaux(): BelongsToMany
    {
        return $this->belongsToMany(Bureau::class, 'bureau_fonctions', 'fonction_id', 'bureau_id')
                    ->withPivot('fonctions');
    }
}
