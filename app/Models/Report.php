<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'id_user', 'date', 'id_location', 'category', 'description', 'level', 'status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function decumentation_image(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'id_image');
    }

    public function location(): HasMany
    {
        return $this->HasMany(Location::class, 'id_location');
    }

    protected static function booted(): void
    {
        static::saving(function (Report $data) {
            $data->date = Carbon::parse($data->tanggal);
        });
        static::creating(function (Report $data) {
            $data->id_user = 1;
            $data->id_location = 1;
            $data->status = 1;
        });
    }
}
