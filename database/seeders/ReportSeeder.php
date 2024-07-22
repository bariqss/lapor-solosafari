<?php

namespace Database\Seeders;

use Faker\Factory as Faker;

use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 50; $i++) {
            Report::query()->create([
                'name' => $faker->word,
                'id_user' => '6',
                'date' => $faker->dateTimeThisYear(),
                'id_location' => '2',
                'id_category' => $faker->randomElement(['1', '2']),
                'description' => $faker->paragraph,
                'level' => $faker->randomElement(['1', '2', '3']),
                'status' => $faker->randomElement(['1', '2', '3']),
                'validasi' => $faker->randomElement(['1', '2']),
            ]);
        }
    }
}
