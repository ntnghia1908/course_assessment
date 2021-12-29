<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClassAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class_assessment', function (Blueprint $table) {
            $table->foreign(['assessment_id'], 'FK_class_assemssment_assessment')->references(['id'])->on('assessment')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['class_id'], 'FK_class_assemssment_class')->references(['id'])->on('class_session')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['learning_outcome_id'], 'FK_class_assemssment_learning_outcome')->references(['id'])->on('learning_outcome')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_assessment', function (Blueprint $table) {
            $table->dropForeign('FK_class_assemssment_assessment');
            $table->dropForeign('FK_class_assemssment_class');
            $table->dropForeign('FK_class_assemssment_learning_outcome');
        });
    }
}
