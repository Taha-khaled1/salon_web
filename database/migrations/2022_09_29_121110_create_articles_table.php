<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('departement_id');
            $table->string('articles_title_ar')->nullable();
            $table->string('articles_title_en')->nullable();
            $table->text('articles_subject_ar')->nullable();
            $table->text('articles_subject_en')->nullable();
            $table->text('articles_subject_ar2')->nullable();
            $table->text('articles_subject_en2')->nullable();
            $table->string('articles_isactive')->default(1);
            $table->string('articles_image')->nullable();
            $table->string('articles_date')->nullable();
            $table->string('articles_image2')->nullable();
            $table->string('articles_image3')->nullable();
            $table->string('articles_image4')->nullable();
            $table->string('articles_address_ar')->nullable();
            $table->string('articles_address_en')->nullable();
            $table->string('articles_rate')->nullable();
            $table->string('articles_map')->nullable();
            $table->string('articles_keyword')->nullable();
            $table->string('articles_desc')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
