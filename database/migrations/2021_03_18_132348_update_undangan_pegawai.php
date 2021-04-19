<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUndanganPegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('undangan_pegawais', function (Blueprint $table) {
            $table->dropColumn('undangan_id');
            $table->dropColumn('pegawai_id');

        });

        Schema::table('undangan_pegawais', function (Blueprint $table) {
            $table->bigInteger('undangan_id')->unsigned()->nullable();
            $table->bigInteger('pegawai_id')->unsigned()->nullable();
            $table->foreign('undangan_id')->references('id')->on('undangans');
            $table->foreign('pegawai_id')->references('id')->on('pegawais');
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
