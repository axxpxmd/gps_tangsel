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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Judul galeri');
            $table->text('description')->nullable()->comment('Deskripsi galeri');
            $table->string('album')->default('Umum')->comment('Kategori: Safari Subuh, Pasar Bahagia, Puskesmas, Thibbun, GANTENG, Umum');
            $table->date('date')->nullable()->comment('Tanggal kegiatan');
            $table->boolean('is_active')->default(true)->comment('Status tampil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
