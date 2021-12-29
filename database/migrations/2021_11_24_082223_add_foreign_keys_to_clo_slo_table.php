<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCloSloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clo_slo', function (Blueprint $table) {
            $table->foreign(['slo_id'], 'FKnu0yp3vha8fgl05wo50ak1iwq')->references(['id'])->on('slo')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['lo_id'], 'fk_clo_slo_learning_outcome')->references(['id'])->on('learning_outcome')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clo_slo', function (Blueprint $table) {
            $table->dropForeign('FKnu0yp3vha8fgl05wo50ak1iwq');
            $table->dropForeign('fk_clo_slo_learning_outcome');
        });
    }
}
