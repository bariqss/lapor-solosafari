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

    protected $fillable = ['name', 'id_user', 'date', 'id_location', 'id_category', 'description', 'level', 'status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ReportCategory::class, 'id_category');
    }

    public function decumentation_image(): HasMany
    {
        return $this->hasMany(Image::class, 'id_report');
    }

    public function location(): HasMany
    {
        return $this->HasMany(Location::class, 'id_report');
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
