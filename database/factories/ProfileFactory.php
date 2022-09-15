<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use \App\Models\Location;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $location_id = Location::get()->random()->id;
        $gender = 'Male';
        
        if((rand(1, 3) > 2)) {
            $gender = 'Female';
        }
        
        return [
            'location_id' => $location_id,
            'nationality_id' => $location_id,
            'photo_url' => $this->faker->imageUrl(200, 200),
            'linkedin_url' => $this->faker->url(),
            'whatsapp' => $this->faker->phoneNumber(),
            'description' => $this->faker->realText(200),
            'gender' => $gender,
            'currency_code' => $this->faker->currencyCode(),
            'dob' => $this->faker->date('M d, Y'),
            'expected_salary' => ($this->faker->randomNumber(1) + 1) * 1000
        ];
    }
}
