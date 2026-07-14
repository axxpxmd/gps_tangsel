<?php

namespace App\Models;

use Database\Factories\ArticleFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    /** @use HasFactory<ArticleFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'verifikator_id',
        'excerpt',
        'content',
        'image',
        'author',
        'status',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function verifikator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verifikator_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'article_tag');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ArticleImage::class)->orderBy('sort_order');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'publish');
    }

    public function getFormattedDateAttribute(): string
    {
        return $this->published_at?->format('d M Y') ?? $this->created_at->format('d M Y');
    }

    public function getReadingTimeAttribute(): int
    {
        $wordCount = str_word_count((string) preg_replace('/\s+/', ' ', strip_tags((string) $this->content)));

        return max(1, (int) ceil($wordCount / 200));
    }

    public function imageUrl(): Attribute
    {
        return Attribute::get(function () {
            if (! $this->image) {
                return null;
            }

            return rtrim((string) config('filesystems.disks.sftp.url', ''), '/').'/'.$this->image;
        });
    }
}
