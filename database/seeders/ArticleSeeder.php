<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Carbon\CarbonImmutable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Safari Subuh' => Category::firstOrCreate(['slug' => 'safari-subuh'], ['name' => 'Safari Subuh']),
            'Sosial' => Category::firstOrCreate(['slug' => 'sosial'], ['name' => 'Sosial']),
            'Kesehatan' => Category::firstOrCreate(['slug' => 'kesehatan'], ['name' => 'Kesehatan']),
            'Pengumuman' => Category::firstOrCreate(['slug' => 'pengumuman'], ['name' => 'Pengumuman']),
            'Dakwah' => Category::firstOrCreate(['slug' => 'dakwah'], ['name' => 'Dakwah']),
            'Agenda Kegiatan' => Category::firstOrCreate(['slug' => 'agenda-kegiatan'], ['name' => 'Agenda Kegiatan']),
        ];

        $base = CarbonImmutable::now()->startOfDay();

        $rows = [
            [
                'title' => 'Safari Subuh Sukses Makmurkan Masjid Al-Hidayah Ciputat',
                'category' => 'Safari Subuh',
                'excerpt' => 'Lebih dari 200 jamaah memadati Masjid Al-Hidayah dalam Safari Sholat Subuh pekan ini. Acara ditutup dengan tausiyah dan sarapan bersama warga.',
                'author' => 'Tim Komunikasi GPS',
                'read_time' => 3,
                'days_ago' => 2,
            ],
            [
                'title' => 'Pasar Bahagia: 300 Kepala Keluarga Terima Sayuran Gratis',
                'category' => 'Sosial',
                'excerpt' => 'Program Pasar Bahagia kembali digelar dengan membagikan paket sayuran gratis kepada 300 KK. Pembayaran cukup dengan doa — kebahagiaan itu berbagi.',
                'author' => 'Rina Marlina',
                'read_time' => 4,
                'days_ago' => 5,
            ],
            [
                'title' => 'Puskesmas Cerdas Ceria Layani 150 Warga Gratis',
                'category' => 'Kesehatan',
                'excerpt' => 'Bekerja sama dengan Dinkes TangSel, GPS mengadakan cek tekanan darah, gula darah, dan konsultasi gizi gratis bagi warga Pamulang.',
                'author' => 'dr. Ahmad Fauzi',
                'read_time' => 5,
                'days_ago' => 9,
            ],
            [
                'title' => 'Thibbun Nabawi: Bekam dan Ruqyah untuk Masyarakat',
                'category' => 'Kesehatan',
                'excerpt' => 'Layanan pengobatan ala Nabi oleh praktisi bersertifikat digelar di Masjid Al-Muttaqin. Infaq seikhlasnya menjadi bagian dari bakti sosial ini.',
                'author' => 'Ust. Hendra Gunawan',
                'read_time' => 4,
                'days_ago' => 14,
            ],
            [
                'title' => 'GPS TangSel Resmi Berbadan Hukum, SK AHU Terbit',
                'category' => 'Pengumuman',
                'excerpt' => 'Gerakan Pejuang Subuh Tangerang Selatan kini resmi berbadan hukum dengan SK AHU 2024. Langkah baru untuk gerakan yang lebih terstruktur dan akuntabel.',
                'author' => 'Sekretariat GPS',
                'read_time' => 2,
                'days_ago' => 20,
            ],
            [
                'title' => 'Ajukan Masjid Anda untuk Safari Subuh Berikutnya',
                'category' => 'Pengumuman',
                'excerpt' => 'Pendaftaran masjid tujuan Safari Sholat Subuh (S4) dibuka. Ajukan masjid Anda dan jadilah bagian dari gerakan memakmurkan rumah Allah di waktu subuh.',
                'author' => 'Tim Lapangan GPS',
                'read_time' => 3,
                'days_ago' => 26,
            ],
            [
                'title' => 'Kajian Fajar: Membangun Keluarga Sakinah di Era Digital',
                'category' => 'Dakwah',
                'excerpt' => 'Ustadz Dr. Ahmad Syafii mengisi kajian fajar di Masjid Al-Ikhlas BSD tentang tantangan membangun keluarga sakinah di era digital dan solusinya menurut Al-Quran.',
                'author' => 'Tim Dakwah GPS',
                'read_time' => 6,
                'days_ago' => 30,
            ],
            [
                'title' => 'Safari Subuh Jelang Ramadhan: 500 Jamaah Padati Masjid Baiturrahman',
                'category' => 'Safari Subuh',
                'excerpt' => 'Menyambut bulan suci Ramadhan, GPS TangSel menggelar Safari Subuh akbar yang dihadiri lebih dari 500 jamaah di Masjid Baiturrahman Pamulang Barat.',
                'author' => 'Tim Komunikasi GPS',
                'read_time' => 4,
                'days_ago' => 40,
            ],
            [
                'title' => 'GPS TangSel Buka Pendaftaran Relawan Angkatan ke-5',
                'category' => 'Agenda Kegiatan',
                'excerpt' => 'Pendaftaran relawan GPS TangSel angkatan ke-5 resmi dibuka. Terbuka untuk seluruh warga Tangerang Selatan yang ingin berkontribusi dalam gerakan Pejuang Subuh.',
                'author' => 'Divisi SDM GPS',
                'read_time' => 3,
                'days_ago' => 50,
            ],
        ];

        $imagePaths = [
            '/berita/gambar1.webp',
            '/berita/gambar2.webp',
            '/berita/gambar3.webp',
        ];

        foreach ($rows as $row) {
            $date = $base->subDays($row['days_ago']);

            $article = Article::create([
                'title' => $row['title'],
                'slug' => Str::slug($row['title']),
                'excerpt' => $row['excerpt'],
                'content' => '<p>'.$row['excerpt'].'</p><p>Kegiatan ini merupakan bagian dari program rutin GPS TangSel dalam rangka memakmurkan masjid dan memperkuat ukhuwah islamiyah di Tangerang Selatan. Seluruh kegiatan terbuka untuk umum dan tidak dipungut biaya.</p><p>Bagi masyarakat yang ingin berpartisipasi atau membutuhkan informasi lebih lanjut, dapat menghubungi sekretariat GPS TangSel melalui kanal resmi yang tersedia.</p>',
                'image' => '/berita/gambar1.webp',
                'author' => $row['author'],
                'read_time' => $row['read_time'],
                'published_at' => $date,
            ]);

            $article->categories()->attach($categories[$row['category']]);

            foreach ($imagePaths as $i => $path) {
                $article->images()->create([
                    'image' => $path,
                    'sort_order' => $i + 1,
                ]);
            }
        }
    }
}
