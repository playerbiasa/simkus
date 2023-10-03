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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->string('niy', 20)->unique();
            $table->integer('nidn')->nullable();
            $table->string('nama', 200)->nullable();
            $table->date('tmt')->nullable();
            $table->string('jabatan', 100)->nullable();
            $table->string('jafung', 30)->nullable();
            $table->string('golongan', 4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
