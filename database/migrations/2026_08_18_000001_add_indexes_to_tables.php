<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('pay_slips') && Schema::hasColumn('pay_slips', 'user_id')) {
            Schema::table('pay_slips', function (Blueprint $table) {
                $table->index('user_id', 'pay_slips_user_id_index');
            });
        }

        if (Schema::hasTable('subcriptions')) {
            Schema::table('subcriptions', function (Blueprint $table) {
                if (Schema::hasColumn('subcriptions', 'user_id')) {
                    $table->index('user_id', 'subcriptions_user_id_index');
                }
                if (Schema::hasColumn('subcriptions', 'plan_id')) {
                    $table->index('plan_id', 'subcriptions_plan_id_index');
                }
            });
        }

        if (Schema::hasTable('addresses') && Schema::hasColumn('addresses', 'user_id')) {
            Schema::table('addresses', function (Blueprint $table) {
                $table->index('user_id', 'addresses_user_id_index');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('pay_slips')) {
            Schema::table('pay_slips', function (Blueprint $table) {
                $table->dropIndex('pay_slips_user_id_index');
            });
        }

        if (Schema::hasTable('subcriptions')) {
            Schema::table('subcriptions', function (Blueprint $table) {
                $table->dropIndex('subcriptions_user_id_index');
                $table->dropIndex('subcriptions_plan_id_index');
            });
        }

        if (Schema::hasTable('addresses')) {
            Schema::table('addresses', function (Blueprint $table) {
                $table->dropIndex('addresses_user_id_index');
            });
        }
    }
};
