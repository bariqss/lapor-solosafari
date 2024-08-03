<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ReportPenanganan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'id_user', 'id_report', 'date', 'deskripsi_penanganan'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class, 'id_report');
    }

    public function penanganan_image(): HasMany
    {
        return $this->hasMany(ImagePenanganan::class, 'id_reportpenanganan');
    }
}
