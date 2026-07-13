<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\ArticleOld;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class ArticleOldController extends Controller
{
    public function index(): View
    {
        $articles = ArticleOld::latest('wp_created_at')->get();

        return view('console.article-old.index', compact('articles'));
    }

    public function show(ArticleOld $articleOld): View
    {
        return view('console.article-old.show', compact('articleOld'));
    }

    public function fetch(): RedirectResponse
    {
        $baseUrl = 'https://public-api.wordpress.com/wp/v2/sites/gpstangsel.wordpress.com/posts';
        $page = 1;
        $perPage = 20;
        $totalMigrated = 0;

        while (true) {
            $response = Http::withoutVerifying()->get($baseUrl, [
                'page' => $page,
                'per_page' => $perPage,
            ]);

            if ($response->failed()) {
                break;
            }

            $posts = $response->json();

            if (empty($posts)) {
                break;
            }

            foreach ($posts as $wpPost) {
                if (ArticleOld::where('slug', $wpPost['slug'])->exists()) {
                    continue;
                }

                ArticleOld::create([
                    'title' => html_entity_decode($wpPost['title']['rendered'], ENT_QUOTES | ENT_HTML5, 'UTF-8'),
                    'slug' => $wpPost['slug'],
                    'content' => $wpPost['content']['rendered'],
                    'excerpt' => $wpPost['excerpt']['rendered'] ?? null,
                    'status' => $wpPost['status'],
                    'wp_created_at' => $wpPost['date'],
                    'wp_modified_at' => $wpPost['modified'],
                ]);

                $totalMigrated++;
            }

            $page++;

            sleep(1);
        }

        return redirect()->route('console.article-old.index')
            ->with('success', "Berhasil! {$totalMigrated} artikel baru berhasil ditarik dari WordPress.");
    }
}
