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
    ];
}
