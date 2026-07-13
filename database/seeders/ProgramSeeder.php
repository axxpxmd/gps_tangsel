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
            [
                'title' => 'Pasar Bahagia',
                'description' => 'Pasar Bahagia adalah program pasar murah dan gratis yang menyediakan sayuran segar, bahan pokok, dan kebutuhan sehari-hari dengan harga yang sangat terjangkau — bahkan gratis bagi keluarga pra-sejahtera. Pembayaran cukup dengan doa. Program ini bertujuan meringankan beban ekonomi masyarakat sekaligus mendukung petani lokal.',
                'penerima_manfaat' => '300-500 kepala keluarga pra-sejahtera di setiap pelaksanaan, dengan prioritas warga yang terdata di DKM masjid sekitar lokasi kegiatan.',
                'is_active' => true,
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}
