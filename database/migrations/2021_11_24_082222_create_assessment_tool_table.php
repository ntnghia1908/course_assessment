<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentToolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_tool', function (Blueprint $table) {
            $table->integer('assessment_id');
            $table->string('course_id');
            $table->integer('loutcome_id')->index('FK_AssessmentTool_LOutcome');
            $table->float('percentage', 10, 0)->nullable();

            $table->unique(['course_id', 'assessment_id', 'loutcome_id'], 'assessment_tool_id');
            $table->index(['assessment_id', 'course_id'], 'FK_AssessmentTool_AssessmentCourse');
            $table->primary(['assessment_id', 'course_id', 'loutcome_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assessment_tool');
    }
}
