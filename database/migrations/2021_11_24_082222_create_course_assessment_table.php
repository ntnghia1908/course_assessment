<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_assessment', function (Blueprint $table) {
            $table->integer('assessment_id');
            $table->string('course_id')->index('Fk_AssessmentCourse_Course');
            $table->integer('percentage');

            $table->primary(['assessment_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_assessment');
    }
}
