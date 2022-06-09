<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LieuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->name,
            'rue'  => $this->faker->streetName,
            'longitude'  => $this->faker->longitude,
            'latitude'  => $this->faker->latitude,
            'ville_id' => \App\Models\Ville::factory()->create()->id,
        ];
    }
}
