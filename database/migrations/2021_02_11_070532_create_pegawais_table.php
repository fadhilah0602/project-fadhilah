<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('nip', 100)->unique();
            $table->string('jabatan', 100);
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['male', 'female']);
            $table->string('nohp', 100);
            $table->string('email', 100)->unique();
            $table->text('alamat')->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('pegawais');
    }
}
