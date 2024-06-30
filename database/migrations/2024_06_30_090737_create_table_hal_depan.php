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
        Schema::create('halaman_depan', function (Blueprint $table) {
            $table->id();
            $table->string('foto_home');
            $table->string('foto_profile');
            $table->string('greetings');
            $table->string('nama_depan');
            $table->string('keahlian');
            $table->string('deskripsi_keahlian');
            $table->string('asal');
            $table->string('tinggal');
            $table->string('umur');
            $table->string('cv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('halaman_depan');
    }
};
