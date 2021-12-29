<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('password')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_role')->nullable();
            $table->integer('instructor_id')->nullable()->index('FK9nkqtsydmph5nrsd3sn1f4w29');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account');
    }
}
