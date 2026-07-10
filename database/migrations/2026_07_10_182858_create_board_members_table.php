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
        Schema::create('board_members', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Nama lengkap pengurus');
            $table->string('position')->comment('Jabatan: Ketua, Sekretaris, Bendahara, Anggota');
            $table->string('group')->comment('Kelompok: pembina, pengawas, pengurus_harian');
            $table->string('gambar')->nullable()->comment('Foto profil (path upload SFTP)');
            $table->string('phone')->nullable()->comment('Nomor telepon / WhatsApp');
            $table->boolean('is_active')->default(true)->comment('Status aktif / ditampilkan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('board_members');
    }
};
