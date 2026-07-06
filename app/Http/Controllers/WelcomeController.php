<?php

namespace App\Http\Controllers;

use App\Services\PrayerTimesService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function __construct(public PrayerTimesService $prayerTimes) {}

    /**
     * Render the landing page with live prayer schedule data.
     */
    public function __invoke(Request $request): View
    {
        return view('welcome', [
            'prayerSchedule' => $this->prayerTimes->today(),
        ]);
    }
}
