<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ImagePenanganan extends Model
{
    use HasFactory;

    protected $fillable = ['id_reportpenanganan', 'name_image'];

    public function reportpenanganan(): BelongsTo
    {
        return $this->belongsTo(ReportPenanganan::class, 'id_reportpenanganan');
    }
}
