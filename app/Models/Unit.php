<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Unit extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    public function servers(): HasMany
    {
        return $this->hasMany(Server::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }


    public function domains(): HasManyThrough
    {
        return $this->hasManyThrough(Domain::class, Server::class);
    }

}
