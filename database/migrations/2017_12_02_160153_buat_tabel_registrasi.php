<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelRegistrasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_peserta');
            $table->string('email')->unique();
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->integer('jenis_kelamin');
            $table->string('alamat');
            $table->string('nohp');
            $table->string('komunitas');
            $table->string('baju');
            $table->string('penyakit');
            $table->string('nohp_keluarga');
            $table->string('hub_dg_keluarga');
            $table->string('gol_darah');
            $table->string('sosmed_fb');
            $table->string('sosmed_twitter');
            $table->string('sosmed_ig');
            $table->integer('ikutserta');
            $table->string('ikutmks');
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
        Schema::dropIfExists('peserta');
    }
}
