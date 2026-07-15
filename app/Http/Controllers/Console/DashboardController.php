<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Article;
use App\Models\BoardMember;
use App\Models\Collaboration;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\Partner;
use App\Models\Program;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalPrograms = Program::count();
        $activePrograms = Program::where('is_active', true)->count();

        $totalArticles = Article::count();
        $publishedArticles = Article::where('status', 'publish')->count();
        $draftArticles = Article::where('status', 'draft')->count();

        $totalActivities = Activity::count();
        $upcomingActivities = Activity::where('date', '>=', now())->count();

        $totalGalleries = Gallery::count();
        $totalGalleryImages = GalleryImage::count();

        $totalBoardMembers = BoardMember::count();
        $activeBoardMembers = BoardMember::where('is_active', true)->count();

        $totalPartners = Partner::count();
        $activePartners = Partner::where('is_active', true)->count();

        $totalCollaborations = Collaboration::count();
        $newCollaborations = Collaboration::where('status', Collaboration::STATUS_BARU)->count();
        $followedUpCollaborations = Collaboration::where('status', Collaboration::STATUS_DITINDAKLANJUTI)->count();

        $recentArticles = Article::with('category')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $upcomingActivitiesList = Activity::where('date', '>=', now())
            ->orderBy('date', 'asc')
            ->limit(5)
            ->get();

        $recentCollaborations = Collaboration::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('console.dashboard', compact(
            'totalPrograms',
            'activePrograms',
            'totalArticles',
            'publishedArticles',
            'draftArticles',
            'totalActivities',
            'upcomingActivities',
            'totalGalleries',
            'totalGalleryImages',
            'totalBoardMembers',
            'activeBoardMembers',
            'totalPartners',
            'activePartners',
            'totalCollaborations',
            'newCollaborations',
            'followedUpCollaborations',
            'recentArticles',
            'upcomingActivitiesList',
            'recentCollaborations',
        ));
    }
}
