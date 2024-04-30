<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';
    protected $primaryKey = 'id';
    protected $fillable = ['photo','titre','legende','action_id'];
    protected $guarded = [];
    public $timestamps = true;


    public function action()
    {
        return $this->belongsTo(Action::class);
    }

}
