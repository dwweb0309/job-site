<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Profile;
use \App\Models\Tag;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $candidates = User::candidates()->get();
        
        foreach ($candidates as $candidate) {
            $candidate->profile()->create(Profile::factory()->make()->getAttributes());
        }

        $profiles = Profile::get();
 
        foreach ($profiles as $profile) {
            for ($i=0; $i < 3; $i++) { 
                $profile->tags()->attach(Tag::get()->random()->id);
            }
        }
    }
}
