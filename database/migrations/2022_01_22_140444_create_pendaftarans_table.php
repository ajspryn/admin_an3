<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('penyedia_layanan_id');
            $table->string('layanan_id');
            $table->date('tanggal_layanan');
            $table->string('pengguna_id');
            $table->string('nama_pengguna');
            $table->string('nomor_identitas');
            $table->string('no_telp');
            $table->string('keterangan_pendaftaran')->nullable();
            $table->string('status_transaksi');
            $table->string('keterangan_tambahan_status');
            $table->string('no_antrian');
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
        Schema::dropIfExists('pendaftarans');
    }
}
