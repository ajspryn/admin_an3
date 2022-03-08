<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmpanBaliksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umpan_baliks', function (Blueprint $table) {
            $table->id();
            $table->string('penyedia_layanan_id');
            $table->string('layanan_id');
            $table->string('pengguna_id');
            $table->string('rating');
            $table->string('masukan')->nullable();
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
        Schema::dropIfExists('umpan_baliks');
    }
}
