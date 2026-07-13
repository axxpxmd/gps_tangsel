<?php

namespace App\Console\Commands;

use App\Models\ArticleOld;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

#[Signature('wp:migrate-posts')]
#[Description('Migrasi data artikel dari WordPress REST API ke tabel article_old')]
class MigrateWordPressPosts extends Command
{
    protected string $baseUrl = 'https://public-api.wordpress.com/wp/v2/sites/gpstangsel.wordpress.com/posts';

    protected int $perPage = 20;

    public function handle(): int
    {
        $page = 1;
        $totalMigrated = 0;

        $this->info('Memulai migrasi artikel dari WordPress...');

        while (true) {
            $this->comment("Mengambil halaman: {$page}...");

            $response = Http::withoutVerifying()->get($this->baseUrl, [
                'page' => $page,
                'per_page' => $this->perPage,
            ]);

            if ($response->failed()) {
                $this->info('Proses selesai. Tidak ada lagi artikel ditemukan.');

                break;
            }

            $posts = $response->json();

            if (empty($posts)) {
                break;
            }

            foreach ($posts as $wpPost) {
                $title = html_entity_decode($wpPost['title']['rendered'], ENT_QUOTES | ENT_HTML5, 'UTF-8');

                if (ArticleOld::where('title', $title)->exists()) {
                    continue;
                }

                ArticleOld::create([
                    'title' => $title,
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

        $this->info("Sukses! {$totalMigrated} artikel baru berhasil dimigrasi ke tabel article_old.");

        return Command::SUCCESS;
    }
}
