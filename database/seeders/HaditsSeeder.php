<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HaditsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('hadits')->updateOrInsert(
            ['source' => 'HR. Muslim'],
            [
                'arabic_text' => 'مَنْ صَلَّى الصُّبْحَ فَهُوَ فِي ذِمَّةِ اللَّهِ',
                'translation' => '"Barangsiapa shalat subuh, maka ia berada dalam jaminan Allah."',
                'source' => 'HR. Muslim',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
