<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('console.dashboard');
    }
}
