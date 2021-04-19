<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undangans', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 100);
            $table->string('lokasi', 100);
            $table->date('tanggal_mulai', 100);
            $table->date('tanggal_akhir', 100);
            $table->enum('jenis', ['pegawai', 'bagian']);
            $table->text('keterangan')->nullable();
            $table->string('file_undangan')->nullable();
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
        Schema::dropIfExists('undangans');
    }
}
