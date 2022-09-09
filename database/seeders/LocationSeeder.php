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
                'currency_code' => 'AED'
            ], [
                'name' => 'Dubai',
                'hiring_destination' => true,
                'hiring_source' => false,
                'currency_code' => 'AED'
            ], [
                'name' => 'Guam',
                'hiring_destination' => true,
                'hiring_source' => false,
                'currency_code' => 'USD'
            ], [
                'name' => 'Philippines',
                'hiring_destination' => false,
                'hiring_source' => true,
                'currency_code' => 'PHP'
            ], [
                'name' => 'Indonesia',
                'hiring_destination' => false,
                'hiring_source' => true,
                'currency_code' => 'IDR'
            ], [
                'name' => 'Vietnam',
                'hiring_destination' => false,
                'hiring_source' => true,
                'currency_code' => 'USD'
            ], [
                'name' => 'Pakistan',
                'hiring_destination' => false,
                'hiring_source' => true,
                'currency_code' => 'IDR'
            ]
        ]);
    }
}
