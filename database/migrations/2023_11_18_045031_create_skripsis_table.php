<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skripsis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->text('judul_skripsi');
            $table->date('tanggal_skripsi');
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->string('ruang', 10)->nullable();
            $table->smallInteger('status')->default(0);
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skripsis');
    }
};
