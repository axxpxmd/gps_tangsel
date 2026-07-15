<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('activities', function (Blueprint $table) {
            if (! Schema::hasColumn('activities', 'latitude')) {
                $table->decimal('latitude', 10, 7)->nullable()->after('location');
            }
            if (! Schema::hasColumn('activities', 'longitude')) {
                $table->decimal('longitude', 10, 7)->nullable()->after('latitude');
            }
        });

        if (config('database.default') !== 'sqlite') {
            DB::statement('ALTER TABLE activities MODIFY COLUMN date DATETIME NOT NULL');
        }

        Schema::table('activities', function (Blueprint $table) {
            $columnsToDrop = [];
            foreach (['time', 'program', 'color', 'icon'] as $col) {
                if (Schema::hasColumn('activities', $col)) {
                    $columnsToDrop[] = $col;
                }
            }
            if (! empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }

    public function down(): void
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->string('time')->after('date');
            $table->string('program')->after('description');
            $table->string('color')->default('primary')->after('program');
            $table->string('icon')->default('mosque')->after('color');
        });

        DB::statement('ALTER TABLE activities MODIFY COLUMN date DATE NOT NULL');

        Schema::table('activities', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longitude']);
        });
    }
};
