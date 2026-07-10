<?php

namespace App\Models;

use Database\Factories\ActivityFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /** @use HasFactory<ActivityFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'location',
        'latitude',
        'longitude',
        'description',
        'gambar',
        'is_active',
    ];

    protected $casts = [
        'date' => 'datetime',
        'is_active' => 'boolean',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    public function gambarUrl(): Attribute
    {
        return Attribute::get(function () {
            if (! $this->gambar) {
                return null;
            }

            return rtrim((string) config('filesystems.disks.sftp.url', ''), '/').'/'.$this->gambar;
        });
    }
}
