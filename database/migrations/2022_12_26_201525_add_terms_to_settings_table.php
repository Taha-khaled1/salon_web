<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTermsToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->text('setting_terms_ar')->nullable();
            $table->text('setting_terms_en')->nullable();
            $table->text('setting_pay_policy_ar')->nullable();
            $table->text('setting_pay_policy_en')->nullable();
            $table->text('setting_payback_policy_ar')->nullable();
            $table->text('setting_payback_policy_en')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('setting_terms_ar');
            $table->dropColumn('setting_terms_en');
            $table->dropColumn('setting_pay_policy_ar');
            $table->dropColumn('setting_pay_policy_en');
            $table->dropColumn('setting_payback_policy_ar');
            $table->dropColumn('setting_payback_policy_en');
        });
    }
}
