<?php

namespace Database\Seeders;

use App\Models\ReportCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReportCategory::query()->create([
            'nama_kategori' => 'Fasilitas Solo Safari',
        ]);
    }
}
