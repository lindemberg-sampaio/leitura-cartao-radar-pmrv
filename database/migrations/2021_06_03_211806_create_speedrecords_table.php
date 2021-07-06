<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeedrecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speedrecords', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('downloadfile_id');

            $table->string('radar');
            $table->set('locationtype', ['SP', 'SPA', 'SPI']);
            $table->string('sp', 7);
            $table->string('km', 7);
            $table->string('runwaysense', 5);
            $table->datetime('dateofinfringement');
            $table->integer('allowedspeed');
            $table->integer('measuredspeed');
            $table->integer('photonumber');
            $table->string('policeman', 7);

            $table->timestamps();

            $table->foreign('downloadfile_id')->references('id')->on('downloadfiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('speedrecords');
    }
}
