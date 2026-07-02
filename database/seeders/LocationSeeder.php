<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catUmkm = Category::updateOrCreate(['slug' => 'umkm'], ['name' => 'UMKM', 'color' => '#10b981']); // Green
        $catFashum = Category::updateOrCreate(['slug' => 'fashum'], ['name' => 'Fasilitas Umum', 'color' => '#f59e0b']); // Yellow
        $catSekolah = Category::updateOrCreate(['slug' => 'sekolah'], ['name' => 'Sekolah', 'color' => '#3b82f6']); // Blue

        // Data Lokasi
        Location::updateOrCreate(
            ['name' => 'SDN Candi IV'],
            [
                'category_id' => $catSekolah->id,
                'description' => '-',
                'address' => 'Q288+Q4G, Dawung Lor, Candi, Kec. Pringkuku, Kabupaten Pacitan, Jawa Timur 63552',
                'latitude' => -8.233041741328188,
                'longitude' => 111.01531788059648,
            ]
        );

        Location::updateOrCreate(
            ['name' => 'Masjid Mujahiddin Aminah'],
            [
                'category_id' => $catFashum->id,
                'description' => '-',
                'address' => 'Q288+J54, Dawung Lor, Candi, Kec. Pringkuku, Kabupaten Pacitan, Jawa Timur 63552',
                'latitude' => -8.23411586385848,
                'longitude' => 111.01497492496584,
            ]
        );

        Location::updateOrCreate(
            ['name' => 'Toko bu Ari'],
            [
                'category_id' => $catUmkm->id,
                'description' => '-',
                'address' => 'Q288+H5G, Dawung Lor, Candi, Kec. Pringkuku, Kabupaten Pacitan, Jawa Timur 63552',
                'latitude' => -8.23352529888959,
                'longitude' => 111.01546559805888,
            ]
        );

        Location::updateOrCreate(
            ['name' => 'Balai Dusun Dawung Wetan'],
            [
                'category_id' => $catFashum->id,
                'description' => '-',
                'address' => 'Dawung Lor, Candi, Kec. Pringkuku, Kabupaten Pacitan, Jawa Timur',
                'latitude' => -8.233416796869827,
                'longitude' => 111.01531587915024,
            ]
        );

        Location::updateOrCreate(
            ['name' => 'Keripik Singkong Mbak Neni'],
            [
                'category_id' => $catUmkm->id,
                'description' => '-',
                'address' => 'Dawung Wetan, Candi, Kec. Pringkuku, Kabupaten Pacitan, Jawa Timur 63552',
                'latitude' => -8.233198164024953,
                'longitude' => 111.01461092022528,
            ]
        );
    }
}
