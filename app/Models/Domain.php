<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Domain extends Model
{
    use HasFactory;

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'deskripsi' => 'Belum ada deskripsi',
        'status' => 'Tidak Aktif',
        'ip_address' => '127.0.0.1',
        'port' => 80,
        'screenshot_url' => 'https://via.placeholder.com/300x200.png?text=Belum+ada+screenshot'
    ];

    public function pic(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }
}
