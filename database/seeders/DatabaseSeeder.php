<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@simpultugas.test',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Bu Rina',
            'email' => 'guru@simpultugas.test',
            'password' => bcrypt('password'),
            'role' => 'guru',
        ]);

        User::create([
            'name' => 'Ani',
            'email' => 'siswa@simpultugas.test',
            'password' => bcrypt('password'),
            'role' => 'siswa',
        ]);
    }
}
