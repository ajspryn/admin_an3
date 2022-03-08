<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyediaLayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyedia_layanans', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('nama_penyedia');
            $table->string('alamat_1');
            $table->string('alamat_2');
            $table->string('alamat_3');
            $table->string('alamat_4');
            $table->string('alamat_kodepos');
            $table->string('nama_kontak');
            $table->string('alamat_email');
            $table->string('no_hp')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('kegiatan_usaha');
            $table->string('alamat_web')->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('penyedia_layanans');
    }
}
