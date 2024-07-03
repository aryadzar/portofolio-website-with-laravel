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
        Schema::create('konten_portofolio', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_jenis")->constrained("portofolio_kategori");
            $table->string("image");
            $table->string("judul");
            $table->string("deskripsi");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konten_portofolio');
    }
};
