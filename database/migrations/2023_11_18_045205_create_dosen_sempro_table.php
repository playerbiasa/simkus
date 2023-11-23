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
        Schema::create('dosen_sempro', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sempro_id');
            $table->unsignedBigInteger('dosen_id');
            $table->string('sebagai', 100);
            $table->string('ke', 100);
            $table->timestamps();

            $table->foreign('sempro_id')->references('id')->on('sempros');
            $table->foreign('dosen_id')->references('id')->on('dosens');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_sempro');
    }
};
