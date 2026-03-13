<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@desa.id'],
            [
                'name' => 'Administrator Desa',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            ['email' => 'petugas@desa.id'],
            [
                'name' => 'Petugas Desa',
                'password' => bcrypt('password'),
                'role' => 'petugas',
            ]
        );
    }
}
