<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCloSloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clo_slo', function (Blueprint $table) {
            $table->integer('slo_id')->index('fk_clo_slo_slo');
            $table->integer('lo_id')->index('fk_clo_slo_learning_outcome');
            $table->float('percentage', 10, 0)->nullable();

            $table->primary(['lo_id', 'slo_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clo_slo');
    }
}
