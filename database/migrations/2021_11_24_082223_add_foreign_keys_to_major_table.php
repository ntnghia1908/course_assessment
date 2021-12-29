<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMajorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('major', function (Blueprint $table) {
            $table->foreign(['discipline_id'], 'FK_major_discipline')->references(['id'])->on('discipline')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('major', function (Blueprint $table) {
            $table->dropForeign('FK_major_discipline');
        });
    }
}
