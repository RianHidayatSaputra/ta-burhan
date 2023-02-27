<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggapan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengaduan')->nullable();
            $table->dateTime('tgl_tanggapan');
            $table->foreignId('petugas')->nullable();
            $table->text('tanggapan');
            $table->timestamps();
            $table->foreign('pengaduan')->references('id')->on('pengaduan');
            $table->foreign('petugas')->references('id')->on('petugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanggapan');
    }
};
