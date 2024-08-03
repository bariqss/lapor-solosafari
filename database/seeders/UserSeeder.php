<?php

namespace Database\Seeders;

use App\Enums\UserRole;
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
            'role' => UserRole::ADMIN,
        ]);
        User::query()->create([
            'name' => 'Operator',
            'email' => 'operator@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('operator123'),
            'status' => 0,
            'role' => UserRole::OPERATOR,
        ]);
        User::query()->create([
            'name' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('petugas123'),
            'telepon' => $faker->phoneNumber,
            'role' => UserRole::PETUGAS,
        ]);
        User::query()->create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('user123'),
            'telepon' => $faker->phoneNumber,
            'role' => UserRole::USER,
        ]);

        // for ($i = 0; $i < 10; $i++) {
        //     User::query()->create([
        //         'name' => 'User',
        //         'email' => 'user@gmail.com',
        //         'email_verified_at' => Carbon::now(),
        //         'password' => Hash::make('12345678'),
        //         'telepon' => $faker->phoneNumber,
        //         'role' => UserRole::USER,
        //     ]);
        // }
    }
}
