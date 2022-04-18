<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSekolah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('jenjang_id', 20);
            $table->string('status', 20);
            $table->string('kecamatan_id', 100);
            $table->string('alamat', 255);
            $table->string('posisi', 255);
            $table->string('notes', 255);
            $table->string('foto', 255);
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
        Schema::dropIfExists('tbl_sekolah');
    }
}
