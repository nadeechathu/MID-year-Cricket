<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");
        DB::table('images')->where('type',0)->delete();

        
        DB::table('images')->insert([
            'type' => 0,
            'src' => asset('images/uploads/slider/slider_dummy.png'),
            
        ]);
        DB::table('images')->insert([
            'type' => 0,
            'src' => asset('images/uploads/slider/slider_dummy.png'),
        ]);
        DB::table('images')->insert([
            'type' => 0,
            'src' => asset('images/uploads/slider/slider_dummy.png'),
            
        ]);
        DB::table('images')->insert([
            'type' => 0,
            'src' => asset('images/uploads/slider/slider_dummy.png'),
            
        ]);
        
    }
}
