<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materials')->insert([
            [
                'name' => 'Dây điện',
                'quantity' => 10,
                'price' => 100000,
                'total' => 100000000,
                'surcharge' => 2000000,
            ],
        ]);
    }
}
