<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emiten_id');
            $table->foreign('emiten_id')->references('id')->on('emitens');
            $table->string('country');
            $table->string('latestquarter');
            $table->string('bookvalue');
            $table->string('pricetobookratio');
            $table->string('peratio');
            $table->string('eps');
            $table->string('returnonequityttm');
            $table->string('revenuettm');
            $table->string('grossprofitttm');
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
        Schema::dropIfExists('companies');
    }
}
