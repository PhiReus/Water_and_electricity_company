<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('groups')->insert([
            [
                'name' => 'Supper Admin',

            ],
            [
                'name' => 'Quản Lý',

            ],
            [
                'name' => 'Nhân Viên',

            ],

        ]);
    }
}
