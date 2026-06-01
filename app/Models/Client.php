<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $fillable = [
        'name',
        'phone',
    ];

    protected $primaryKey = 'client_id';

    public function policies(): HasMany
    {
        return $this->hasMany(Policy::class, 'client_id', 'client_id');
    }
}
