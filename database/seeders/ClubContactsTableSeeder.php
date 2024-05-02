<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClubContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");
        DB::table('club_contacts')->truncate();


        $csvFile = fopen(public_path("csvs/club_contacts.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {

                DB::table('club_contacts')->insert([
                    "club_name" => $data['1'],
                    "competition_type" => trim(preg_replace('/\s\s+/', ' ', $data['2'])),
                    "number_of_teams" => isset($data['3']) ? $data['3'] : 0,
                    "contact_person" => isset($data['4']) ? $data['4'] : '',
                    "contact_phone" => isset($data['5']) ? $data['5'] : '',
                    "executive_name" => isset($data['6']) ? $data['6'] : '',
                    "designation" => isset($data['7']) ? $data['7'] : '',
                    "executive_phone" => isset($data['8']) ? $data['8'] : '',
                    "status" => isset($data['9']) ? $data['9'] : 0,
                    "email" => isset($data['10']) ? $data['10'] : '',

                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);



    }
}
