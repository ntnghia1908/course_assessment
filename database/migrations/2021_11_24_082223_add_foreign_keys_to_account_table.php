<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account', function (Blueprint $table) {
            $table->foreign(['instructor_id'], 'FK9nkqtsydmph5nrsd3sn1f4w29')->references(['id'])->on('instructor')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account', function (Blueprint $table) {
            $table->dropForeign('FK9nkqtsydmph5nrsd3sn1f4w29');
        });
    }
}
