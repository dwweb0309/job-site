<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Listing::factory(50)->create();

        $listings = \App\Models\Listing::get();

        foreach ($listings as $listing) {
            for ($i=0; $i < 3; $i++) { 
                $listing->tags()->attach(\App\Models\Tag::get()->random()->id);
                $listing->categories()->attach(\App\Models\Category::get()->random()->id);
            }
        }
    }
}
