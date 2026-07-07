<?php

namespace App\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class YoutubeService
{
    /**
     * Fetch latest videos from the configured YouTube channel.
     *
     * @return array<int, array{videoId: string, title: string, thumbnail: string, publishedAt: string, description: string}>
     */
    public function latestVideos(int $maxResults = 10): array
    {
        $cacheKey = 'youtube_videos_'.$maxResults;

        return Cache::remember($cacheKey, now()->addHours(6), function () use ($maxResults) {
            $apiKey = config('services.youtube.api_key');
            $channelId = config('services.youtube.channel_id');

            if (blank($apiKey) || blank($channelId)) {
                Log::warning('YouTube API key or channel ID not configured.');

                return [];
            }

            $uploadsPlaylistId = $this->getUploadsPlaylistId($apiKey, $channelId);

            if ($uploadsPlaylistId === null) {
                return [];
            }

            return $this->fetchPlaylistItems($apiKey, $uploadsPlaylistId, $maxResults);
        });
    }

    /**
     * Retrieve the uploads playlist ID for a given channel.
     */
    protected function getUploadsPlaylistId(string $apiKey, string $channelId): ?string
    {
        $cacheKey = 'youtube_uploads_playlist_'.$channelId;

        return Cache::remember($cacheKey, now()->addDays(7), function () use ($apiKey, $channelId) {
            try {
                $response = Http::withoutVerifying()->get('https://www.googleapis.com/youtube/v3/channels', [
                    'part' => 'contentDetails',
                    'id' => $channelId,
                    'key' => $apiKey,
                ]);

                if (! $response->successful()) {
                    Log::error('YouTube channel API error', [
                        'status' => $response->status(),
                        'body' => $response->body(),
                    ]);

                    return null;
                }

                $items = $response->json('items', []);

                if (blank($items)) {
                    Log::warning('YouTube channel not found.', ['channel_id' => $channelId]);

                    return null;
                }

                return $items[0]['contentDetails']['relatedPlaylists']['uploads'] ?? null;
            } catch (ConnectionException $e) {
                Log::error('YouTube channel API connection failed: '.$e->getMessage());

                return null;
            }
        });
    }

    /**
     * Fetch playlist items and return formatted video data.
     *
     * @return array<int, array{videoId: string, title: string, thumbnail: string, publishedAt: string, description: string}>
     */
    protected function fetchPlaylistItems(string $apiKey, string $uploadsPlaylistId, int $maxResults): array
    {
        try {
            $response = Http::withoutVerifying()->get('https://www.googleapis.com/youtube/v3/playlistItems', [
                'part' => 'snippet',
                'playlistId' => $uploadsPlaylistId,
                'maxResults' => $maxResults,
                'key' => $apiKey,
            ]);

            if (! $response->successful()) {
                Log::error('YouTube playlistItems API error', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return [];
            }

            $items = $response->json('items', []);

            return collect($items)->map(function (array $item) {
                $snippet = $item['snippet'] ?? [];

                return [
                    'videoId' => $snippet['resourceId']['videoId'] ?? '',
                    'title' => $snippet['title'] ?? '',
                    'thumbnail' => $snippet['thumbnails']['medium']['url'] ?? ($snippet['thumbnails']['default']['url'] ?? ''),
                    'publishedAt' => $snippet['publishedAt'] ?? '',
                    'description' => $snippet['description'] ?? '',
                ];
            })->values()->all();
        } catch (ConnectionException $e) {
            Log::error('YouTube playlistItems API connection failed: '.$e->getMessage());

            return [];
        }
    }
}
