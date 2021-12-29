<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCourseAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_assessment', function (Blueprint $table) {
            $table->foreign(['course_id'], 'Fk_AssessmentCourse_Course')->references(['id'])->on('course')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['assessment_id'], 'FK_course_assessment_assessment')->references(['id'])->on('assessment')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_assessment', function (Blueprint $table) {
            $table->dropForeign('Fk_AssessmentCourse_Course');
            $table->dropForeign('FK_course_assessment_assessment');
        });
    }
}
