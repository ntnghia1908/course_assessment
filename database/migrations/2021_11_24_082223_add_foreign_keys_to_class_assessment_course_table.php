<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClassAssessmentCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class_assessment_course', function (Blueprint $table) {
            $table->foreign(['assessment_id'], 'FK_class_assessment_course_assessment')->references(['id'])->on('assessment')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['class_id'], 'FK_class_assessment_course_class')->references(['id'])->on('class_session')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_assessment_course', function (Blueprint $table) {
            $table->dropForeign('FK_class_assessment_course_assessment');
            $table->dropForeign('FK_class_assessment_course_class');
        });
    }
}
