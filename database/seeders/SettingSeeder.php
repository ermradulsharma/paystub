<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Setting::truncate();
        Schema::enableForeignKeyConstraints();

        $settings = [
            ['name' => 'site_name', 'description' => 'Name of the website', 'value' => 'PaystubX'],
            ['name' => 'site_logo', 'description' => 'URL to the site logo', 'value' => '/logo.png'],
            ['name' => 'contact_email', 'description' => 'Primary contact email', 'value' => 'support@paystubx.com'],
            ['name' => 'footer_text', 'description' => 'Text displayed in the footer', 'value' => '© 2026 PaystubX. All rights reserved.'],
            ['name' => 'google_maps_api_key', 'description' => 'API Key for Google Maps integration', 'value' => 'YOUR_GOOGLE_MAPS_API_KEY'],
            ['name' => 'stripe_public_key', 'description' => 'Stripe Public Key', 'value' => 'pk_test_...'],
            ['name' => 'stripe_secret_key', 'description' => 'Stripe Secret Key', 'value' => 'sk_test_...'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
