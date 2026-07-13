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
            [
                'title' => 'Sahabat Subuh (S2)',
                'description' => 'Sahabat Subuh adalah program sosial kemanusiaan yang memberikan bantuan sembako, santunan, dan dukungan kepada masyarakat pra-sejahtera. Program ini hadir sebagai wujud kepedulian GPS TangSel terhadap sesama, khususnya di wilayah Tangerang Selatan. Melalui donasi rutin dari para pejuang subuh, bantuan disalurkan tepat sasaran kepada keluarga yang membutuhkan.',
                'penerima_manfaat' => 'Keluarga pra-sejahtera, janda, anak yatim, dan dhuafa di wilayah Tangerang Selatan yang terdata melalui koordinasi dengan DKM masjid setempat.',
                'is_active' => true,
            ],
            [
                'title' => 'Sahabat Sehat (S2-S)',
                'description' => 'Sahabat Sehat adalah program layanan kesehatan gratis yang meliputi pemeriksaan tekanan darah, gula darah, asam urat, konsultasi gizi, dan pengobatan ringan. Bekerja sama dengan Puskesmas dan Dinas Kesehatan Kota Tangerang Selatan, program ini rutin digelar di masjid-masjid sebagai bentuk pelayanan kesehatan berbasis komunitas.',
                'penerima_manfaat' => 'Masyarakat umum di sekitar lokasi kegiatan, terutama lansia dan warga yang kesulitan mengakses layanan kesehatan. Setiap kegiatan rata-rata melayani 100-150 warga.',
                'is_active' => true,
            ],
            [
                'title' => 'Sedekah Jumat Berkah (SJB)',
                'description' => 'Sedekah Jumat Berkah adalah program berbagi makanan siap saji yang dibagikan setiap hari Jumat setelah shalat Jumat di masjid-masjid wilayah Tangerang Selatan. Program ini mengajak masyarakat untuk menyisihkan sebagian rezeki di hari yang penuh berkah untuk berbagi kebahagiaan dengan sesama.',
                'penerima_manfaat' => 'Jamaah masjid, masyarakat sekitar, dan pengguna jalan yang melintas. Setiap Jumat dibagikan 150-300 paket makanan siap saji.',
                'is_active' => true,
            ],
        ];

        foreach ($programs as $program) {
            Program::firstOrCreate(['title' => $program['title']], $program);
        }
    }
}
