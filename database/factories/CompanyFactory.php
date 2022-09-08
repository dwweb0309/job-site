<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'logo' => $this->faker->imageUrl(200, 100),
            'website' => $this->faker->url(),
            'credits' => $this->faker->randomNumber(2),
            'description' => $this->faker->realText(500),
            'location_id' => \App\Models\Location::get()->random()->id,
        ];
    }
}
