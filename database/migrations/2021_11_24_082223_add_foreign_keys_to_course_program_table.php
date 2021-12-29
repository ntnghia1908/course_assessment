<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCourseProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_program', function (Blueprint $table) {
            $table->foreign(['course_id'], 'fk1')->references(['id'])->on('course')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['program_id'], 'fk2')->references(['id'])->on('program')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_program', function (Blueprint $table) {
            $table->dropForeign('fk1');
            $table->dropForeign('fk2');
        });
    }
}
