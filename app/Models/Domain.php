<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Domain extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function server(): BelongsTo
    {
        return $this->belongsTo(Server::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(DomainImages::class);
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }
}
