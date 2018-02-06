<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKolomKtpBpjsOnTablePeserta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peserta', function($table){
            $table->binary('ktp')->after('nomorPeserta');
            $table->binary('bpjs')->after('nomorPeserta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peserta', function ($table) {
            $table->dropColumn('nomorRegistrasi');
        });
    }
}
