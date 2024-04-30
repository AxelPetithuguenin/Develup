<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Bureau extends Model
{
        protected $table = 'bureau';
        protected $primaryKey = 'id';
        protected $fillable = ['nom', 'prenom', 'photo'];
        protected $guarded = [];
        public $timestamps = true;

        public function fonctions(): BelongsToMany
        {
                return $this->belongsToMany(Fonction::class,'bureau_fonctions', 'bureau_id','fonctions_id');
        }
      
}