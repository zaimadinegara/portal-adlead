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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul Artikel
            $table->string('slug')->unique(); // URL ramah SEO (misal: judul-artikel)
            $table->longText('content'); // Isi Artikel
            $table->string('image')->nullable(); // Gambar Thumbnail (bisa kosong)
            $table->boolean('is_published')->default(false); // Status tayang
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
