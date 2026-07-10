<?php

namespace App\Models;

use Database\Factories\GalleryImageFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryImage extends Model
{
    /** @use HasFactory<GalleryImageFactory> */
    use HasFactory;

    protected $fillable = [
        'gallery_id',
        'gambar',
    ];

    public function gallery(): BelongsTo
    {
        return $this->belongsTo(Gallery::class);
    }

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
