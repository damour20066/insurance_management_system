<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Policy extends Model
{
    protected $fillable = [
        'client_id',
        'type',
        'premium',
    ];

    protected $primaryKey = 'policy_id';

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id', 'client_id');
    }

    public function claims(): HasMany
    {
        return $this->hasMany(Claim::class, 'policy_id', 'policy_id');
    }
}
