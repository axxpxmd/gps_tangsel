<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            // Dewan Pembina
            [
                'name' => 'H. Adi Sunaryo',
                'position' => 'Dewan Pembina',
                'group' => 'pembina',
                'gambar' => null,
                'phone' => null,
                'is_active' => true,
                'is_contact' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'DR(HC) H. Isqowi Indhaddien Masya, MM, CDAI.',
                'position' => 'Dewan Pembina',
                'group' => 'pembina',
                'gambar' => null,
                'phone' => null,
                'is_active' => true,
                'is_contact' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Dewan Pengawas
            [
                'name' => 'Ustadz H. Ali Akbar, M.Si',
                'position' => 'Dewan Pengawas',
                'group' => 'pengawas',
                'gambar' => null,
                'phone' => null,
                'is_active' => true,
                'is_contact' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hamdan, S.Th.',
                'position' => 'Dewan Pengawas',
                'group' => 'pengawas',
                'gambar' => null,
                'phone' => null,
                'is_active' => true,
                'is_contact' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Dewan Pengurus Harian
            [
                'name' => 'Ustadz Moh. Sartono',
                'position' => 'Ketua',
                'group' => 'pengurus_harian',
                'gambar' => null,
                'phone' => '+62 877-9401-0968',
                'is_active' => true,
                'is_contact' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ustadz Ghofur Zein, SE',
                'position' => 'Sekretaris',
                'group' => 'pengurus_harian',
                'gambar' => null,
                'phone' => '+62 819-9971-1810',
                'is_active' => true,
                'is_contact' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Rachmatullah Ruslie',
                'position' => 'Bendahara',
                'group' => 'pengurus_harian',
                'gambar' => null,
                'phone' => null,
                'is_active' => true,
                'is_contact' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($members as $member) {
            DB::table('board_members')->updateOrInsert(
                ['name' => $member['name']],
                $member
            );
        }
    }
}
