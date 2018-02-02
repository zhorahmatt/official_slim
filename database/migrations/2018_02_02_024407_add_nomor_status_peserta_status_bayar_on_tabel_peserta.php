<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNomorStatusPesertaStatusBayarOnTabelPeserta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peserta', function($table){
            $table->string('nomorPeserta')->after('golDar');
            $table->string('statusPeserta')->after('golDar');
            $table->string('statusBayar')->after('golDar');
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
            $table->dropColumn('nomorPeserta');
            $table->dropColumn('statusPeserta');
            $table->dropColumn('statusBayar');
        });
    }
}
