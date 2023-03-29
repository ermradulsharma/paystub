<?php

namespace Database\Seeders;

use App\Models\StateTax as ModelsStateTax;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateTaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('state_taxes')->truncate();

        if (ModelsStateTax::count() == 0) {
            $countries = array(
                ['state_code'=>'AL', 'state' => 'Alabama', "rate" => '4.23'],
                ['state_code'=>'AK', 'state' => 'Alaska', "rate" => '0.00'],
                ['state_code'=>'AZ', 'state' => 'Arizona', "rate" => '3.36'],
                ['state_code'=>'AR', 'state' => 'Arkansas', "rate" => '6.00'],
                ['state_code'=>'CA', 'state' => 'California', "rate" => '6.00'],
                ['state_code'=>'CO', 'state' => 'Colorado', "rate" => '4.63'],
                ['state_code'=>'CT', 'state' => 'Connecticut', "rate" => '5.00'],
                ['state_code'=>'DE', 'state' => 'Delaware', "rate" => '5.50'],
                ['state_code'=>'FL', 'state' => 'Florida', "rate" => '0.00'],
                ['state_code'=>'GA', 'state' => 'Georgia', "rate" => '6.00'],
                ['state_code'=>'HI', 'state' => 'Hawaii', "rate" => '7.60'],
                ['state_code'=>'ID', 'state' => 'Idaho', "rate" => '7.40'],
                ['state_code'=>'IL', 'state' => 'Illinois', "rate" => '4.75'],
                ['state_code'=>'IN', 'state' => 'Indiana', "rate" => '3.40'],
                ['state_code'=>'IA', 'state' => 'Iowa', "rate" => '6.48'],
                ['state_code'=>'KS', 'state' => 'Kansas', "rate" => '4.90'],
                ['state_code'=>'KY', 'state' => 'Kentucky', "rate" => '5.80'],
                ['state_code'=>'LA', 'state' => 'Louisiana', "rate" => '4.00'],
                ['state_code'=>'ME', 'state' => 'Maine', "rate" => '5.80'],
                ['state_code'=>'MD', 'state' => 'Maryland', "rate" => '4.75'],
                ['state_code'=>'MA', 'state' => 'Massachusetts', "rate" => '5.25'],
                ['state_code'=>'MI', 'state' => 'Michigan', "rate" => '4.25'],
                ['state_code'=>'MN', 'state' => 'Minnesota', "rate" => '5.35'],
                ['state_code'=>'MS', 'state' => 'Mississippi', "rate" => '5.00'],
                ['state_code'=>'MO', 'state' => 'Missouri', "rate" => '6.00'],
                ['state_code'=>'MT', 'state' => 'Montana', "rate" => '6.00'],
                ['state_code'=>'NE', 'state' => 'Nebraska', "rate" => '5.01'],
                ['state_code'=>'NV', 'state' => 'Nevada', "rate" => '0.00'],
                ['state_code'=>'NH', 'state' => 'New Hampshire', "rate" => '5.00'],
                ['state_code'=>'NJ', 'state' => 'New Jersey', "rate" => '5.25'],
                ['state_code'=>'NM', 'state' => 'New Mexico', "rate" => '4.90'],
                ['state_code'=>'NY', 'state' => 'New York', "rate" => '6.45'],
                ['state_code'=>'NC', 'state' => 'North Carolina', "rate" => '7.00'],
                ['state_code'=>'ND', 'state' => 'North Dakota', "rate" => '3.13'],
                ['state_code'=>'OH', 'state' => 'Ohio', "rate" => '3.52'],
                ['state_code'=>'OK', 'state' => 'Oklahoma', "rate" => '5.25'],
                ['state_code'=>'OR', 'state' => 'Oregon', "rate" => '9.00'],
                ['state_code'=>'PA', 'state' => 'Pennsylvania', "rate" => '3.07'],
                ['state_code'=>'RI', 'state' => 'Rhode Island', "rate" => '3.75'],
                ['state_code'=>'SC', 'state' => 'South Carolina', "rate" => '7.00'],
                ['state_code'=>'SD', 'state' => 'South Dakota', "rate" => '0.00'],
                ['state_code'=>'TN', 'state' => 'Tennessee', "rate" => '0.00'],
                ['state_code'=>'TX', 'state' => 'Texas', "rate" => '0.00'],
                ['state_code'=>'UT', 'state' => 'Utah', "rate" => '5.00'],
                ['state_code'=>'VT', 'state' => 'Vermont', "rate" => '3.55'],
                ['state_code'=>'VA', 'state' => 'Virginia', "rate" => '5.75'],
                ['state_code'=>'WA', 'state' => 'Washington', "rate" => '0.00'],
                ['state_code'=>'WV', 'state' => 'West Virginia', "rate" => '4.50'],
                ['state_code'=>'WI', 'state' => 'Wisconsin', "rate" => '4.60'],
                ['state_code'=>'WY', 'state' => 'Wyoming', "rate" => '4.60'],
                ['state_code'=>'DC', 'state' => 'District of Columbia', "rate" => '6.00']
            );
            ModelsStateTax::insert($countries);
        }
    }
}
