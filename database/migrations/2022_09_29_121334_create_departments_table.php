<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('department_fatherid')->nullable();
            $table->string('department_title_ar')->nullable();
            $table->string('department_title_en')->nullable();
            $table->string('department_isactive')->nullable();
            $table->string('department_isbranch')->nullable();
            $table->string('department_showdate')->nullable();
            $table->string('department_image')->nullable();
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
        Schema::dropIfExists('departments');
    }
}
