<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLearningOutcomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('learning_outcome', function (Blueprint $table) {
            $table->foreign(['course_id'], 'FK_LearningOutcome')->references(['id'])->on('course')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('learning_outcome', function (Blueprint $table) {
            $table->dropForeign('FK_LearningOutcome');
        });
    }
}
