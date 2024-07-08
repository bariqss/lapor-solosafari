<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReportCategory extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kategori'];

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class, 'id_report');
    }
}
