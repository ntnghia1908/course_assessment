<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAssessmentToolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assessment_tool', function (Blueprint $table) {
            $table->foreign(['assessment_id'], 'FK_AssessmentTool_Assessment')->references(['id'])->on('assessment')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['course_id'], 'FK_AssessmentTool_Course')->references(['id'])->on('course')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['loutcome_id'], 'FK_AssessmentTool_LOutcome')->references(['id'])->on('learning_outcome')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assessment_tool', function (Blueprint $table) {
            $table->dropForeign('FK_AssessmentTool_Assessment');
            $table->dropForeign('FK_AssessmentTool_Course');
            $table->dropForeign('FK_AssessmentTool_LOutcome');
        });
    }
}
