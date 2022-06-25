<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThnpelajarans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thnpelajarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jurusan');
            $table->string('nama_thnpelajaran');
            $table->tinyInteger('status_thnpelajaran');
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
        Schema::dropIfExists('thnpelajarans');
    }
}
