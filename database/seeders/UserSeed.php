<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Phi Reus',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'phone' => '0971320503',
            'address' => 'Linh Chiểu',
            'image' => 'image1.jpg',
            'role' => '1'
        ]);
    }
}
