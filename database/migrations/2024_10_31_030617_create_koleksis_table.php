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
        Schema::create('koleksis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_koleksi');                     // Nama koleksi
            $table->text('deskripsi')->nullable();              // Deskripsi koleksi
            $table->date('tanggal_ditambahkan');                // Tanggal penambahan ke museum
            $table->string('asal', 255)->nullable();            // Asal koleksi
            $table->string('kondisi')->default('baik');         // Kondisi koleksi, contoh: baik, rusak

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koleksis');
    }
};
