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
        'title',
        'content',
        'excerpt',
        'status',
        'wp_created_at',
        'wp_modified_at',
    ];

    protected function casts(): array
    {
        return [
            'wp_created_at' => 'datetime',
            'wp_modified_at' => 'datetime',
        ];
    }
}
