<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hadits', function (Blueprint $table) {
            $table->id();
            $table->text('arabic_text')->comment('Teks Arab hadits');
            $table->text('translation')->comment('Terjemahan / arti hadits');
            $table->string('source')->comment('Sumber hadits, contoh: HR. Muslim');
            $table->boolean('is_active')->default(false)->comment('Hanya 1 data yang aktif untuk ditampilkan di front-end');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hadits');
    }
};
