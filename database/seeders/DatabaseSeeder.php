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
        // Buat 1 akun Admin
        User::updateOrCreate(
            ['email' => 'admin@desa.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
            ]
        );

        $this->call([
            DummyDataSeeder::class,
        ]);
    }
}
