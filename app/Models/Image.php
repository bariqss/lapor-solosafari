<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['id_report', 'name_image'];

    public function report(): HasMany
    {
        return $this->hasMany(Report::class, 'id_report');
    }
}
