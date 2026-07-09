<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Program;
use App\Services\PrayerTimesService;
use App\Services\YoutubeService;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function __construct(public PrayerTimesService $prayerTimes, public YoutubeService $youtube) {}

    /**
     * Render the landing page with live prayer schedule and activity calendar.
     */
    public function __invoke(Request $request): View
    {
        return view('welcome', [
            'prayerSchedule' => $this->prayerTimes->today(),
            'calendarEvents' => $this->generateCalendarEvents(),
            'articles' => $this->generateArticles(),
            'videos' => $this->youtube->latestVideos(12),
            'programs' => Program::where('is_active', true)->latest()->get(),
            'partners' => Partner::where('is_active', true)->latest()->get(),
        ]);
    }

    /**
     * Build dummy articles for the news section.
     *
     * @return array<int, array{
     *   id: int, title: string, category: string, excerpt: string,
     *   image: string, date: string, author: string, read_time: int
     * }>
     */
    protected function generateArticles(): array
    {
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
        ];

        $base = CarbonImmutable::now()->startOfDay();

        return collect($rows)->map(function (array $row, int $idx) use ($base) {
            $date = $base->subDays($row['days_ago']);
            $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $row['title']));

            return [
                'id' => $idx + 1,
                'title' => $row['title'],
                'category' => $row['category'],
                'excerpt' => $row['excerpt'],
                'image' => '/berita/gambar1.webp',
                'date' => $date->format('d M Y'),
                'author' => $row['author'],
                'read_time' => $row['read_time'],
            ];
        })->values()->all();
    }

    /**
     * Build GPS TangSel activity events for the current + next 2 months.
     *
     * @return array<string, array<int, array{
     *   date: string, day: int, weekday: string, program: string, title: string,
     *   location: string, time: string, description: string, color: string, icon: string,
     *   image: string
     * }>>
     */
    protected function generateCalendarEvents(): array
    {
        $masjids = [
            ['Masjid Al-Hidayah', 'Ciputat'],
            ['Masjid Nurul Huda', 'Pamulang'],
            ['Masjid Al-Muttaqin', 'Pondok Aren'],
            ['Masjid Darussalam', 'Ciputat Timur'],
            ['Masjid Al-Ikhlas', 'BSD'],
            ['Masjid Baiturrahman', 'Pamulang Barat'],
            ['Masjid Al-Falah', 'Serpong Utara'],
            ['Masjid Istiqamah', 'Setu'],
        ];

        $byMonth = [];
        $base = CarbonImmutable::now()->startOfMonth();

        for ($m = 0; $m < 3; $m++) {
            $monthStart = $base->addMonths($m);
            $monthKey = $monthStart->format('Y-m');
            $byMonth[$monthKey] = [];

            $saturdays = [];
            $sundays = [];
            for ($i = 0; $i < $monthStart->daysInMonth; $i++) {
                $cursor = $monthStart->addDays($i);
                if ($cursor->isSaturday()) {
                    $saturdays[] = $cursor;
                }
                if ($cursor->isSunday()) {
                    $sundays[] = $cursor;
                }
            }

            // S4 — Safari Sholat Subuh every Saturday
            foreach ($saturdays as $idx => $date) {
                [$name, $area] = $masjids[$idx % count($masjids)];
                $byMonth[$monthKey][] = [
                    'date' => $date->format('Y-m-d'),
                    'day' => $date->day,
                    'weekday' => 'Sabtu',
                    'program' => 'S4',
                    'title' => 'Safari Sholat Subuh (S4)',
                    'location' => $name.', '.$area,
                    'time' => '04:45 WIB',
                    'description' => 'Safari pekanan berpindah masjid setiap Sabtu. Shalat subuh berjamaah dilanjutkan tausiyah singkat dan sarapan bersama warga.',
                    'color' => 'gold',
                    'icon' => 'mosque',
                    'image' => asset('poster.webp'),
                ];
            }

            // Pasar Bahagia — 2nd Sunday
            if (isset($sundays[1])) {
                $byMonth[$monthKey][] = [
                    'date' => $sundays[1]->format('Y-m-d'),
                    'day' => $sundays[1]->day,
                    'weekday' => 'Minggu',
                    'program' => 'Pasar Bahagia',
                    'title' => 'Pasar Bahagia',
                    'location' => 'Halaman Masjid Al-Hidayah, Ciputat',
                    'time' => '07:00 - 09:00 WIB',
                    'description' => 'Distribusi sayuran gratis untuk masyarakat. Pembayaran cukup dengan doa — karena kebahagiaan itu berbagi.',
                    'color' => 'emerald',
                    'icon' => 'cart',
                    'image' => asset('poster.webp'),
                ];
            }

            // Puskesmas Cerdas Ceria — 3rd Sunday
            if (isset($sundays[2])) {
                $byMonth[$monthKey][] = [
                    'date' => $sundays[2]->format('Y-m-d'),
                    'day' => $sundays[2]->day,
                    'weekday' => 'Minggu',
                    'program' => 'Puskesmas',
                    'title' => 'Puskesmas Cerdas Ceria',
                    'location' => 'Masjid Nurul Huda, Pamulang',
                    'time' => '08:00 - 11:00 WIB',
                    'description' => 'Pelayanan cek kesehatan gratis bekerja sama dengan Dinkes TangSel. Cek tekanan darah, gula darah, dan konsultasi gizi.',
                    'color' => 'primary',
                    'icon' => 'heart',
                    'image' => asset('poster.webp'),
                ];
            }

            // Thibbun Nabawi — 4th Sunday
            if (isset($sundays[3])) {
                $byMonth[$monthKey][] = [
                    'date' => $sundays[3]->format('Y-m-d'),
                    'day' => $sundays[3]->day,
                    'weekday' => 'Minggu',
                    'program' => 'Thibbun',
                    'title' => 'Thibbun Nabawi',
                    'location' => 'Masjid Al-Muttaqin, Pondok Aren',
                    'time' => '09:00 - 12:00 WIB',
                    'description' => 'Layanan pengobatan ala Nabi oleh praktisi bersertifikat. Bekam, ruqyah, dan konsultasi kesehatan. Infaq seikhlasnya.',
                    'color' => 'amber',
                    'icon' => 'flask',
                    'image' => asset('poster.webp'),
                ];
            }
        }

        return $byMonth;
    }
}
