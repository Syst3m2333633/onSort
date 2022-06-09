<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sortie extends Model
{
    use HasFactory;

    //Relation entre Sortie et Lieu
    public function lieu()
    {
        return $this->belongsTo(Lieu::class);
    }

    //Relation entre Sortie et Campus
    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    //Relation entre Sortie et Etat
    public function etat()
    {
        return $this->belongsTo(Etat::class);
    }

    //Relation entre Sortie et User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relation ManyToMany sur la table sortie_user
    public function participants()
    {
        return $this->belongsToMany(User::class, 'participants', 'sortie_id', 'user_id');
    }

}
