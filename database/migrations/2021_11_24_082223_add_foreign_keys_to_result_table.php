<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('result', function (Blueprint $table) {
            $table->foreign(['class_id'], 'FK_result_class')->references(['id'])->on('class_session')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['student_id'], 'FK_result_student')->references(['id'])->on('student')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('result', function (Blueprint $table) {
            $table->dropForeign('FK_result_class');
            $table->dropForeign('FK_result_student');
        });
    }
}
