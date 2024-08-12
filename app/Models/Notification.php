<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'report_id',
        'status',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (Notification $notification) {
            $notification->is_read = false;
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }
}
