<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapSahamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_sahams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emiten_id');
            $table->foreign('emiten_id')->references('id')->on('emitens');
            $table->string('tanggal');
            $table->string('open');
            $table->string('close');
            $table->string('sumber');  
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
        Schema::dropIfExists('rekap_sahams');
    }
}
