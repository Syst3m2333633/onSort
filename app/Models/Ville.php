<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    //Relation entre Ville et Lieu
    public function Lieus()
    {
        return $this->hasMany(Lieu::class);
    }
}
