<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profil Dusun Dawung Wetan</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('storage/logo.jpeg') }}?v={{ time() }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #fbfaf5; /* Sangat krem cerah */
            color: #1a4d33; /* Hijau sangat gelap */
        }

        #map {
            height: 600px;
            z-index: 1;
        }

        /* Custom Scrollbar for Filters */
        .filter-scroll::-webkit-scrollbar {
            width: 6px;
        }
        .filter-scroll::-webkit-scrollbar-track {
            background: #f1f1f1; 
            border-radius: 4px;
        }
        .filter-scroll::-webkit-scrollbar-thumb {
            background: #c5d3cd; 
            border-radius: 4px;
        }
        .filter-scroll::-webkit-scrollbar-thumb:hover {
            background: #a3b8af; 
        }

        /* Hide scrollbar for gallery slider */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        /* Custom Checkbox style */
        .custom-checkbox {
            accent-color: #246343;
            width: 1.1rem;
            height: 1.1rem;
            cursor: pointer;
        }
    </style>
</head>
<body class="antialiased selection:bg-[#deaf65] selection:text-white overflow-x-hidden">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-[#1e583f] transition-all duration-300 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-8">
                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center gap-3 hover:opacity-80 transition-opacity">
                        <div class="w-8 h-8 bg-[#377b5a] rounded-lg flex items-center justify-center shadow-inner">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-extrabold text-lg text-white leading-tight">DAWUNG WETAN</span>
                            <span class="text-[10px] text-emerald-100/70 font-medium tracking-wide">Sistem Informasi Potensi Dusun</span>
                        </div>
                    </a>

                    <!-- Desktop Menu -->
                    <div class="hidden lg:flex items-center space-x-2">
                        <a href="#beranda" class="text-white hover:text-[#deaf65] px-3 py-2 text-sm font-semibold transition-colors">Beranda</a>
                        <a href="#peta" class="text-white hover:text-[#deaf65] px-3 py-2 text-sm font-semibold transition-colors">Peta Interaktif</a>
                        <a href="#profil" class="text-white hover:text-[#deaf65] px-3 py-2 text-sm font-semibold transition-colors">Profil Desa</a>
                        <a href="#galeri" class="text-white hover:text-[#deaf65] px-3 py-2 text-sm font-semibold transition-colors">Galeri</a>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <div class="lg:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-white hover:text-[#deaf65] focus:outline-none p-2 rounded-md">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Panel -->
        <div id="mobile-menu" class="hidden lg:hidden bg-[#1a4d33] border-t border-[#246343] shadow-lg absolute w-full">
            <div class="px-4 pt-2 pb-4 space-y-1">
                <a href="#beranda" class="mobile-link block text-white hover:bg-[#246343] px-3 py-2 rounded-md text-base font-semibold">Beranda</a>
                <a href="#peta" class="mobile-link block text-white hover:bg-[#246343] px-3 py-2 rounded-md text-base font-semibold">Peta Interaktif</a>
                <a href="#profil" class="mobile-link block text-white hover:bg-[#246343] px-3 py-2 rounded-md text-base font-semibold">Profil Desa</a>
                <a href="#galeri" class="mobile-link block text-white hover:bg-[#246343] px-3 py-2 rounded-md text-base font-semibold">Galeri</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="relative pt-32 pb-48 lg:pt-40 lg:pb-56 overflow-hidden bg-[#246343]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col items-start">
            
            <div data-aos="fade-up" class="inline-flex items-center gap-2 mb-6 px-4 py-1.5 rounded-full bg-[#377b5a] text-[#a6d8c0] border border-[#448b68] text-xs font-semibold tracking-wide">
                <span class="w-2 h-2 rounded-full bg-[#deaf65]"></span>
                Dusun Dawung Wetan, Kab. Pacitan
            </div>
            
            <h1 data-aos="fade-up" data-aos-delay="100" class="text-4xl md:text-5xl lg:text-7xl font-extrabold tracking-tight text-white mb-6 leading-[1.15] max-w-3xl drop-shadow-sm">
                Jelajahi Potensi <br/>
                <span class="text-[#deaf65]">Dusun Dawung Wetan</span>
            </h1>
            
            <p data-aos="fade-up" data-aos-delay="200" class="text-base md:text-lg lg:text-xl text-emerald-50 mb-10 leading-relaxed max-w-2xl font-medium">
                Platform digital terpusat untuk menemukan UMKM lokal, fasilitas umum, dan potensi unggulan lainnya di Dusun Dawung Wetan.
            </p>
            
            <div data-aos="fade-up" data-aos-delay="300" class="flex flex-wrap items-center gap-4">
                <a href="#peta" class="bg-[#deaf65] hover:bg-[#c99a53] text-[#1e583f] font-bold py-3.5 px-6 rounded-lg shadow-md transition-all flex items-center gap-2 text-sm md:text-base">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                    Lihat Peta Interaktif
                </a>
                <a href="#profil" class="bg-transparent hover:bg-white/10 border-2 border-white text-white font-bold py-3 px-6 rounded-lg transition-all flex items-center gap-2">
                    Pelajari Lebih Lanjut &rarr;
                </a>
            </div>
        </div>
        
        <!-- Curved Bottom Wave -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-0 text-[#fbfaf5]">
            <svg class="block w-full h-[80px] lg:h-[120px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C57.71,106.53,115.34,103.78,171,88.75,223.11,74.72,274.5,65.17,321.39,56.44Z" fill="currentColor"></path>
            </svg>
        </div>
    </section>

    <!-- Statistics Counter Section -->
    <section class="bg-[#fbfaf5] -mt-20 relative z-20" data-aos="fade-up">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 md:p-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center divide-y md:divide-y-0 md:divide-x divide-gray-100">
                    <div class="pt-4 md:pt-0">
                        <div class="text-4xl md:text-5xl font-extrabold text-[#deaf65] mb-2 flex items-center justify-center gap-1">
                            <span class="counter" data-target="{{ $stats['total_locations'] ?? 0 }}">0</span><span class="text-3xl text-[#1a4d33]">+</span>
                        </div>
                        <p class="font-bold text-[#1a4d33] tracking-wide uppercase text-sm">Titik Pemetaan</p>
                    </div>
                    <div class="pt-8 md:pt-0">
                        <div class="text-4xl md:text-5xl font-extrabold text-[#deaf65] mb-2 flex items-center justify-center gap-1">
                            <span class="counter" data-target="{{ $stats['total_umkm'] ?? 0 }}">0</span><span class="text-3xl text-[#1a4d33]">+</span>
                        </div>
                        <p class="font-bold text-[#1a4d33] tracking-wide uppercase text-sm">UMKM Lokal</p>
                    </div>
                    <div class="pt-8 md:pt-0">
                        <div class="text-4xl md:text-5xl font-extrabold text-[#deaf65] mb-2 flex items-center justify-center gap-1">
                            <span class="counter" data-target="{{ $stats['total_categories'] ?? 0 }}">0</span>
                        </div>
                        <p class="font-bold text-[#1a4d33] tracking-wide uppercase text-sm">Kategori Potensi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section (Sidebar + Full Map) -->
    <section id="peta" class="py-12 bg-[#fbfaf5]">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="bg-[#246343] rounded-t-2xl p-6 md:p-8 text-white shadow-sm border-b border-[#1e583f]">
                <div class="text-[#a6d8c0] text-sm font-semibold mb-2">Beranda / Peta Interaktif</div>
                <h2 class="text-3xl font-bold tracking-tight mb-2">Peta Interaktif Dusun Dawung Wetan</h2>
                <p class="text-emerald-100/80">Sebaran lokasi UMKM, fasilitas umum, dan potensi unggulan desa.</p>
            </div>

            <!-- Map Layout Container -->
            <div class="flex flex-col lg:flex-row bg-white rounded-b-2xl shadow-md border border-[#e5e7eb] overflow-hidden min-h-[600px]">
                
                <!-- Left Sidebar (Filters) -->
                <div class="w-full lg:w-[320px] flex-shrink-0 border-r border-[#e5e7eb] bg-white flex flex-col">
                    
                    <!-- Kategori -->
                    <div class="p-6 border-b border-[#e5e7eb]">
                        <h3 class="font-bold text-[#1a4d33] mb-4 text-lg">Filter Kategori</h3>
                        <div class="space-y-4 filter-scroll max-h-[300px] overflow-y-auto pr-2" id="category-filters">
                            <!-- "Semua" option is handled internally by checking/unchecking all -->
                            @foreach($categories as $category)
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" class="category-checkbox custom-checkbox" value="{{ $category->id }}" checked>
                                <div class="flex items-center gap-2 flex-grow p-2 rounded hover:bg-gray-50 transition-colors border border-transparent group-hover:border-gray-200">
                                    <span class="w-4 h-4 rounded-full shadow-inner border border-gray-200/50" style="background-color: {{ $category->color }};"></span>
                                    <span class="text-sm font-medium text-gray-700 select-none">{{ $category->name }}</span>
                                </div>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Legenda -->
                    <div class="p-6 bg-gray-50/50 flex-grow">
                        <h3 class="font-bold text-gray-500 text-xs tracking-widest uppercase mb-4">Legenda</h3>
                        <div class="space-y-3">
                            @foreach($categories as $category)
                            <div class="flex items-center gap-3">
                                <span class="w-3 h-3 rounded-full" style="background-color: {{ $category->color }};"></span>
                                <span class="text-xs font-medium text-gray-600">{{ $category->name }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right Side (Leaflet Map) -->
                <div class="w-full flex-grow relative">
                    <div id="map" class="w-full h-full min-h-[400px] md:min-h-[500px] lg:min-h-full" style="background-color: #f0f0f0;"></div>
                </div>

            </div>
        </div>
    </section>

    <!-- Profil Singkat / About Section -->
    <section id="profil" class="py-24 bg-white border-y border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#1a4d33] tracking-tight">Sekilas Tentang Desa</h2>
                <div class="w-24 h-1.5 bg-[#deaf65] mx-auto mt-4 rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div data-aos="fade-up" data-aos-delay="100" class="bg-[#fbfaf5] rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-[#246343] text-white rounded-xl flex items-center justify-center mb-6 text-2xl shadow-md">
                        🌿
                    </div>
                    <h3 class="text-xl font-bold text-[#1a4d33] mb-3">Pesona Alam</h3>
                    <p class="text-gray-600 leading-relaxed font-medium text-sm">Udara pegunungan yang segar dan pepohonan hijau yang rimbun memberikan kedamaian luar biasa bagi siapa saja.</p>
                </div>
                
                <!-- Card 2 -->
                <div data-aos="fade-up" data-aos-delay="200" class="bg-[#fbfaf5] rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-[#deaf65] text-white rounded-xl flex items-center justify-center mb-6 text-2xl shadow-md">
                        🏪
                    </div>
                    <h3 class="text-xl font-bold text-[#1a4d33] mb-3">Pusat Kreativitas</h3>
                    <p class="text-gray-600 leading-relaxed font-medium text-sm">Kemandirian warga dalam menciptakan kerajinan dan kuliner lokal yang menggerakkan roda ekonomi desa.</p>
                </div>
                
                <!-- Card 3 -->
                <div data-aos="fade-up" data-aos-delay="300" class="bg-[#fbfaf5] rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                    <div class="w-14 h-14 bg-[#246343] text-white rounded-xl flex items-center justify-center mb-6 text-2xl shadow-md">
                        🏫
                    </div>
                    <h3 class="text-xl font-bold text-[#1a4d33] mb-3">Fasilitas Mumpuni</h3>
                    <p class="text-gray-600 leading-relaxed font-medium text-sm">Layanan kesehatan dan pendidikan dasar yang tertata rapi sebagai penunjang utama kesejahteraan masyarakat.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="galeri" class="py-24 bg-[#fbfaf5]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#1a4d33] tracking-tight">Galeri Dokumentasi</h2>
                <div class="w-24 h-1.5 bg-[#deaf65] mx-auto mt-4 rounded-full"></div>
                <p class="mt-4 text-emerald-800/80 font-medium"></p>
            </div>
            
            <div class="relative w-full px-2 lg:px-0">
                <!-- Tombol Kiri -->
                <button id="slideLeftBtn" class="absolute left-0 lg:-left-6 top-1/2 -translate-y-1/2 z-10 bg-white/90 hover:bg-white text-[#1a4d33] w-12 h-12 rounded-full shadow-lg flex items-center justify-center transition-transform hover:scale-110 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>

                <style>
                    @media (min-width: 1024px) {
                        .gallery-item {
                            width: 48% !important;
                        }
                    }
                </style>
                <!-- Kontainer Scroll -->
                <div id="galleryContainer" class="flex gap-4 overflow-x-auto snap-x snap-mandatory hide-scrollbar pb-6 pt-2">
                    @forelse($locations->whereNotNull('image') as $index => $location)
                    <a href="{{ route('location.show', $location->id) }}" class="gallery-item block flex-none w-[85%] md:w-[45%] aspect-[4/3] snap-center relative group overflow-hidden rounded-2xl shadow-sm bg-gray-100" data-aos="zoom-in" data-aos-delay="{{ 100 * (($index % 4) + 1) }}">
                        <img src="{{ asset('storage/' . $location->image) }}" alt="{{ $location->name }}" class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center p-4 text-center">
                            <span class="text-white font-bold tracking-wide">{{ $location->name }}</span>
                            @if($location->category)
                                <span class="text-emerald-300 text-sm font-medium mt-1">{{ $location->category->name }}</span>
                            @endif
                        </div>
                    </a>
                    @empty
                    <div class="w-full text-center py-8 text-gray-500">
                        Belum ada foto dokumentasi lokasi.
                    </div>
                    @endforelse
                </div>

                <!-- Tombol Kanan -->
                <button id="slideRightBtn" class="absolute right-0 lg:-right-6 top-1/2 -translate-y-1/2 z-10 bg-white/90 hover:bg-white text-[#1a4d33] w-12 h-12 rounded-full shadow-lg flex items-center justify-center transition-transform hover:scale-110 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#1a4d33] pt-16 pb-8 border-t-4 border-[#deaf65] mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12 border-b border-[#246343] pb-12">
                <!-- Kolom Kiri -->
                <div>
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-[#377b5a] rounded-lg flex items-center justify-center shadow-inner">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="font-extrabold text-2xl text-white tracking-tight">DAWUNG WETAN</span>
                    </div>
                    <p class="text-emerald-100/70 leading-relaxed text-sm">
                        Sistem Informasi Potensi Dusun Dawung Wetan.<br>
                        Platform digital pemetaan potensi wilayah<br>
                        Dusun Dawung Wetan, Kab. Pacitan.
                    </p>
                </div>

                <!-- Kolom Tengah -->
                <div>
                    <h3 class="text-white font-bold text-lg mb-6">Navigasi</h3>
                    <ul class="space-y-3 text-sm text-emerald-100/80">
                        <li><a href="#beranda" class="hover:text-[#deaf65] transition-colors flex items-center gap-2">🏠 Beranda</a></li>
                        <li><a href="#peta" class="hover:text-[#deaf65] transition-colors flex items-center gap-2">🗺️ Peta Interaktif</a></li>
                        <li><a href="#profil" class="hover:text-[#deaf65] transition-colors flex items-center gap-2">📖 Profil Desa</a></li>
                    </ul>
                </div>

                <!-- Kolom Kanan -->
                <div>
                    <h3 class="text-white font-bold text-lg mb-6">Informasi</h3>
                    <div class="space-y-4 text-sm text-emerald-100/80">
                        <div class="flex items-start gap-3">
                            <span class="text-[#deaf65] mt-0.5">📍</span>
                            <p>Dusun Dawung Wetan, Desa Candi<br>Kec. Pringkuku, Kab. Pacitan<br>Jawa Timur</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <span class="text-[#deaf65] mt-0.5">✉️</span>
                            <a href="#" class="hover:text-white transition-colors">Hubungi Kami</a>
                        </div>
                        <div class="mt-6 pt-4 border-t border-[#246343]">
                            <p class="text-xs text-emerald-100/60 leading-relaxed">
                                Dikembangkan oleh<br>
                                <span class="font-semibold text-emerald-100/80">Tim KKN Dawung Wetan 2026</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-emerald-100/50">
                <div>&copy; {{ date('Y') }} Dawung Wetan. Semua hak dilindungi.</div>
                <a href="{{ route('login') }}" class="hover:text-white transition-colors">Admin Panel</a>
            </div>
        </div>
    </footer>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const locationsData = @json($locations);
            
            let initialLat = -8.2230;
            let initialLng = 111.0240;
            
            if (locationsData.length > 0) {
                initialLat = locationsData[0].latitude;
                initialLng = locationsData[0].longitude;
            }

            const osmTile = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap'
            });

            const mapTile = L.tileLayer('http://mt0.google.com/vt/lyrs=m&hl=en&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                attribution: '&copy; Google Maps'
            });

            const satelliteTile = L.tileLayer('http://mt0.google.com/vt/lyrs=s,h&hl=en&x={x}&y={y}&z={z}', {
                maxZoom: 20,
                attribution: '&copy; Google Maps Satellite'
            });

            const map = L.map('map', {
                center: [initialLat, initialLng],
                zoom: 15,
                layers: [osmTile] // Default adalah Peta Awal (OSM)
            });

            const baseMaps = {
                "Peta Dasar (OSM)": osmTile,
                "Peta Jalan (Google)": mapTile,
                "Peta Satelit": satelliteTile
            };

            L.control.layers(baseMaps).addTo(map);

            // Custom Marker Icon SVG Generator
            function getMarkerIcon(color) {
                const svgIcon = `
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="30" height="40">
                        <path fill="${color}" stroke="#ffffff" stroke-width="15" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                        <circle cx="192" cy="192" r="60" fill="#ffffff"/>
                    </svg>
                `;
                
                return L.divIcon({
                    className: 'custom-div-icon',
                    html: `<div style="filter: drop-shadow(0px 3px 4px rgba(0,0,0,0.3)); cursor:pointer; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.15)'" onmouseout="this.style.transform='scale(1)'">${svgIcon}</div>`,
                    iconSize: [30, 40],
                    iconAnchor: [15, 40],
                    popupAnchor: [0, -40]
                });
            }

            const allMarkers = [];
            const bounds = [];
            
            locationsData.forEach(loc => {
                if (loc.latitude && loc.longitude) {
                    const color = loc.category ? loc.category.color : '#246343';
                    const categoryId = loc.category_id || 'uncategorized';
                    
                    const marker = L.marker([loc.latitude, loc.longitude], {
                        icon: getMarkerIcon(color)
                    }).addTo(map);
                    
                    // Permanent Tooltip (Label) - hidden by default unless zoom is close, or keep it. Let's keep it clean.
                    marker.bindTooltip(loc.name, {
                        permanent: true,
                        direction: 'bottom',
                        className: 'bg-white border-0 shadow-sm text-[10px] font-bold px-2 py-0.5 rounded mt-2 text-gray-800',
                        offset: [0, 5]
                    });

                    bounds.push([loc.latitude, loc.longitude]);
                    
                    allMarkers.push({
                        marker: marker,
                        categoryId: categoryId.toString()
                    });

                    // Popup Content
                    const popupContent = `
                        <div class="p-2 min-w-[220px] font-sans">
                            <div class="text-[10px] font-bold px-2 py-0.5 rounded text-white inline-block mb-2 shadow-sm uppercase tracking-wide" style="background-color: ${color}">
                                ${loc.category ? loc.category.name : 'Uncategorized'}
                            </div>
                            <h3 class="font-extrabold text-lg text-[#1a4d33] mb-1 leading-tight">${loc.name}</h3>
                            <div class="text-xs text-gray-600 flex items-start gap-1 mb-3">
                                📍 <span class="font-medium">${loc.address || 'Alamat tidak tersedia'}</span>
                            </div>
                            <a href="/lokasi/${loc.id}" class="block text-center w-full bg-[#deaf65] hover:bg-[#c99a53] text-[#1e583f] font-bold py-2 rounded text-xs transition-colors shadow-sm">
                                Lihat Detail
                            </a>
                        </div>
                    `;
                    marker.bindPopup(popupContent, {
                        maxWidth: 300,
                        className: 'custom-popup-siasri'
                    });
                }
            });
            if (bounds.length > 0) {
                map.fitBounds(bounds, { padding: [50, 50] });
            }



            // Checkbox Filtering Logic
            const checkboxes = document.querySelectorAll('.category-checkbox');
            checkboxes.forEach(cb => {
                cb.addEventListener('change', updateMapFilters);
            });

            function updateMapFilters() {
                // Get all checked category IDs
                const checkedCategories = Array.from(checkboxes)
                                             .filter(cb => cb.checked)
                                             .map(cb => cb.value);

                let activeBounds = [];

                allMarkers.forEach(item => {
                    if (checkedCategories.includes(item.categoryId)) {
                        if (!map.hasLayer(item.marker)) {
                            map.addLayer(item.marker);
                        }
                        activeBounds.push(item.marker.getLatLng());
                    } else {
                        if (map.hasLayer(item.marker)) {
                            map.removeLayer(item.marker);
                        }
                    }
                });

                // Re-center map if there are visible markers
                if (activeBounds.length > 0) {
                    map.fitBounds(activeBounds, { padding: [50, 50], maxZoom: 16 });
                }
            }
        });
    </script>
    <style>
        .custom-popup-siasri .leaflet-popup-content-wrapper {
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        .custom-popup-siasri .leaflet-popup-tip {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
    </style>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS
            AOS.init({
                duration: 800,
                once: true,
                offset: 100,
            });

            // Counter Animation Logic
            const counters = document.querySelectorAll('.counter');
            const speed = 200; // The lower the slower

            const animateCounters = () => {
                counters.forEach(counter => {
                    const updateCount = () => {
                        const target = +counter.getAttribute('data-target');
                        const count = +counter.innerText;
                        
                        const inc = target / speed;

                        if (count < target) {
                            counter.innerText = Math.ceil(count + inc);
                            setTimeout(updateCount, 15);
                        } else {
                            counter.innerText = target;
                        }
                    };
                    updateCount();
                });
            };

            // Use Intersection Observer to trigger counter when scrolled into view
            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting) {
                    animateCounters();
                    observer.disconnect(); // Only animate once
                }
            });

            const counterSection = document.querySelector('.counter');
            if(counterSection) {
                observer.observe(counterSection);
            }
            // Mobile Menu Toggle Logic
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileLinks = document.querySelectorAll('.mobile-link');

            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
                
                mobileLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenu.classList.add('hidden');
                    });
                });
            }

            // Gallery Slider Logic
            const galleryContainer = document.getElementById('galleryContainer');
            const slideLeftBtn = document.getElementById('slideLeftBtn');
            const slideRightBtn = document.getElementById('slideRightBtn');

            if (galleryContainer) {
                const slideAmount = window.innerWidth > 1024 ? galleryContainer.clientWidth * 0.5 : galleryContainer.clientWidth * 0.9;
                
                if (slideLeftBtn) {
                    slideLeftBtn.addEventListener('click', () => {
                        galleryContainer.scrollBy({ left: -slideAmount, behavior: 'smooth' });
                    });
                }
                if (slideRightBtn) {
                    slideRightBtn.addEventListener('click', () => {
                        galleryContainer.scrollBy({ left: slideAmount, behavior: 'smooth' });
                    });
                }

                // Auto slide logic
                const autoSlide = () => {
                    if (galleryContainer.scrollLeft + galleryContainer.clientWidth >= galleryContainer.scrollWidth - 20) {
                        galleryContainer.scrollTo({ left: 0, behavior: 'smooth' });
                    } else {
                        galleryContainer.scrollBy({ left: slideAmount, behavior: 'smooth' });
                    }
                };
                
                let autoSlideInterval = setInterval(autoSlide, 3500);   

                galleryContainer.addEventListener('mouseenter', () => clearInterval(autoSlideInterval));
                galleryContainer.addEventListener('mouseleave', () => {
                    autoSlideInterval = setInterval(autoSlide, 2500);
                });
            }
        });
    </script>
</body>
</html> 
