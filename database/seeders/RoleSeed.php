<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = ['User', 'Group', 'Role', 'Contractor', 'Material', 'Project'];
        $actions = ['view', 'create', 'update', 'show', 'destroy'];

        foreach($groups as $group) {
            foreach($actions as $action) {
                $name = $group .'_'. $action;
                $group_name = $group;

                $check = DB::table('roles')->where('group_name', $group_name)->where('name', $name)->limit(1)->first();

                if(!$check) {
                    DB::table('roles')->insert([
                        'name' => $name,
                        'group_name' => $group
                    ]);
                }
            }
        }
    }
}
