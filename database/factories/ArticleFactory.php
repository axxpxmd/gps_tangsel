<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->sentence(6);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => fake()->paragraph(2),
            'content' => collect(fake()->paragraphs(6))->map(fn ($p) => "<p>{$p}</p>")->implode("\n"),
            'image' => 'https://placehold.co/600x400/2F5FA3/F5E6B8?text=GPS+TANGSEL',
            'author' => fake()->name(),
            'read_time' => fake()->numberBetween(2, 8),
            'published_at' => fake()->dateTimeBetween('-3 months', 'now'),
        ];
    }
}
