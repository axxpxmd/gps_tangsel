<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('programs', 'slug')) {
            Schema::table('programs', function (Blueprint $table) {
                if (config('database.default') !== 'sqlite') {
                    $table->dropUnique('programs_slug_unique');
                }
                $table->dropColumn('slug');
            });
        }
    }

    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->string('slug')->unique()->after('title');
        });
    }
};
