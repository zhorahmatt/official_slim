<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldNoHpJenisHpOnTablePeserta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('peserta', function($table){
            $table->string('merk_hp')->after('ikutmks');
            $table->string('tipe_hp')->after('ikutmks');
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
            $table->dropColumn('merk_hp');
            $table->dropColumn('tipe_hp');
        });
    }
}
