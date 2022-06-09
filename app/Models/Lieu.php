<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    use HasFactory;
    //Relation entre Lieu et Ville
    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    //Relation entre Lieu et Sortie
    public function sortie()
    {
        return $this->hasMany(Sortie::class);
    }
}
