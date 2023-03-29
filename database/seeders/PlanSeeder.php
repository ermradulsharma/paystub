<?php

namespace Database\Seeders;
use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
            $plans = array(
                [
                    'name'              => '24 Hours',
                    'price'             => '3.99',
                    "plan_duration"     => '24',
                    "plan_type"         => 'hourly',
                    "description"       => 'Unlimited Paystub Access',
                    "created_by"        => 1,
                    "created_at"        => Carbon::now()->format('Y-m-d H:i:s'),
                    "updated_at"        => Carbon::now()->format('Y-m-d H:i:s')

                ],
                [
                    'name'              => '1 Month',
                    'price'             => '9.99',
                    "plan_duration"     => '1',
                    "plan_type"         => 'monthly',
                    "description"       => 'Unlimited Paystub Access',
                    "created_by"        => 1,
                    "created_at"        => Carbon::now()->format('Y-m-d H:i:s'),
                    "updated_at"        => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'name'              => '3 Month',
                    'price'             => '19.99',
                    "plan_duration"     => '3',
                    "plan_type"         => 'monthly',
                    "description"       => 'Unlimited Paystub Access, save 33%',
                    "created_by"        => 1,
                    "created_at"        => Carbon::now()->format('Y-m-d H:i:s'),
                    "updated_at"        => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'name'              => '6 Month',
                    'price'             => '29.99',
                    "plan_duration"     => '6',
                    "plan_type"         => 'monthly',
                    "description"       => 'Unlimited Paystub Access, save 53%',
                    "created_by"        => 1,
                    "created_at"        => Carbon::now()->format('Y-m-d H:i:s'),
                    "updated_at"        => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'name'              => 'Life Time',
                    'price'             => '99.99',
                    "plan_duration"     => '99',
                    "plan_type"         => 'yearly',
                    "description"       => 'Unlimited Paystub Access',
                    "created_by"        => 1,
                    "created_at"        => Carbon::now()->format('Y-m-d H:i:s'),
                    "updated_at"        => Carbon::now()->format('Y-m-d H:i:s')
                ],


            );
            Plan::insert($plans);
        }
    }
}
