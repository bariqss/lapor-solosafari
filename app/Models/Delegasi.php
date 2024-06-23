<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Delegasi extends Model
{
    use HasFactory;

    protected $fillable = ['id_report', 'status_delegasi', 'time'];

    public function report(): HasMany
    {
        return $this->hasMany(Report::class, 'id_report');
    }
}
