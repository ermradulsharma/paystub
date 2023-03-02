<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->truncate();

        if (Currency::count() == 0) {
            $currency = array(
                ['name' => 'USD', 'unicode' => '&#36;', "symbol" => '$'],
                ['name' => 'ILS', 'unicode' => '&#8362;', "symbol" => '₪'],
                ['name' => 'GBP', 'unicode' => '&#163;', "symbol" => '£'],
                ['name' => 'EUR', 'unicode' => '&#8364;', "symbol" => '€'],
                ['name' => 'AFN', 'unicode' => '&#1547;', "symbol" => '؋'],
                ['name' => 'JPY', 'unicode' => '&#165;', "symbol" => '¥'],
                ['name' => 'INR', 'unicode' => '&#8360;', "symbol" => '₨'],
                ['name' => 'IRR', 'unicode' => '&#65020;', "symbol" => '﷼'],
                ['name' => 'HKD', 'unicode' => '&#36;', "symbol" => 'HK$'],
                ['name' => 'ALL', 'unicode' => '&#76;&#101;&#10', 'Lek'],
                ['name' => 'GGP', 'unicode' => '&#163;', "symbol" => '£'],
                ['name' => 'AWG', 'unicode' => '&#402;', "symbol" => 'ƒ'],
                ['name' => 'BOB', 'unicode' => '&#36;&#98;', "symbol" => '$b'],
                ['name' => 'BWP', 'unicode' => '&#80;', "symbol" => 'P'],
                ['name' => 'BRL', 'unicode' => '&#82;&#36;', "symbol" => 'R$'],
                ['name' => 'BGN', 'unicode' => '&#1083;&#1074;', "symbol" => 'лв'],
                ['name' => 'KHR', 'unicode' => '&#6107;', "symbol" => '៛'],
                ['name' => 'CNY', 'unicode' => '&#165;', "symbol" => '¥'],
                ['name' => 'CRC', 'unicode' => '&#8353;', "symbol" => '₡'],
                ['name' => 'HRK', 'unicode' => '&#107;&#110;', "symbol" => 'kn'],
                ['name' => 'ANG', 'unicode' => '&#402;', "symbol" => 'ƒ'],
                ['name' => 'CZK', 'unicode' => '&#75;&#269;', "symbol" => 'Kč'],
                ['name' => 'DKK', 'unicode' => '&#107;&#114;', "symbol" => 'kr.'],
                ['name' => 'EGP', 'unicode' => '&#163;', "symbol" => '£'],
                ['name' => 'NGN', 'unicode' => '&#8358;', "symbol" => '₦'],
                ['name' => 'Baht', 'unicode' => '&#3647;', "symbol" => '฿'],
                ['name' => 'ZAR', 'unicode' => '&#82;', "symbol" => 'R'],
                ['name' => 'KZT', 'unicode' => '&#1083;&#1074;', "symbol" => '₸'],
                ['name' => 'KPW', 'unicode' => '&#8361;', "symbol" => '₩'],
                ['name' => 'KGS', 'unicode' => '&#1083;&#1074;', "symbol" => 'лв'],
                ['name' => 'LAK', 'unicode' => '&#8365;', "symbol" => '₭'],
                ['name' => 'LBP', 'unicode' => '&#163;', "symbol" => 'ل.ل'],
                ['name' => 'JMD', 'unicode' => '&#74;&#36;', "symbol" => 'J$'],
                ['name' => 'PKR', 'unicode' => '&#8360;', "symbol" => '₨'],
                ['name' => 'PLN', 'unicode' => '&#122;&#322;', "symbol" => 'zł'],
                ['name' => 'RON', 'unicode' => '&#108;&#101;&#105;', "symbol" => 'lei'],
                ['name' => 'RUB', 'unicode' => '&#8381;', "symbol" => '₽'],
                ['name' => 'SAR', 'unicode' => '&#65020;', "symbol" => '﷼'],
                ['name' => 'MKD', 'unicode' => '&#1076;&#1077;&#1085;', "symbol" => 'ден'],
                ['name' => 'MYR', 'unicode' => '&#82;&#77;', "symbol" => 'RM'],
                ['name' => 'MNT', 'unicode' => '&#8366;', "symbol" => '₮'],
                ['name' => 'NIO', 'unicode' => '&#67;&#36;', "symbol" => 'C$'],
                ['name' => 'OMR', 'unicode' => '&#65020;', "symbol" => '﷼'],
                ['name' => 'PYG', 'unicode' => '&#71;&#115;', "symbol" => 'Gs'],
                ['name' => 'PHP', 'unicode' => '&#8369;', "symbol" => '₱'],
                ['name' => 'LKR', 'unicode' => '&#8360;', "symbol" => '₨'],
                ['name' => 'GTQ', 'unicode' => '&#81;', "symbol" => 'Q'],
                ['name' => 'HNL', 'unicode' => '&#76;', "symbol" => 'L'],
                ['name' => 'IDR', 'unicode' => '&#82;&#112;', "symbol" => 'Rp'],
                ['name' => 'ZWD', 'unicode' => '&#90;&#36;', "symbol" => 'Z$'],
                ['name' => 'UAH', 'unicode' => '&#8372;', "symbol" => '₴'],
                ['name' => 'MAD', 'unicode' => NULL, "symbol" => 'د.م.'],
                ['name' => 'MRO', 'unicode' => NULL, "symbol" => 'UM'],
                ['name' => 'AOA', 'unicode' => NULL, "symbol" => 'Kz'],
                ['name' => 'BHD', 'unicode' => NULL, "symbol" => '.د.ب'],
                ['name' => 'BDT', 'unicode' => NULL, "symbol" => '৳'],
                ['name' => 'BYR', 'unicode' => NULL, "symbol" => 'Br'],
                ['name' => 'XOF', 'unicode' => NULL, "symbol" => 'CFA'],
                ['name' => 'BIF', 'unicode' => NULL, "symbol" => 'FBu'],
                ['name' => 'JOD', 'unicode' => NULL, "symbol" => 'د.ا'],
                ['name' => 'KES', 'unicode' => NULL, "symbol" => 'KSh'],
                ['name' => 'KWD', 'unicode' => NULL, "symbol" => 'د.ك'],
                ['name' => 'MGA', 'unicode' => NULL, "symbol" => 'Ar'],
                ['name' => 'TRY', 'unicode' => NULL, "symbol" => 'TL'],
                ['name' => 'SDG', 'unicode' => '&#163;', "symbol" => '£Sd'],
                ['name' => 'TND', 'unicode' => NULL, "symbol" => 'د.ت'],
                ['name' => 'AED', 'unicode' => NULL, "symbol" => 'د.إ'],
                ['name' => 'HTG', 'unicode' => NULL, "symbol" => 'G'],
                ['name' => 'IQD', 'unicode' => NULL, "symbol" => 'ع.د'],
                ['name' => 'GHC', 'unicode' => NULL, "symbol" => 'GH₵'],
                ['name' => 'AMD', 'unicode' => '&#1423;', "symbol" => '֏']
            );
            Currency::insert($currency);
        }
    }
}
