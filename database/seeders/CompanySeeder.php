<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Company;
use \App\Models\Tag;
use \App\Models\Industry;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employers = User::employers()->get();
        
        foreach ($employers as $employer) {
            $employer->company()->create(Company::factory()->make()->getAttributes());
        }

        $companies = Company::get();
 
        foreach ($companies as $company) {
            for ($i=0; $i < 3; $i++) { 
                $company->tags()->attach(Tag::get()->random()->id);
                $company->industries()->attach(Industry::get()->random()->id);
            }
        }
    }
}
