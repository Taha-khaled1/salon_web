<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('setting_title_ar')->nullable();
            $table->text('setting_title_en')->nullable();
            $table->text('setting_site_email')->nullable();
            $table->text('setting_keywords')->nullable();
            $table->text('setting_description')->nullable();
            $table->text('setting_site_address_ar')->nullable();
            $table->text('setting_site_address_en')->nullable();
            $table->text('setting_googlemap')->nullable();
            $table->text('setting_facebookurl')->nullable();
            $table->text('setting_twitterurl')->nullable();
            $table->text('setting_googleplusurl')->nullable();
            $table->text('setting_instgramurl')->nullable();
            $table->string('setting_snapchaturl')->nullable();
            $table->string('setting_linkedinurl')->nullable();
            $table->string('setting_youtubeurl')->nullable();
            $table->string('setting_whatsappurl')->nullable();
            $table->text('setting_sitetell1')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
