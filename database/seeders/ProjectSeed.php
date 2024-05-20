<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProjectSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'name' => 'Công trình điện nước Biên Hòa',
                'start_day' => Carbon::now(),
                'end_day' => Carbon::now(),
                'type' => 'Điện',
                'description' => 'Nhà này 5 tỷ',
                'status' => 'pending',
                'image' => '',
                'construction_site' => 'Biên Hòa'
            ],
        ]);
    }
}
