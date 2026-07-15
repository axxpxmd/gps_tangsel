<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('partners', 'description')) {
            Schema::table('partners', function (Blueprint $table) {
                $table->renameColumn('description', 'url');
            });
        }
    }

    public function down(): void
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->renameColumn('url', 'description');
        });
    }
};
