<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;
    //Relation entre Campus et Sortie
    public function sortie()
    {
        return $this->hasMany(Sortie::class);
    }

    //Relation entre Campus et User
    public function user()
    {
        return $this->hasMany(User::class);
    }


}
