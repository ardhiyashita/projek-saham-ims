<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEmiten extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emitens', function (Blueprint $table) {            
            $table->string('simbol');
            $table->string('nama');
            $table->string('exchange');
            $table->string('assetType');
            $table->string('ipoDate');
            $table->string('delistingDate');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
