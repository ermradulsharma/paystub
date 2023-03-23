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
                    'prize'             => '3.99',
                    "plan_duration"     => '24 Hours',
                    "description"       => 'Unlimited Paystub Access',
                    "created_by"        => 1,
                    "created_at"        => Carbon::now()->format('Y-m-d H:i:s'),
                    "updated_at"        => Carbon::now()->format('Y-m-d H:i:s')

                ],
                [
                    'name'              => '1 Month',
                    'prize'             => '9.99',
                    "plan_duration"     => '1 month',
                    "description"       => 'Unlimited Paystub Access',
                    "created_by"        => 1,
                    "created_at"        => Carbon::now()->format('Y-m-d H:i:s'),
                    "updated_at"        => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'name'              => '3 Month',
                    'prize'             => '19.99',
                    "plan_duration"     => '3 month',
                    "description"       => 'Unlimited Paystub Access, save 33%',
                    "created_by"        => 1,
                    "created_at"        => Carbon::now()->format('Y-m-d H:i:s'),
                    "updated_at"        => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'name'              => '6 Month',
                    'prize'             => '29.99',
                    "plan_duration"     => '6 month',
                    "description"       => 'Unlimited Paystub Access, save 53%',
                    "created_by"        => 1,
                    "created_at"        => Carbon::now()->format('Y-m-d H:i:s'),
                    "updated_at"        => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'name'              => 'Life Time',
                    'prize'             => '99.99',
                    "plan_duration"     => 'unlimited',
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
