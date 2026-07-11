<?php

namespace App\Models;

use Database\Factories\HaditsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hadits extends Model
{
    /** @use HasFactory<HaditsFactory> */
    use HasFactory;

    protected $fillable = [
        'arabic_text',
        'translation',
        'source',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
