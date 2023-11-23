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
        Schema::create('dosen_skripsi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('skripsi_id');
            $table->unsignedBigInteger('dosen_id');
            $table->string('sebagai', 100);
            $table->string('ke', 100);
            $table->timestamps();

            $table->foreign('skripsi_id')->references('id')->on('skripsis');
            $table->foreign('dosen_id')->references('id')->on('dosens');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_skripsi');
    }
};
