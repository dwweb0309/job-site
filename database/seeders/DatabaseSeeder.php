<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            CurrencyCodeSeeder::class,
            UserSeeder::class,
            TagSeeder::class,
            CategorySeeder::class,
            IndustrySeeder::class,
            LocationSeeder::class,
            ProfileSeeder::class,
            CompanySeeder::class,
            ListingSeeder::class
        ]);
    }
}