<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            [
                'name' => 'Abu Dhabi',
                'hiring_destination' => true,
                'hiring_source' => false,
            ], [
                'name' => 'Dubai',
                'hiring_destination' => true,
                'hiring_source' => false,
            ], [
                'name' => 'Guam',
                'hiring_destination' => true,
                'hiring_source' => false,
            ], [
                'name' => 'Philippines',
                'hiring_destination' => false,
                'hiring_source' => true,
            ], [
                'name' => 'Indonesia',
                'hiring_destination' => false,
                'hiring_source' => true,
            ], [
                'name' => 'Vietnam',
                'hiring_destination' => false,
                'hiring_source' => true,
            ], [
                'name' => 'Pakistan',
                'hiring_destination' => false,
                'hiring_source' => true,
            ]
        ]);
    }
}
