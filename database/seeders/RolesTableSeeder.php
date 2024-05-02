<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");
        DB::table('roles')->truncate();
        
        DB::table('roles')->insert([
            'role_name' => "Admin",
            'status' => 1,
            
        ]);

        DB::table('roles')->insert([
            'role_name' => "User",
            'status' => 1,
            
        ]);
    }
}
