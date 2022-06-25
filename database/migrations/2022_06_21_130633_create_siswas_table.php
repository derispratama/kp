<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('thn_masuk')->nullable();
            $table->string('nis')->nullable();
            $table->string('nmjalurmasuk')->nullable();
            $table->string('nmjurusan')->nullable();
            $table->string('nmlengkap')->nullable();
            $table->string('nmpanggilan')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nik')->nullable();
            $table->string('jk')->nullable();
            $table->string('statusanak')->nullable();
            $table->tinyInteger('anakke')->nullable();
            $table->tinyInteger('jmlsaudarakandung')->nullable();
            $table->tinyInteger('jmlsaudaratiri')->nullable();
            $table->tinyInteger('jmlsaudaraangkat')->nullable();
            $table->string('templahir')->nullable();
            $table->date('tanggallahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('email')->nullable();
            $table->string('status_siswa')->nullable();
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
        Schema::dropIfExists('siswas');
    }
}
