<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Location;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catUmkm = Category::create(['name' => 'UMKM', 'slug' => 'umkm', 'color' => '#10b981']); // Green
        $catFashum = Category::create(['name' => 'Fasilitas Umum', 'slug' => 'fashum', 'color' => '#f59e0b']); // Yellow
        $catSekolah = Category::create(['name' => 'Sekolah', 'slug' => 'sekolah', 'color' => '#3b82f6']); // Blue

        // Pacitan rough coordinates: -8.21, 111.1
        // Dusun Dawung Wetan, Desa Candi coordinates (approximate, using generic Candi, Pacitan area)
        // Let's use some dummy coordinates around Candi, Pringkuku, Pacitan
        $baseLat = -8.2230;
        $baseLng = 111.0240;

        Location::create([
            'category_id' => $catUmkm->id,
            'name' => 'Warung Nasi Pecel Bu Siti',
            'description' => 'Menyediakan nasi pecel khas Pacitan dengan bumbu kacang yang lezat.',
            'address' => 'Jl. Desa Candi RT 01/RW 02',
            'latitude' => $baseLat + 0.0010,
            'longitude' => $baseLng + 0.0015,
        ]);

        Location::create([
            'category_id' => $catUmkm->id,
            'name' => 'Kerajinan Anyaman Bambu Pak Joyo',
            'description' => 'Produksi kerajinan anyaman bambu lokal, menerima pesanan khusus.',
            'address' => 'Dusun Dawung Wetan RT 02/RW 02',
            'latitude' => $baseLat - 0.0020,
            'longitude' => $baseLng - 0.0010,
        ]);

        Location::create([
            'category_id' => $catFashum->id,
            'name' => 'Balai Dusun Dawung Wetan',
            'description' => 'Pusat kegiatan masyarakat dan tempat pertemuan warga Dusun Dawung Wetan.',
            'address' => 'Pusat Dusun Dawung Wetan',
            'latitude' => $baseLat,
            'longitude' => $baseLng,
        ]);

        Location::create([
            'category_id' => $catFashum->id,
            'name' => 'Masjid Al-Ikhlas',
            'description' => 'Masjid utama warga dusun untuk ibadah sholat lima waktu dan Jumat.',
            'address' => 'Jl. Masjid No.1, Dusun Dawung Wetan',
            'latitude' => $baseLat + 0.0005,
            'longitude' => $baseLng - 0.0005,
        ]);

        Location::create([
            'category_id' => $catSekolah->id,
            'name' => 'SD Negeri Candi 1',
            'description' => 'Sekolah dasar terdekat untuk anak-anak Dusun Dawung Wetan.',
            'address' => 'Jl. Raya Candi, Desa Candi',
            'latitude' => $baseLat + 0.0050,
            'longitude' => $baseLng + 0.0020,
        ]);
    }
}
