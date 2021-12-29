<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCourseLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_level', function (Blueprint $table) {
            $table->foreign(['id'], 'fk_course_level_course')->references(['course_level_id'])->on('course')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_level', function (Blueprint $table) {
            $table->dropForeign('fk_course_level_course');
        });
    }
}
