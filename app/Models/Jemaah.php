<?php

namespace App\Models;

use Database\Factories\JemaahFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jemaah extends Model
{
    /** @use HasFactory<JemaahFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'avatar',
        'google_id',
    ];
}
