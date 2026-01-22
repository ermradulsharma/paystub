<?php

namespace Database\Seeders;

use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::truncate();

        if (Plan::count() == 0) {
            $plans = [
                [
                    'name' => '1 Day',
                    'price' => '9.99',
                    'plan_duration' => '24',
                    'plan_type' => 'hourly',
                    'description' => 'Unlimited Paystub Access',
                    'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ],
                [
                    'name' => '1 Month',
                    'price' => '19.99',
                    'plan_duration' => '1',
                    'plan_type' => 'monthly',
                    'description' => 'Unlimited Paystub Access',
                    'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => '3 Months',
                    'price' => '29.99',
                    'plan_duration' => '3',
                    'plan_type' => 'monthly',
                    'description' => 'Unlimited Paystub Access, save 33%',
                    'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => '6 Months',
                    'price' => '89.99',
                    'plan_duration' => '6',
                    'plan_type' => 'monthly',
                    'description' => 'Unlimited Paystub Access, save 53%',
                    'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],
                [
                    'name' => '12 Months',
                    'price' => '199.99',
                    'plan_duration' => '12',
                    'plan_type' => 'yearly',
                    'description' => 'Unlimited Paystub Access',
                    'created_by' => 1,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ],

            ];
            Plan::insert($plans);
        }
    }
}
