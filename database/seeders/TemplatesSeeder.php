<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('state_taxes')->truncate();

        if (Template::count() == 0) {
            $templates = array(
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
                ['state' => 'usa', 'type' => 'basic', 'title' => 'Alabama', 'description' => '4.23', 'color_name' => 'Alabama', 'color_code' => '4.23'],
            );
            Template::insert($templates);
        }
    }
}


aegean.png: th #5E718F bg white
amethyst.png: th #7F39B6 bg white
cerulean.png: th #5AA6BA bg white
lapis.png: th #4372B7 bg white
olive.png: th #ADBB4A bg white
Reddish Magenta.png: th #AB3B44 bg white
tawny.png: th #B3843F bg white
wood.png: th #757575 bg white
pt_brown.png: th #7A4566 bg white & #EEE1E9
pt_green.png: th #496B6A bg white & #E4F3F0
pt_blue.png: th #413F75 bg white & #DFDFEF
box_blue.png: white
global_white_ check.png: white
paystubx check.png: white
paystubx_district colors.png: th #3150A5 bg white
paystub colors.png: th #A53DB7 bg white
paystubx_blue_ color.png: th #3150A5 bg #DEE6F0
paystubx_prior.png: white
paystubx basic.png: white
PaystubX Basic.png: white
PaystubX Check 2.0.2.png: white
PaystubX Check 2.0.png: white
