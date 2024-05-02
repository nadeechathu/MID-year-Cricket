<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");
        DB::table('permissions')->truncate();


        $csvFile = fopen(public_path("csvs/permissions.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
               
                DB::table('permissions')->insert([
                    "name" => $data['1'],
                    "type" => $data['2']
                    
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);

       
       
    }
}
