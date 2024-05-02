<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\SiteSetting;
use App\Models\Admin\SiteTemplate;
use Illuminate\Support\Facades\DB;

class SiteSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");
        DB::table('site_templates')->truncate();
        DB::table('site_settings')->truncate();

        $sections = array('header_template','slider_template','section1_template','section2_template','section3_template','footer_template','category_view_template','post_view_template','post_card_template');
        
        foreach($sections as $section){

            SiteSetting::create(['section' => $section, 'template_number' => 1]);
            SiteTemplate::create(['section' => $section, 'template_number' => 1]);

        }

                 
    }
    
}
