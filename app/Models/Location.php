<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ['latitude', 'longitude'];

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class, 'id_report');
    }
}
