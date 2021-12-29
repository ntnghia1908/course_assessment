<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassSloCloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_slo_clo', function (Blueprint $table) {
            $table->integer('class_id');
            $table->integer('clo_id')->index('FKecnfqj0x90g694r9lpkch9v65');
            $table->integer('slo_id')->index('FKpfxxfwt6crqhsnjdhn8ltf4cu');
            $table->float('percentage', 10, 0)->nullable();

            $table->primary(['class_id', 'clo_id', 'slo_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_slo_clo');
    }
}
