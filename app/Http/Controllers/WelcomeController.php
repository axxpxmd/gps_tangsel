<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Hadits;
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
            'calendarEvents' => $this->getCalendarEvents(),
            'articles' => $this->generateArticles(),
            'videos' => $this->youtube->latestVideos(12),
            'programs' => Program::where('is_active', true)->latest()->get(),
            'partners' => Partner::where('is_active', true)->latest()->get(),
            'hadits' => Hadits::where('is_active', true)->first(),
            'calendarEvents' => $this->getCalendarEvents(),
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
     * Get calendar events from the database, grouped by month.
     *
     * @return array<string, array<int, array{date: string, day: int, weekday: string, program: string, title: string, location: string, time: string, description: string, color: string, icon: string, image: string|null, latitude: string|null, longitude: string|null}>>
     */
    protected function getCalendarEvents(): array
    {
        $activities = Activity::where('is_active', true)
            ->orderBy('date')
            ->get();

        $byMonth = [];

        foreach ($activities as $activity) {
            $monthKey = $activity->date->format('Y-m');
            $day = $activity->date->day;

            if (! isset($byMonth[$monthKey])) {
                $byMonth[$monthKey] = [];
            }

            $byMonth[$monthKey][] = [
                'date' => $activity->date->format('Y-m-d'),
                'day' => $day,
                'weekday' => $activity->date->translatedFormat('l'),
                'program' => 'Kegiatan',
                'title' => $activity->title,
                'location' => $activity->location,
                'time' => $activity->date->format('H:i').' WIB',
                'description' => $activity->description,
                'color' => 'primary',
                'icon' => 'mosque',
                'image' => $activity->gambar_url ?? asset('poster.webp'),
                'latitude' => $activity->latitude,
                'longitude' => $activity->longitude,
            ];
        }

        return $byMonth;
    }
}
