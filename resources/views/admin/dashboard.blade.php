<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Profil Desa Dawung Wetan</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#fbfaf5] min-h-screen">
    
    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center gap-6">
                    <h1 class="text-xl font-extrabold text-[#1a4d33] tracking-tight">Dawung Wetan <span class="text-[#246343]">Admin</span></h1>
                    
                    <div class="hidden md:flex space-x-4">
                        <a href="{{ route('dashboard') }}" class="text-[#1a4d33] border-b-2 border-emerald-600 px-3 py-2 text-sm font-bold transition-colors">Dashboard</a>
                        <a href="{{ route('admin.locations.index') }}" class="text-[#246343] hover:text-[#1a4d33] px-3 py-2 text-sm font-semibold transition-colors">Lokasi</a>
                        <a href="{{ route('admin.categories.index') }}" class="text-[#246343] hover:text-[#1a4d33] px-3 py-2 text-sm font-semibold transition-colors">Kategori</a>
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="text-[#246343] font-medium mr-6">Halo, {{ Auth::user()->name ?? 'Admin' }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700 font-semibold px-3 py-1.5 rounded-lg hover:bg-red-50 transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
                <h2 class="text-3xl font-extrabold mb-4 text-[#1a4d33] tracking-tight">Selamat Datang di Dashboard!</h2>
                <p class="text-[#1e583f]/80 leading-relaxed max-w-3xl">
                    Ini adalah halaman khusus pengurus desa. Anda dapat mengelola data lokasi, titik-titik pemetaan UMKM, dan fasilitas umum agar informasi di halaman depan tetap *up-to-date*.
                </p>
                
                <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kelola Lokasi Card -->
                    <div class="bg-gradient-to-br from-emerald-50 to-white p-8 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow group">
                        <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center mb-6 text-xl border border-gray-100 group-hover:scale-110 transition-transform">
                            📍
                        </div>
                        <h3 class="font-bold text-[#1a4d33] text-xl mb-2">Kelola Lokasi</h3>
                        <p class="text-[#246343] text-sm mb-6 leading-relaxed">Tambahkan atau perbarui titik lokasi fasilitas umum dan UMKM di desa.</p>
                        <a href="{{ route('admin.locations.index') }}" class="inline-block bg-gradient-to-r from-[#1e583f] to-[#246343] text-white px-5 py-2.5 rounded-xl font-semibold shadow-sm hover:shadow-md hover:from-[#1a4d33] hover:to-[#1e583f] transition-all">
                            Kelola Sekarang &rarr;
                        </a>
                    </div>

                    <!-- Kelola Kategori Card -->
                    <div class="bg-gradient-to-br from-amber-50 to-white p-8 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition-shadow group">
                        <div class="w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center mb-6 text-xl border border-gray-100 group-hover:scale-110 transition-transform">
                            📑
                        </div>
                        <h3 class="font-bold text-[#1a4d33] text-xl mb-2">Kelola Kategori</h3>
                        <p class="text-[#246343] text-sm mb-6 leading-relaxed">Atur kategori beserta warnanya untuk klasifikasi pemetaan lokasi desa.</p>
                        <a href="{{ route('admin.categories.index') }}" class="inline-block bg-gradient-to-r from-[#deaf65] to-[#c99a53] text-white px-5 py-2.5 rounded-xl font-semibold shadow-sm hover:shadow-md hover:from-[#c99a53] hover:to-[#b38541] transition-all">
                            Kelola Kategori &rarr;
                        </a>
                    </div>
                </div>
                
                <div class="mt-12 pt-6 border-t border-gray-100">
                    <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center text-[#246343] hover:text-[#1e583f] font-semibold transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                        Lihat Website Depan
                    </a>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
