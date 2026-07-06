<?php

namespace App\Http\Controllers;

use App\Services\PrayerTimesService;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function __construct(public PrayerTimesService $prayerTimes) {}

    /**
     * Render the landing page with live prayer schedule and activity calendar.
     */
    public function __invoke(Request $request): View
    {
        return view('welcome', [
            'prayerSchedule' => $this->prayerTimes->today(),
            'calendarEvents' => $this->generateCalendarEvents(),
        ]);
    }

    /**
     * Build GPS TangSel activity events for the current + next 2 months.
     *
     * @return array<string, array<int, array{
     *   date: string, day: int, weekday: string, program: string, title: string,
     *   location: string, time: string, description: string, color: string, icon: string
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
                ];
            }
        }

        return $byMonth;
    }
}
