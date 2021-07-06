<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignkeysTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('graduation_id')->after('name');
            $table->unsignedBigInteger('opm_id')->after('activeservice');

            $table->foreign('graduation_id')->references('id')->on('graduations');
            $table->foreign('opm_id')->references('id')->on('opms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('graduation_id');
            $table->dropColumn('opm_id');
        });
    }
}
