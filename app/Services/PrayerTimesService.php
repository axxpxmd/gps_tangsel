<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use RuntimeException;

class PrayerTimesService
{
    /**
     * Indonesian Hijri month names indexed by Aladhan month number (1-12).
     */
    protected const HIJRI_MONTHS_ID = [
        1 => 'Muharram',
        2 => 'Safar',
        3 => 'Rabiul Awal',
        4 => 'Rabiul Akhir',
        5 => 'Jumadil Awal',
        6 => 'Jumadil Akhir',
        7 => 'Rajab',
        8 => 'Syaban',
        9 => 'Ramadan',
        10 => 'Syawal',
        11 => 'Zulkaidah',
        12 => 'Zulhijjah',
    ];

    /**
     * Fallback prayer times (representative for Tangerang Selatan) used when
     * the upstream API or cache is unavailable.
     */
    protected const FALLBACK_TIMINGS = [
        'subuh' => '04:45',
        'dzuhur' => '11:58',
        'ashar' => '15:23',
        'maghrib' => '18:02',
        'isya' => '19:14',
    ];

    /**
     * Prayer keys in chronological order with their Aladhan API field name.
     */
    protected const PRAYER_MAP = [
        'subuh' => 'Fajr',
        'dzuhur' => 'Dhuhr',
        'ashar' => 'Asr',
        'maghrib' => 'Maghrib',
        'isya' => 'Isha',
    ];

    protected array $config;

    public function __construct()
    {
        $this->config = config('services.aladhan');
    }

    /**
     * Fetch today's prayer schedule for the configured location.
     *
     * @return array{
     *   location: string,
     *   gregorian_date: string,
     *   hijri_date: string,
     *   source: string,
     *   prayers: array<int, array{key: string, name: string, time: string}>
     * }
     */
    public function today(): array
    {
        $today = now()->format('Y-m-d');
        $cacheKey = "aladhan:timings:{$today}:{$this->config['latitude']},{$this->config['longitude']}:{$this->config['method']}";

        return Cache::remember($cacheKey, now()->addHours(6), function (): array {
            return $this->fetchFromApi();
        });
    }

    /**
     * Call the Aladhan API and shape the response; falls back to defaults on failure.
     */
    protected function fetchFromApi(): array
    {
        try {
            $request = Http::timeout($this->config['timeout']);

            // Skip SSL verification in local dev to work around misconfigured cacert.pem
            if (app()->environment('local') && ($this->config['verify_ssl'] ?? true) === false) {
                $request = $request->withOptions(['verify' => false]);
            }

            $response = $request->get("{$this->config['base_url']}/timings", [
                'latitude' => $this->config['latitude'],
                'longitude' => $this->config['longitude'],
                'method' => $this->config['method'],
            ]);

            if (! $response->successful()) {
                throw new RuntimeException("Aladhan API returned status {$response->status()}");
            }

            $data = $response->json('data');

            if (! is_array($data) || ! isset($data['timings'])) {
                throw new RuntimeException('Aladhan API returned malformed payload');
            }

            return $this->shape($data, 'api');
        } catch (\Exception $e) {
            Log::warning('PrayerTimesService: '.$e->getMessage());

            return $this->shape($this->fallbackPayload(), 'fallback');
        }
    }

    /**
     * Build a payload using the hardcoded fallback timings.
     */
    protected function fallbackPayload(): array
    {
        $now = now();

        return [
            'timings' => [
                'Fajr' => self::FALLBACK_TIMINGS['subuh'].':00',
                'Dhuhr' => self::FALLBACK_TIMINGS['dzuhur'].':00',
                'Asr' => self::FALLBACK_TIMINGS['ashar'].':00',
                'Maghrib' => self::FALLBACK_TIMINGS['maghrib'].':00',
                'Isha' => self::FALLBACK_TIMINGS['isya'].':00',
            ],
            'date' => [
                'readable' => $now->format('d M Y'),
                'gregorian' => [
                    'date' => $now->format('d-m-Y'),
                    'weekday' => ['en' => $now->englishDayOfWeek],
                    'month' => ['number' => (int) $now->format('n')],
                    'year' => $now->format('Y'),
                ],
                'hijri' => [
                    'day' => '',
                    'month' => ['number' => 0, 'en' => ''],
                    'year' => '',
                ],
            ],
        ];
    }

    /**
     * Normalize the Aladhan payload into the shape consumed by the view.
     *
     * @return array{
     *   location: string,
     *   gregorian_date: string,
     *   hijri_date: string,
     *   source: string,
     *   prayers: array<int, array{key: string, name: string, time: string}>
     * }
     */
    protected function shape(array $data, string $source): array
    {
        $timings = $data['timings'];
        $prayers = [];

        foreach (self::PRAYER_MAP as $key => $field) {
            $prayers[] = [
                'key' => $key,
                'name' => ucfirst($key),
                'time' => $this->normalizeTime($timings[$field] ?? '00:00'),
            ];
        }

        $gregorian = $data['date']['gregorian'] ?? null;
        $hijri = $data['date']['hijri'] ?? null;

        return [
            'location' => (string) $this->config['city'],
            'gregorian_date' => $this->formatGregorian($gregorian),
            'hijri_date' => $this->formatHijri($hijri),
            'source' => $source,
            'prayers' => $prayers,
        ];
    }

    /**
     * Strip seconds and validate the HH:MM format returned by Aladhan.
     */
    protected function normalizeTime(string $time): string
    {
        $time = trim($time);

        if (preg_match('/^(\d{2}:\d{2})/', $time, $m)) {
            return $m[1];
        }

        return '00:00';
    }

    /**
     * Format the Gregorian date in Indonesian, e.g. "Senin, 6 Juli 2026".
     */
    protected function formatGregorian(?array $gregorian): string
    {
        $days = ['Sunday' => 'Ahad', 'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu'];
        $months = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        if ($gregorian && isset($gregorian['weekday']['en'], $gregorian['day'], $gregorian['month']['number'], $gregorian['year'])) {
            $day = $days[$gregorian['weekday']['en']] ?? $gregorian['weekday']['en'];
            $month = $months[$gregorian['month']['number']] ?? '';

            return "{$day}, {$gregorian['day']} {$month} {$gregorian['year']}";
        }

        return now()->translatedFormat('l, j F Y');
    }

    /**
     * Format the Hijri date in Indonesian, e.g. "21 Muharram 1448 H".
     */
    protected function formatHijri(?array $hijri): string
    {
        if ($hijri && ! empty($hijri['day']) && ! empty($hijri['year'])) {
            $monthName = self::HIJRI_MONTHS_ID[$hijri['month']['number']] ?? $hijri['month']['en'] ?? '';

            if ($monthName) {
                return "{$hijri['day']} {$monthName} {$hijri['year']} H";
            }
        }

        return '';
    }
}
