<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            [
                'id' => 1,
                'name' => 'Admin'
            ], [
                'id' => 2,
                'name' => 'Candidate'
            ], [
                'id' => 3,
                'name' => 'Employer'
            ], [
                'id' => 4,
                'name' => 'User'
            ]
        ]);
    }
}
