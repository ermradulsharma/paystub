<?php

namespace Database\Seeders;

use App\Models\StateTax as ModelsStateTax;
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
            $countries = [
                ['country_code' => 'USA', 'state_code' => 'AL', 'state' => 'Alabama', 'rate' => '4.23'],
                ['country_code' => 'USA', 'state_code' => 'AK', 'state' => 'Alaska', 'rate' => '0.00'],
                ['country_code' => 'USA', 'state_code' => 'AZ', 'state' => 'Arizona', 'rate' => '3.36'],
                ['country_code' => 'USA', 'state_code' => 'AR', 'state' => 'Arkansas', 'rate' => '6.00'],
                ['country_code' => 'USA', 'state_code' => 'CA', 'state' => 'California', 'rate' => '6.00'],
                ['country_code' => 'USA', 'state_code' => 'CO', 'state' => 'Colorado', 'rate' => '4.63'],
                ['country_code' => 'USA', 'state_code' => 'CT', 'state' => 'Connecticut', 'rate' => '5.00'],
                ['country_code' => 'USA', 'state_code' => 'DE', 'state' => 'Delaware', 'rate' => '5.50'],
                ['country_code' => 'USA', 'state_code' => 'FL', 'state' => 'Florida', 'rate' => '0.00'],
                ['country_code' => 'USA', 'state_code' => 'GA', 'state' => 'Georgia', 'rate' => '6.00'],
                ['country_code' => 'USA', 'state_code' => 'HI', 'state' => 'Hawaii', 'rate' => '7.60'],
                ['country_code' => 'USA', 'state_code' => 'ID', 'state' => 'Idaho', 'rate' => '7.40'],
                ['country_code' => 'USA', 'state_code' => 'IL', 'state' => 'Illinois', 'rate' => '4.75'],
                ['country_code' => 'USA', 'state_code' => 'IN', 'state' => 'Indiana', 'rate' => '3.40'],
                ['country_code' => 'USA', 'state_code' => 'IA', 'state' => 'Iowa', 'rate' => '6.48'],
                ['country_code' => 'USA', 'state_code' => 'KS', 'state' => 'Kansas', 'rate' => '4.90'],
                ['country_code' => 'USA', 'state_code' => 'KY', 'state' => 'Kentucky', 'rate' => '5.80'],
                ['country_code' => 'USA', 'state_code' => 'LA', 'state' => 'Louisiana', 'rate' => '4.00'],
                ['country_code' => 'USA', 'state_code' => 'ME', 'state' => 'Maine', 'rate' => '5.80'],
                ['country_code' => 'USA', 'state_code' => 'MD', 'state' => 'Maryland', 'rate' => '4.75'],
                ['country_code' => 'USA', 'state_code' => 'MA', 'state' => 'Massachusetts', 'rate' => '5.25'],
                ['country_code' => 'USA', 'state_code' => 'MI', 'state' => 'Michigan', 'rate' => '4.25'],
                ['country_code' => 'USA', 'state_code' => 'MN', 'state' => 'Minnesota', 'rate' => '5.35'],
                ['country_code' => 'USA', 'state_code' => 'MS', 'state' => 'Mississippi', 'rate' => '5.00'],
                ['country_code' => 'USA', 'state_code' => 'MO', 'state' => 'Missouri', 'rate' => '6.00'],
                ['country_code' => 'USA', 'state_code' => 'MT', 'state' => 'Montana', 'rate' => '6.00'],
                ['country_code' => 'USA', 'state_code' => 'NE', 'state' => 'Nebraska', 'rate' => '5.01'],
                ['country_code' => 'USA', 'state_code' => 'NV', 'state' => 'Nevada', 'rate' => '0.00'],
                ['country_code' => 'USA', 'state_code' => 'NH', 'state' => 'New Hampshire', 'rate' => '5.00'],
                ['country_code' => 'USA', 'state_code' => 'NJ', 'state' => 'New Jersey', 'rate' => '5.25'],
                ['country_code' => 'USA', 'state_code' => 'NM', 'state' => 'New Mexico', 'rate' => '4.90'],
                ['country_code' => 'USA', 'state_code' => 'NY', 'state' => 'New York', 'rate' => '6.45'],
                ['country_code' => 'USA', 'state_code' => 'NC', 'state' => 'North Carolina', 'rate' => '7.00'],
                ['country_code' => 'USA', 'state_code' => 'ND', 'state' => 'North Dakota', 'rate' => '3.13'],
                ['country_code' => 'USA', 'state_code' => 'OH', 'state' => 'Ohio', 'rate' => '3.52'],
                ['country_code' => 'USA', 'state_code' => 'OK', 'state' => 'Oklahoma', 'rate' => '5.25'],
                ['country_code' => 'USA', 'state_code' => 'OR', 'state' => 'Oregon', 'rate' => '9.00'],
                ['country_code' => 'USA', 'state_code' => 'PA', 'state' => 'Pennsylvania', 'rate' => '3.07'],
                ['country_code' => 'USA', 'state_code' => 'RI', 'state' => 'Rhode Island', 'rate' => '3.75'],
                ['country_code' => 'USA', 'state_code' => 'SC', 'state' => 'South Carolina', 'rate' => '7.00'],
                ['country_code' => 'USA', 'state_code' => 'SD', 'state' => 'South Dakota', 'rate' => '0.00'],
                ['country_code' => 'USA', 'state_code' => 'TN', 'state' => 'Tennessee', 'rate' => '0.00'],
                ['country_code' => 'USA', 'state_code' => 'TX', 'state' => 'Texas', 'rate' => '0.00'],
                ['country_code' => 'USA', 'state_code' => 'UT', 'state' => 'Utah', 'rate' => '5.00'],
                ['country_code' => 'USA', 'state_code' => 'VT', 'state' => 'Vermont', 'rate' => '3.55'],
                ['country_code' => 'USA', 'state_code' => 'VA', 'state' => 'Virginia', 'rate' => '5.75'],
                ['country_code' => 'USA', 'state_code' => 'WA', 'state' => 'Washington', 'rate' => '0.00'],
                ['country_code' => 'USA', 'state_code' => 'WV', 'state' => 'West Virginia', 'rate' => '4.50'],
                ['country_code' => 'USA', 'state_code' => 'WI', 'state' => 'Wisconsin', 'rate' => '4.60'],
                ['country_code' => 'USA', 'state_code' => 'WY', 'state' => 'Wyoming', 'rate' => '4.60'],
                ['country_code' => 'USA', 'state_code' => 'DC', 'state' => 'District of Columbia', 'rate' => '6.00'],

                ['country_code' => 'CA', 'state_code' => 'AB', 'state' => 'Alberta', 'rate' => '0.00'],
                ['country_code' => 'CA', 'state_code' => 'BC', 'state' => 'British Columbia', 'rate' => '0.00'],
                ['country_code' => 'CA', 'state_code' => 'MB', 'state' => 'Manitoba', 'rate' => '0.00'],
                ['country_code' => 'CA', 'state_code' => 'NB', 'state' => 'New Brunswick', 'rate' => '0.00'],
                ['country_code' => 'CA', 'state_code' => 'NL', 'state' => 'Newfoundland and Labrador', 'rate' => '0.00'],
                ['country_code' => 'CA', 'state_code' => 'NT', 'state' => 'Northwest Territories', 'rate' => '0.00'],
                ['country_code' => 'CA', 'state_code' => 'NS', 'state' => 'Nova Scotia', 'rate' => '0.00'],
                ['country_code' => 'CA', 'state_code' => 'NU', 'state' => 'Nunavut', 'rate' => '0.00'],
                ['country_code' => 'CA', 'state_code' => 'ON', 'state' => 'Ontario', 'rate' => '0.00'],
                ['country_code' => 'CA', 'state_code' => 'PEI', 'state' => 'Prince Edward Island', 'rate' => '0.00'],
                ['country_code' => 'CA', 'state_code' => 'QC', 'state' => 'Quebec', 'rate' => '0.00'],
                ['country_code' => 'CA', 'state_code' => 'SK', 'state' => 'Saskatchewan', 'rate' => '0.00'],
                ['country_code' => 'CA', 'state_code' => 'YT', 'state' => 'Yukon', 'rate' => '0.00'],
            ];
            ModelsStateTax::insert($countries);
        }
    }
}
