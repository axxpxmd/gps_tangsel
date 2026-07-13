<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Article;
use App\Models\Hadits;
use App\Models\Partner;
use App\Models\Program;
use App\Services\PrayerTimesService;
use App\Services\YoutubeService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function __construct(public PrayerTimesService $prayerTimes, public YoutubeService $youtube) {}

    public function __invoke(Request $request): View
    {
        return view('welcome', [
            'prayerSchedule' => $this->prayerTimes->today(),
            'calendarEvents' => $this->getCalendarEvents(),
            'articles' => $this->getArticles(),
            'videos' => $this->youtube->latestVideos(12),
            'programs' => Program::where('is_active', true)->latest()->get(),
            'partners' => Partner::where('is_active', true)->latest()->get(),
            'hadits' => Hadits::where('is_active', true)->first(),
            'calendarEvents' => $this->getCalendarEvents(),
        ]);
    }

    protected function getArticles()
    {
        return Article::where('status', 'publish')
            ->latest('published_at')
            ->take(6)
            ->get();
    }

    /**
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
