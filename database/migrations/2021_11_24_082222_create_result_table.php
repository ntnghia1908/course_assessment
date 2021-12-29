<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result', function (Blueprint $table) {
            $table->string('student_id', 50);
            $table->integer('class_id')->index('FK_result_class');
            $table->integer('mid_score')->nullable();
            $table->integer('final_score')->nullable();
            $table->integer('in_class_score')->nullable();
            $table->integer('GPA')->nullable();
            $table->integer('abet_score')->nullable();
            $table->integer('abet_1')->nullable();
            $table->integer('abet_2')->nullable();
            $table->integer('abet_3')->nullable();
            $table->integer('abet_4')->nullable();
            $table->integer('abet_5')->nullable();
            $table->integer('abet_6')->nullable();
            $table->float('avg', 10, 0)->nullable();

            $table->primary(['student_id', 'class_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('result');
    }
}
