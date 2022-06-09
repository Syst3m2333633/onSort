<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Lieu::create(
            [
                'name' => 'Terrain de pétanque',
                'rue' => 'Rue du cochonnet',
                'latitude' => '14.5634',
                'longitude' => '1.02',
                'ville_id' => '1',
            ]
            );
    }
}
