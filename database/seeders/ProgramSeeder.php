<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'title' => 'S4 (SEMANGAT SAFARI SHOLAT SUBUH)',
                'description' => 'Gerakan rutin setiap Sabtu pagi berkeliling memakmurkan masjid di 7 Kecamatan dan 54 Kelurahan di seantero Kota Tangerang Selatan.',
                'penerima_manfaat' => 'Seluruh warga Muslim dan jamaah di wilayah Tangerang Selatan, serta menghidupkan syiar masjid lokal.',
                'is_active' => true,
            ],
            [
                'title' => 'PASAR BAHAGIA',
                'description' => 'Program berbagi sayuran dan bahan pangan segar gratis dengan konsep "Beli gratis, bayar cukup dengan doa".',
                'penerima_manfaat' => 'Ibu-ibu rumah tangga, jamaah Subuh, dan keluarga prasejahtera yang membutuhkan bantuan pangan.',
                'is_active' => true,
            ],
            [
                'title' => 'PUSKESMAS CERDAS CERIA',
                'description' => 'Pelayanan pemeriksaan kesehatan gratis untuk jamaah yang bekerja sama dengan Dinkes Tangsel.',
                'penerima_manfaat' => 'Jamaah lansia dan masyarakat umum yang membutuhkan kontrol kesehatan dasar secara gratis.',
                'is_active' => true,
            ],
            [
                'title' => 'THIBBUN NABAWI',
                'description' => 'Bakti sosial pengobatan sesuai sunnah (bekam) oleh tenaga yang profesional dan bersertifikat, serta ditutup dengan infaq seikhlasnya.',
                'penerima_manfaat' => 'Jamaah dan warga yang membutuhkan terapi kesehatan alternatif yang aman, terpercaya, dan sesuai sunnah.',
                'is_active' => true,
            ],
            [
                'title' => 'PROGRAM GANTENG (GERAKAN ANAK TANGSEL TAMPIL ELEGAN)',
                'description' => 'Layanan cukur rambut gratis pasca safari agar pemuda tampil rapi dan bersih di masjid.',
                'penerima_manfaat' => 'Generasi muda, remaja masjid, dan anak-anak agar lebih termotivasi datang ke masjid dengan ceria dan rapi.',
                'is_active' => true,
            ],
        ];

        foreach ($programs as $program) {
            Program::firstOrCreate(['title' => $program['title']], $program);
        }
    }
}
