<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jurusans', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique(); // <-- tambahkan kolom kode
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['aktif', 'tidak aktif'])->default('aktif');
            $table->timestamps(); // otomatis created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jurusans');
    }
};
