<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create('id_ID');

        User::query()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('admin123'),
            'status' => 0,
            'role' => 'admin',
        ]);
        User::query()->create([
            'name' => 'Operator',
            'email' => 'operator@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('operator123'),
            'telepon' => $faker->phoneNumber,
            'status' => 0,
            'role' => 'operator',
        ]);
        User::query()->create([
            'name' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('petugas123'),
            'telepon' => $faker->phoneNumber,
            'role' => 'petugas',
        ]);
        User::query()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('user123'),
            'telepon' => $faker->phoneNumber,
            'role' => 'user',
        ]);
    }
}
