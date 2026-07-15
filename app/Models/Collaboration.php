<?php

namespace App\Models;

use Database\Factories\CollaborationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{
    /** @use HasFactory<CollaborationFactory> */
    use HasFactory;

    protected $fillable = [
        'nama',
        'whatsapp',
        'email',
        'tujuan',
        'status',
    ];

    public const STATUS_BARU = 'baru';

    public const STATUS_DIBACA = 'dibaca';

    public const STATUS_DITINDAKLANJUTI = 'ditindaklanjuti';

    public function getStatusOptions(): array
    {
        return [
            self::STATUS_BARU => 'Baru',
            self::STATUS_DIBACA => 'Sudah Dibaca',
            self::STATUS_DITINDAKLANJUTI => 'Sudah Ditindaklanjuti',
        ];
    }

    public function getStatusLabelAttribute(): string
    {
        return $this->getStatusOptions()[$this->status] ?? $this->status;
    }

    public function isBaru(): bool
    {
        return $this->status === self::STATUS_BARU;
    }

    public function isDibaca(): bool
    {
        return $this->status === self::STATUS_DIBACA;
    }

    public function isDitindaklanjuti(): bool
    {
        return $this->status === self::STATUS_DITINDAKLANJUTI;
    }
}
