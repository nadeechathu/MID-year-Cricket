<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class GeneralSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");
        DB::table('general_settings')->truncate();

        DB::table('general_settings')->insert([
            'setting_key' => 'site_name',
            'description' => 'Site Name',
            
        ]);
        DB::table('general_settings')->insert([
            'setting_key' => 'site_description',
            'description' => 'Site description goes here',
            
        ]);

        DB::table('general_settings')->insert([
            'setting_key' => 'site_logo',
            'description' => '',
            
        ]);

        DB::table('general_settings')->insert([
            'setting_key' => 'analytics',
            'description' => null,
            
        ]);

        DB::table('general_settings')->insert([
            'setting_key' => 'facebook_link',
            'description' => '',
            
        ]);

        DB::table('general_settings')->insert([
            'setting_key' => 'instagram_link',
            'description' => '',
            
        ]);

        DB::table('general_settings')->insert([
            'setting_key' => 'twitter_link',
            'description' => '',
            
        ]);

        DB::table('general_settings')->insert([
            'setting_key' => 'youtube_link',
            'description' => '',
            
        ]);
    }
}
