<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->string('user_address')->nullable();
            $table->string('user_mobile')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();

            $table->string('service_name')->nullable();
            $table->string('service_start_date')->nullable();
            $table->string('service_end_date')->nullable();
            $table->string('service_period')->nullable();
            $table->string('service_price')->nullable();
            $table->string('service_description')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
