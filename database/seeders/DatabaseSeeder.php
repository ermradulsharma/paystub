<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $this->call(AdminSeeder::class);
        $this->call(StateTaxSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(DeductionSeeder::class);
        $this->call(TemplateSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(ColorCodeSeeder::class);

        Schema::enableForeignKeyConstraints();
    }
}
