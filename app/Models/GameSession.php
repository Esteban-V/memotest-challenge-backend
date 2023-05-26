<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GameSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'memo_test_id',
        'retries',
        'number_of_pairs',
        'state',
    ];

    public function memo_test(): BelongsTo
    {
        return $this->belongsTo(MemoTest::class);
    }
}
