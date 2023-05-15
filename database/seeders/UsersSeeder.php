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
            'name' => "John",
            'surname' => "Doe",
            'password' => Hash::make('Pa$$w0rd'),
            'email' => 'john.doe@mail.com',
            'is_active' => true,
        ]);
    }
}
