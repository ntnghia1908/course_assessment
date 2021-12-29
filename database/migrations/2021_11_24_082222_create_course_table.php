<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->integer('course_level_id')->index('FK_Course_CourseLevel');
            $table->string('name')->nullable();
            $table->string('name_vn');
            $table->integer('credit_theory')->nullable();
            $table->integer('credit_lab')->nullable();
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course');
    }
}
