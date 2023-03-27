<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_days', function (Blueprint $table) {
            $table->id();
            $table->biginteger('article_id')->unsigned();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->string('day_details_en')->nullable();
            $table->string('day_details_ar')->nullable();
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
        Schema::dropIfExists('article_days');
    }
}
