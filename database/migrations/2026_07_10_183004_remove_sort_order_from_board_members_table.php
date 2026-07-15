<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('board_members', 'sort_order')) {
            Schema::table('board_members', function (Blueprint $table) {
                $table->dropColumn('sort_order');
            });
        }
    }

    public function down(): void
    {
        Schema::table('board_members', function (Blueprint $table) {
            $table->unsignedTinyInteger('sort_order')->default(0)->after('phone');
        });
    }
};
