<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ApiUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('api_users')->insert([
            'name'      => 'Administrator',
            'email'     => 'scdbipdn@gmail.com',
            'password'  => Hash::make('yellowminicooper'),
        ]);
    }
}
