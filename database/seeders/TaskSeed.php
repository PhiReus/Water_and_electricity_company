<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TaskSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'description' => 'Công trình điện nước Biên Hòa',
                'project_id' => 1,
                'contractor_id' => 1,
                'user_id' => 1,
                'start_day' => Carbon::now(),
                'end_day' => Carbon::now(),
                'status' => 1,
            ],
        ]);
    }
}
