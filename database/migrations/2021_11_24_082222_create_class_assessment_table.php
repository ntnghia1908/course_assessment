<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassAssessmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_assessment', function (Blueprint $table) {
            $table->integer('class_id')->unique('UK_4rl0dnl0bu15tbx8bws7jbuxr');
            $table->integer('assessment_id')->index('fk_class_assemssment_assessment');
            $table->integer('learning_outcome_id')->index('fk_class_assemssment_learning_outcome');
            $table->integer('precentage')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_assessment');
    }
}
