<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClassSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class_session', function (Blueprint $table) {
            $table->foreign(['course_id'], 'FK_class_course')->references(['id'])->on('course')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['instructor_id'], 'FK_class_instructor')->references(['id'])->on('instructor')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_session', function (Blueprint $table) {
            $table->dropForeign('FK_class_course');
            $table->dropForeign('FK_class_instructor');
        });
    }
}
