<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaLayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengguna_layanans', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('nama_pengguna');
            $table->string('alamat_1');
            $table->string('alamat_2');
            $table->string('alamat_3');
            $table->string('alamat_4');
            $table->string('alamat_kodepos');
            $table->string('alamat_email');
            $table->string('no_telp');
            $table->string('nomor_identitas');
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
        Schema::dropIfExists('pengguna_layanans');
    }
}
