<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundamentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fundamentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emiten_id');
            $table->foreign('emiten_id')->references('id')->on('emitens');
            $table->string('eps');
            $table->string('per');
            $table->string('pbv');
            $table->string('roe');
            $table->string('dy');
            $table->string('der');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fundamentals');
    }
}
