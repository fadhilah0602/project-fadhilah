<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUndanganBagian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('undangan_pegawais', function (Blueprint $table) {
        //     $table->dropColumn('undangan_id');
        //     $table->dropColumn('pegawai_id');

        // });

        Schema::table('undangan_bagians', function (Blueprint $table) {
            $table->bigInteger('undangan_id')->unsigned()->nullable();
            $table->bigInteger('bagian_id')->unsigned()->nullable();
            $table->foreign('undangan_id')->references('id')->on('undangans');
            $table->foreign('bagian_id')->references('id')->on('bagians');
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
