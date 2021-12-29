<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClassSloCloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class_slo_clo', function (Blueprint $table) {
            $table->foreign(['clo_id'], 'FKecnfqj0x90g694r9lpkch9v65')->references(['id'])->on('learning_outcome')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['class_id'], 'FKg1858kfovl46bais7h0263fgb')->references(['id'])->on('class_session')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['slo_id'], 'FKpfxxfwt6crqhsnjdhn8ltf4cu')->references(['id'])->on('slo')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class_slo_clo', function (Blueprint $table) {
            $table->dropForeign('FKecnfqj0x90g694r9lpkch9v65');
            $table->dropForeign('FKg1858kfovl46bais7h0263fgb');
            $table->dropForeign('FKpfxxfwt6crqhsnjdhn8ltf4cu');
        });
    }
}
