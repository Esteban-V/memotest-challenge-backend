<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemoTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_urls',
    ];

    protected $casts = [
        'image_urls' => 'array',
    ];
}
