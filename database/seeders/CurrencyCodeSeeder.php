<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencyCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currency_codes')->insert([
            [
                'id' => 1,
                'name' => 'USD'
            ], [
                'id' => 2,
                'name' => 'AED'
            ], [
                'id' => 3,
                'name' => 'PHP'
            ], [
                'id' => 4,
                'name' => 'IDR'
            ]
        ]);
    }
}
