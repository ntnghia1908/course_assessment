<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_session', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('course_id')->index('FK_class_course');
            $table->integer('instructor_id')->index('fk_class_instructor');
            $table->integer('group')->nullable();
            $table->integer('group_lab')->nullable();
            $table->integer('semester')->nullable();
            $table->string('academic_year')->nullable();
            $table->integer('group_theory')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_session');
    }
}
