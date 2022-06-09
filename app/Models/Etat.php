<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    use HasFactory;
    //Relation entre Etat et Sortie
    public function sortie()
    {
        return $this->hasMany(Sortie::class);
    }
}
