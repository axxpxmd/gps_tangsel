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
                if (ArticleOld::where('wp_id', $wpPost['id'])->exists()) {
                    continue;
                }

                $authorName = null;

                if (! empty($wpPost['author'])) {
                    $authorResponse = Http::withoutVerifying()->get("https://public-api.wordpress.com/wp/v2/sites/gpstangsel.wordpress.com/users/{$wpPost['author']}");

                    if ($authorResponse->successful()) {
                        $authorName = $authorResponse->json('name');
                    }
                }

                ArticleOld::create([
                    'wp_id' => $wpPost['id'],
                    'title' => html_entity_decode($wpPost['title']['rendered'], ENT_QUOTES | ENT_HTML5, 'UTF-8'),
                    'slug' => $wpPost['slug'],
                    'content' => $wpPost['content']['rendered'],
                    'excerpt' => $wpPost['excerpt']['rendered'] ?? null,
                    'featured_image_url' => $wpPost['jetpack_featured_media_url'] ?: null,
                    'wp_author_id' => $wpPost['author'],
                    'author_name' => $authorName,
                    'link' => $wpPost['link'],
                    'status' => $wpPost['status'],
                    'format' => $wpPost['format'],
                    'categories' => $wpPost['categories'] ?? [],
                    'tags' => $wpPost['tags'] ?? [],
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
