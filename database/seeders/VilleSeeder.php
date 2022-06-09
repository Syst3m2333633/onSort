<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Ville::create(
            [
                'name' => 'Rennes',
                'codePostal' => '35000',
            ]
            );
    }
}
