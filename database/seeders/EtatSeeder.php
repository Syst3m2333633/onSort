<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EtatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Etat::create(
        [
            'libelle' => 'Ouverte'
        ]
        );

    }
}
