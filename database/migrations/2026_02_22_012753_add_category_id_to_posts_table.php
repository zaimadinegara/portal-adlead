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
        Schema::table('posts', function (Blueprint $table) {
            // Menambahkan kolom category_id sebagai foreign key
            // nullable() digunakan agar artikel lama yang sudah kamu buat tetap aman
            $table->foreignId('category_id')
                  ->after('id') // Meletakkan kolom setelah ID agar rapi di database
                  ->nullable() 
                  ->constrained() 
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Menghapus hubungan (constraint) dan kolom jika migrasi dibatalkan
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};