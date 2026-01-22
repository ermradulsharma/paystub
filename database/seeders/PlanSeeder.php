<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Plan::truncate();
        Schema::enableForeignKeyConstraints();

        $plans = [
            // USA Plans
            [
                'name' => '1 Day (USA)',
                'country' => 'USA',
                'price' => 9.99,
                'plan_duration' => '1',
                'plan_type' => 'daily',
                'description' => 'Unlimited USA Paystub Access',
                'created_by' => 1,
            ],
            [
                'name' => '1 Month (USA)',
                'country' => 'USA',
                'price' => 19.99,
                'plan_duration' => '1',
                'plan_type' => 'monthly',
                'description' => 'Unlimited USA Paystub Access',
                'created_by' => 1,
            ],
            [
                'name' => '3 Month (USA)',
                'country' => 'USA',
                'price' => 29.99,
                'plan_duration' => '3',
                'plan_type' => 'monthly',
                'description' => 'Unlimited USA Paystub Access',
                'created_by' => 1,
            ],
            [
                'name' => '6 Month (USA)',
                'country' => 'USA',
                'price' => 39.99,
                'plan_duration' => '6',
                'plan_type' => 'monthly',
                'description' => 'Unlimited USA Paystub Access',
                'created_by' => 1,
            ],
            [
                'name' => '1 Year (USA)',
                'country' => 'USA',
                'price' => 49.99,
                'plan_duration' => '12',
                'plan_type' => 'yearly',
                'description' => 'Unlimited USA Paystub Access',
                'created_by' => 1,
            ],

            // UK Plans
            [
                'name' => '1 Day (UK)',
                'country' => 'UK',
                'price' => 7.99,
                'plan_duration' => '1',
                'plan_type' => 'daily',
                'description' => 'Unlimited UK Paystub Access',
                'created_by' => 1,
            ],
            [
                'name' => '1 Month (UK)',
                'country' => 'UK',
                'price' => 15.99,
                'plan_duration' => '1',
                'plan_type' => 'monthly',
                'description' => 'Unlimited UK Paystub Access',
                'created_by' => 1,
            ],
            [
                'name' => '3 Month (UK)',
                'country' => 'UK',
                'price' => 29.99,
                'plan_duration' => '3',
                'plan_type' => 'monthly',
                'description' => 'Unlimited UK Paystub Access',
                'created_by' => 1,
            ],
            [
                'name' => '6 Month (UK)',
                'country' => 'UK',
                'price' => 39.99,
                'plan_duration' => '6',
                'plan_type' => 'monthly',
                'description' => 'Unlimited UK Paystub Access',
                'created_by' => 1,
            ],
            [
                'name' => '1 Year (UK)',
                'country' => 'UK',
                'price' => 49.99,
                'plan_duration' => '12',
                'plan_type' => 'yearly',
                'description' => 'Unlimited UK Paystub Access',
                'created_by' => 1,
            ],
            // Canada Plans
            [
                'name' => '1 Day (CA)',
                'country' => 'CA',
                'price' => 12.99,
                'plan_duration' => '1',
                'plan_type' => 'daily',
                'description' => 'Unlimited Canada Paystub Access',
                'created_by' => 1,
            ],
            [
                'name' => '1 Month (CA)',
                'country' => 'CA',
                'price' => 24.99,
                'plan_duration' => '1',
                'plan_type' => 'monthly',
                'description' => 'Unlimited Canada Paystub Access',
                'created_by' => 1,
            ],
            [
                'name' => '3 Month (CA)',
                'country' => 'CA',
                'price' => 29.99,
                'plan_duration' => '3',
                'plan_type' => 'monthly',
                'description' => 'Unlimited Canada Paystub Access',
                'created_by' => 1,
            ],
            [
                'name' => '6 Month (CA)',
                'country' => 'CA',
                'price' => 39.99,
                'plan_duration' => '6',
                'plan_type' => 'monthly',
                'description' => 'Unlimited Canada Paystub Access',
                'created_by' => 1,
            ],
            [
                'name' => '1 Year (CA)',
                'country' => 'CA',
                'price' => 49.99,
                'plan_duration' => '12',
                'plan_type' => 'yearly',
                'description' => 'Unlimited Canada Paystub Access',
                'created_by' => 1,
            ],
            // Global/Default Plans
            [
                'name' => '3 Month (Global)',
                'country' => '', // Empty for all
                'price' => 29.99,
                'plan_duration' => '3',
                'plan_type' => 'monthly',
                'description' => 'Unlimited Global Access',
                'created_by' => 1,
            ],
            [
                'name' => '6 Month (Global)',
                'country' => '', // Empty for all
                'price' => 39.99,
                'plan_duration' => '6',
                'plan_type' => 'monthly',
                'description' => 'Unlimited Global Access',
                'created_by' => 1,
            ],
            [
                'name' => '1 Year (Global)',
                'country' => '', // Empty for all
                'price' => 49.99,
                'plan_duration' => '12',
                'plan_type' => 'yearly',
                'description' => 'Unlimited Global Access',
                'created_by' => 1,
            ],
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
