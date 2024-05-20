<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractorSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contractors')->insert([
            'name' => 'Phi Reus',
            'phone' => '0971320503',
            'address' => 'Quảng Trị',
            'mail' => 'phireus2002@gmail.com'
        ]);
    }
}
