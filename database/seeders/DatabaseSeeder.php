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
            ['username' => 'admin'],
            [
                'name' => 'Admin Dawung Wetan',
                'password' => bcrypt('admin'),
            ]
        );

        $this->call([
            LocationSeeder::class,
        ]);
    }
}
