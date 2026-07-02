# Web Profil & Potensi Desa

Aplikasi berbasis web ini dikembangkan menggunakan **Laravel 12** untuk memetakan dan menampilkan informasi terkait potensi desa, fasilitas umum, UMKM, dan infrastruktur lainnya. Aplikasi ini awalnya dikembangkan dalam rangka kegiatan Kuliah Kerja Nyata (KKN) untuk mendigitalisasi informasi profil Dusun/Desa (khususnya Dawung Wetan / Candi).

## 🚀 Fitur Utama

- **Halaman Publik (Warga/Tamu):**
  - Melihat daftar lokasi penting di desa (UMKM, Fasilitas Umum, Sekolah, dll).
  - Detail informasi lokasi.
- **Halaman Admin:**
  - Login / Autentikasi Admin yang aman.
  - **Manajemen Kategori:** Admin dapat menambahkan, mengedit, atau menghapus kategori tempat (misal: UMKM, Sekolah, Fashum).
  - **Manajemen Lokasi:** Admin dapat mengelola data lokasi (menambah, mengubah koordinat/alamat, menghapus data).

## 🛠️ Teknologi yang Digunakan

- **Backend:** Laravel (PHP 8.2+)
- **Frontend:** Blade Templating, Tailwind CSS (via Vite)
- **Database:** SQLite (mudah di-setup, tanpa perlu install server database eksternal)

## 📋 Prasyarat Sistem

Sebelum menjalankan proyek ini di komputer Anda, pastikan Anda telah menginstal:
- [PHP](https://www.php.net/) (minimal versi 8.2)
- [Composer](https://getcomposer.org/)
- [Node.js & NPM](https://nodejs.org/)

## ⚙️ Panduan Instalasi & Menjalankan Aplikasi

Ikuti langkah-langkah berikut untuk menjalankan aplikasi ini secara lokal di komputer Anda:

1. **Buka Terminal / Command Prompt** dan arahkan ke direktori proyek ini.
2. **Instal dependensi PHP:**
   ```bash
   composer install
   ```
3. **Instal dependensi Frontend:**
   ```bash
   npm install
   ```
4. **Siapkan File Konfigurasi (Environment):**
   Salin file `.env.example` menjadi `.env`. Di Windows, Anda bisa menggunakan perintah:
   ```bash
   copy .env.example .env
   ```
5. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```
6. **Siapkan Database SQLite:**
   Pastikan file `database/database.sqlite` sudah ada. Jika belum, Anda bisa membuatnya secara manual (file kosong) atau aplikasi akan mencoba membuatnya otomatis.
   Ubah konfigurasi di file `.env` bagian database menjadi seperti ini:
   ```env
   DB_CONNECTION=sqlite
   # Hapus DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
   ```
7. **Jalankan Migrasi dan Seeder (Untuk Data Awal):**
   ```bash
   php artisan migrate:fresh --seed
   ```
8. **Jalankan Server Lokal:**
   Jalankan perintah berikut di terminal pertama:
   ```bash
   php artisan serve
   ```
   *(Aplikasi backend akan berjalan di http://127.0.0.1:8000)*
9. **Jalankan Vite untuk Aset Frontend:**
   Buka terminal *baru* dan jalankan:
   ```bash
   npm run dev
   ```

Aplikasi sekarang dapat diakses melalui browser Anda di tautan `http://127.0.0.1:8000`.

## 🔐 Kredensial Akses

Untuk mengakses halaman admin, Anda bisa login melalui `http://127.0.0.1:8000/login`.
Pastikan Anda sudah menjalankan perintah *seeder* (`php artisan migrate:fresh --seed`). Kredensial default untuk login dapat dicek di file `database/seeders/DatabaseSeeder.php` atau `UserSeeder`.

## 🤝 Manajemen Database Tim (Penting!)

File `database/database.sqlite` **TIDAK BOLEH** dimasukkan ke dalam Git (pastikan sudah ada di dalam `.gitignore`). 
Jika Anda atau teman Anda ingin menambahkan data lokasi atau kategori baru agar bisa digunakan bersama, **jangan menginputnya secara manual di halaman Admin lalu membagikan file `.sqlite`**. 

Cara yang benar untuk kolaborasi data:
1. Tambahkan data lokasi/kategori baru di dalam file `database/seeders/LocationSeeder.php`.
2. Lakukan *commit* dan *push* perubahan pada file seeder tersebut ke Git.
3. Anggota tim lain cukup melakukan `git pull` dan menjalankan `php artisan migrate:fresh --seed` untuk mendapatkan pembaruan data yang sama tanpa risiko *file corrupt* atau *merge conflict*.

## 📂 Struktur Direktori Penting

- `app/Models/` : Berisi model database seperti `User`, `Category`, dan `Location`.
- `app/Http/Controllers/` : Berisi logika bisnis (Controller) untuk halaman utama dan admin.
- `resources/views/` : File tampilan antarmuka (UI) menggunakan Blade.
- `database/` : File konfigurasi database, migration, dan seeder.

---
*Dibuat untuk keperluan pendataan dan pemetaan wilayah Desa / Dusun.*
