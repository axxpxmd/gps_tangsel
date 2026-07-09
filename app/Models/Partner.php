<?php

namespace App\Models;

use Database\Factories\PartnerFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    /** @use HasFactory<PartnerFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'gambar',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
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
