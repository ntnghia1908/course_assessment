<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassAssessmentCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_assessment_course', function (Blueprint $table) {
            $table->integer('class_id')->index('fk_class_assessment_course_class');
            $table->integer('assessment_id')->index('fk_class_assessment_course_assessment');
            $table->integer('percentage')->nullable();
            $table->integer('lo_id');
            $table->integer('slo_id');

            $table->primary(['class_id', 'assessment_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_assessment_course');
    }
}
