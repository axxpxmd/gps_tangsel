<?php

namespace App\Models;

use Database\Factories\ArticleOldFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleOld extends Model
{
    /** @use HasFactory<ArticleOldFactory> */
    use HasFactory;

    protected $table = 'article_old';

    protected $fillable = [
        'wp_id',
        'title',
        'slug',
        'content',
        'excerpt',
        'featured_image_url',
        'wp_author_id',
        'author_name',
        'link',
        'status',
        'format',
        'categories',
        'tags',
        'wp_created_at',
        'wp_modified_at',
    ];

    protected function casts(): array
    {
        return [
            'categories' => 'array',
            'tags' => 'array',
            'wp_created_at' => 'datetime',
            'wp_modified_at' => 'datetime',
        ];
    }
}
