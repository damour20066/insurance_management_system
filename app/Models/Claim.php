<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Claim extends Model
{
    protected $fillable = [
        'policy_id',
        'amount',
        'date',
    ];

    protected $primaryKey = 'claim_id';

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    public function policy(): BelongsTo
    {
        return $this->belongsTo(Policy::class, 'policy_id', 'policy_id');
    }
}
