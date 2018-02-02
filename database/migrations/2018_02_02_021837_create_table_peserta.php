<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePeserta extends Migration
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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('tempatLahir');
            $table->string('tanggalLahir');
            $table->string('noHp');
            $table->boolean('jk');
            $table->text('alamat');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('komunitas');
            $table->string('jersey');
            $table->string('tglDatang');
            $table->string('emNama');
            $table->string('emKontak');
            $table->string('golDar');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('peserta');
    }
}
