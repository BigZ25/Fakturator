<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Mateusz",
            'surname' => "Zięba",
            'password' => Hash::make('password'),
            'login' => 'mati',
        ]);
    }
}
