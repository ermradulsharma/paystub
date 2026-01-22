<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deductions')->truncate();

        $deductions = [
            // USA
            ['state' => 'usa', 'type' => 'federal', 'title' => 'Social Security', 'price' => 6.20],
            ['state' => 'usa', 'type' => 'federal', 'title' => 'Medicare', 'price' => 1.45],

            // Canada (2026)
            ['state' => 'canada', 'type' => 'federal', 'title' => 'Federal Tax', 'price' => 14.00],
            ['state' => 'canada', 'type' => 'federal', 'title' => 'CPP', 'price' => 5.95],
            ['state' => 'canada', 'type' => 'federal', 'title' => 'EI', 'price' => 1.66],

            // UK (2025/26)
            ['state' => 'uk', 'type' => 'paye', 'title' => 'PAYE (Basic)', 'price' => 20.00],
            ['state' => 'uk', 'type' => 'ni', 'title' => 'National Insurance', 'price' => 8.00],

            // Global (Representative/Sample)
            ['state' => 'global', 'type' => 'tax', 'title' => 'Income Tax', 'price' => 10.00],
            ['state' => 'global', 'type' => 'social', 'title' => 'Social Security', 'price' => 5.00],
        ];

        foreach ($deductions as $deduction) {
            DB::table('deductions')->insert(array_merge($deduction, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
