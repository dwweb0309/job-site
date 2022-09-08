<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->jobTitle();
        $datetime = $this->faker->dateTimeBetween('-1 month', 'now');

        $content = '';
        for($i=0; $i < 5; $i++) {
            $content .= '<p>' . $this->faker->realText(rand(100, 300)) . '</p>';
        }

        $apply_url = 0;

        if((rand(1, 3) > 2)) {
            $apply_url = $this->faker->url;
        }

        return [
            'title' => $title,
            'content' => $content,
            'slug' => Str::slug($title) . '-' . rand(1111, 9999),
            'is_active' => (rand(1, 9) > 3),
            'is_highlighted' => (rand(1, 9) > 7),
            'company_id' => \App\Models\Company::get()->random()->id,
            'remote_allowed' => $this->faker->boolean(50),
            'hybrid_allowed' => $this->faker->boolean(50),
            'inperson_allowed' => $this->faker->boolean(50),
            'apply_url' => $apply_url,
            'salary_min' => $this->faker->numberBetween(5000, 10000),
            'salary_max' => $this->faker->numberBetween(10000, 20000),
            'age_min' => $this->faker->numberBetween(18, 20),
            'age_max' => $this->faker->numberBetween(60, 70),
            'currency_code' => $this->faker->currencyCode(),
            'created_at' => $datetime,
            'updated_at' => $datetime
        ];
    }
}
