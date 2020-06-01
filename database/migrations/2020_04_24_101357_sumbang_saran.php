<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SumbangSaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sumbang_saran', function (Blueprint $table) {
            $table->id();
            $table->integer('karyawan_id');
            $table->string('judul');
            $table->string('foto');
            $table->longText('kondisi_awal');
            $table->longText('kondisi_akhir');
            $table->longText('manfaat');
            $table->string('periode');
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
        //
    }
}
