<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class ChangeColumnJenisKelamin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pegawais', function (Blueprint $table) {
            $table->dropColumn('jenis_kelamin');
            
        });
        Schema::table('pegawais', function (Blueprint $table) {
            //$table->enum('jenis_kelamin', ['male', 'female']);
            $table->enum('jenis_kelamin', ['male', 'female'])->after('tanggal_lahir');
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
