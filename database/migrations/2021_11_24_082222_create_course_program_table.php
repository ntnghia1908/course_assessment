<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_program', function (Blueprint $table) {
            $table->string('course_id')->index('course_id');
            $table->integer('program_id')->index('fk2_idx');
            $table->string('course_code');
            $table->integer('course_type_id');

            $table->primary(['course_id', 'program_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_program');
    }
}
