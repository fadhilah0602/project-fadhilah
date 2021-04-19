<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateUndanganPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undangan_pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('undangan_id', 100);
            $table->string('pegawai_id', 100);
            $table->enum('status_konfirmasi', ['Sudah','Belum']);
            $table->datetime('tanggal_konfirmasi')->nullable();
            $table->enum('status_kehadiran', ['Hadir','Tidak','Belum Konfirmasi']);
            $table->datetime('tanggal_kehadiran')->nullable();
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
        Schema::dropIfExists('undangan_pegawais');
    }
}
