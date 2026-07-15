<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('programs', 'subtitle')) {
            Schema::table('programs', function (Blueprint $table) {
                $table->dropColumn('subtitle');
            });
        }
    }

    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->string('subtitle')->nullable()->after('title');
        });
    }
};
