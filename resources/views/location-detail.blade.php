<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $location->name }} - Profil Dusun Dawung Wetan</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #f5f5f5; /* Abu-abu sangat muda untuk body luar */
            color: #1a4d33;
        }
        
        #detail-map {
            height: 300px;
            z-index: 1;
        }
    </style>
</head>
<body class="antialiased selection:bg-[#deaf65] selection:text-white min-h-screen flex flex-col">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-[#1e583f] transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-3">
                    <div class="w-8 h-8 bg-[#377b5a] rounded-lg flex items-center justify-center shadow-inner">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="font-extrabold text-lg text-white leading-tight">DAWUNG WETAN</span>
                </div>

                <div class="flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="text-white hover:text-[#deaf65] px-3 py-2 text-sm font-semibold transition-colors">Beranda</a>
                    <a href="{{ route('home') }}#peta" class="text-white hover:text-[#deaf65] px-3 py-2 text-sm font-semibold transition-colors">Peta</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Breadcrumbs Bar -->
    <div class="pt-16 bg-[#fbfaf5] border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex flex-wrap items-center gap-1 text-sm font-medium">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="text-[#246343] hover:text-[#1a4d33] transition-colors">Beranda</a>
                    </li>
                    <li>
                        <div class="flex items-center text-gray-400">
                            <span class="mr-2">/</span>
                            <span class="text-[#246343]">{{ $location->category->name ?? 'Uncategorized' }}</span>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center text-gray-800 font-bold">
                            <span class="mr-2 text-gray-400">/</span>
                            <span>{{ $location->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <main class="flex-grow py-10 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Left Column: Image, Title, Desc, Info -->
                <div class="lg:col-span-2 flex flex-col">
                    
                    <!-- Placeholder/Image Container -->
                    <div class="w-full h-80 md:h-[450px] bg-[#f0f0f0] rounded-2xl overflow-hidden mb-8 shadow-sm border border-gray-100 flex items-center justify-center relative">
                        @if($location->image)
                            <img src="{{ asset('storage/' . $location->image) }}" alt="{{ $location->name }}" class="w-full h-full object-cover">
                        @else
                            <!-- Placeholder drawing from the screenshot -->
                            <svg class="w-32 h-32 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zm-5.04-6.71l-2.75 3.54-1.96-2.36L6.5 17h11l-3.54-4.71z"/>
                            </svg>
                        @endif
                    </div>

                    <!-- Title & Badge -->
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                        <h1 class="text-3xl md:text-4xl font-extrabold text-[#1a4d33] tracking-tight">
                            {{ $location->name }}
                        </h1>
                        <div class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-bold shadow-sm"
                             style="background-color: {{ $location->category ? $location->category->color . '15' : '#f3f4f6' }}; color: {{ $location->category->color ?? '#374151' }}; border: 1px solid {{ $location->category->color ?? '#d1d5db' }}50;">
                            <span class="w-2.5 h-2.5 rounded-full mr-2" style="background-color: {{ $location->category->color ?? '#374151' }};"></span>
                            {{ $location->category->name ?? 'Uncategorized' }}
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="text-gray-600 leading-relaxed font-medium mb-10 whitespace-pre-line text-lg">
                        {{ $location->description ?? 'Tidak ada deskripsi yang tersedia untuk lokasi ini.' }}
                    </div>

                    <!-- Informasi Kunjungan Box -->
                    <div class="bg-[#fbfaf5] rounded-xl p-6 border border-[#e5e7eb]">
                        <h3 class="text-lg font-bold text-[#1a4d33] mb-4">Informasi Kunjungan</h3>
                        <div class="space-y-4">
                            <div class="flex items-start gap-4">
                                <div class="mt-0.5 text-[#deaf65]">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-gray-700 font-medium leading-relaxed">{{ $location->address ?? 'Alamat tidak tersedia' }}</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4">
                                <div class="mt-0.5 text-gray-500">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div>
                                    <p class="text-gray-700 font-medium">Buka setiap hari (07.00 - 17.00 WIB) <span class="text-xs text-gray-400 font-normal ml-1">*Contoh statis</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right Column: Map Widget & Actions -->
                <div class="lg:col-span-1">
                    <div class="sticky top-24">
                        
                        <!-- Map Widget -->
                        <div class="bg-white rounded-2xl shadow-sm border border-[#e5e7eb] p-2 mb-6">
                            <div id="detail-map" class="rounded-xl w-full border border-gray-100 bg-[#f0f0f0]"></div>
                            
                            <div class="p-4 space-y-3">
                                <a href="{{ route('home') }}#peta" class="block text-center w-full bg-[#1e583f] hover:bg-[#1a4d33] text-white font-bold py-3 px-4 rounded-lg shadow-sm transition-colors">
                                    Lihat di Peta Penuh
                                </a>
                                <a href="https://www.google.com/maps/dir/?api=1&destination={{ $location->latitude }},{{ $location->longitude }}" target="_blank" 
                                   class="block text-center w-full bg-white hover:bg-gray-50 text-[#1e583f] border border-[#1e583f] font-bold py-3 px-4 rounded-lg shadow-sm transition-colors">
                                    Buka di Google Maps
                                </a>
                            </div>
                        </div>

                        <!-- Share Widget -->
                        <div class="bg-white rounded-2xl shadow-sm border border-[#e5e7eb] p-6 mb-6">
                            <h3 class="text-sm font-bold text-gray-800 mb-4">Bagikan Lokasi</h3>
                            <div class="flex gap-3">
                                <button onclick="window.open('https://api.whatsapp.com/send?text=Lihat%20{{ urlencode($location->name) }}%20di%20Profil%20Dusun%20Dawung%20Wetan:%20{{ urlencode(url()->current()) }}', '_blank')" class="flex-1 bg-[#25D366] hover:bg-[#128C7E] text-white font-bold py-2 px-4 rounded-lg shadow-sm transition-colors flex items-center justify-center gap-2 text-sm">
                                    WhatsApp
                                </button>
                                <button onclick="navigator.clipboard.writeText('{{ url()->current() }}'); alert('Link disalin!');" class="flex-1 bg-white hover:bg-gray-50 text-gray-700 border border-gray-300 font-bold py-2 px-4 rounded-lg shadow-sm transition-colors flex items-center justify-center gap-2 text-sm">
                                    Salin Link
                                </button>
                            </div>
                        </div>

                        <a href="{{ route('home') }}#peta" class="inline-flex items-center text-gray-500 hover:text-gray-800 text-sm font-medium transition-colors">
                            &larr; Kembali ke Peta Interaktif
                        </a>

                    </div>
                </div>
            </div>

        </div>
    </main>

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
                        <li><a href="{{ route('home') }}" class="hover:text-[#deaf65] transition-colors flex items-center gap-2">🏠 Beranda</a></li>
                        <li><a href="{{ route('home') }}#peta" class="hover:text-[#deaf65] transition-colors flex items-center gap-2">🗺️ Peta Interaktif</a></li>
                        <li><a href="{{ route('home') }}#profil" class="hover:text-[#deaf65] transition-colors flex items-center gap-2">📖 Profil Desa</a></li>
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
            const lat = {{ $location->latitude }};
            const lng = {{ $location->longitude }};
            const color = '{{ $location->category->color ?? "#246343" }}';
            const name = '{{ addslashes($location->name) }}';

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

            const map = L.map('detail-map', {
                zoomControl: true,
                center: [lat, lng],
                zoom: 16,
                layers: [osmTile]
            });

            const baseMaps = {
                "Peta Dasar (OSM)": osmTile,
                "Peta Jalan (Google)": mapTile,
                "Peta Satelit": satelliteTile
            };

            L.control.layers(baseMaps).addTo(map);

            const svgIcon = `
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="40" height="50">
                    <path fill="${color}" stroke="#ffffff" stroke-width="15" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                    <circle cx="192" cy="192" r="60" fill="#ffffff"/>
                </svg>
            `;
            
            const customIcon = L.divIcon({
                className: 'custom-div-icon',
                html: `<div style="filter: drop-shadow(0px 4px 6px rgba(0,0,0,0.3));">${svgIcon}</div>`,
                iconSize: [40, 50],
                iconAnchor: [20, 50],
            });

            L.marker([lat, lng], { icon: customIcon }).addTo(map)
             .bindTooltip(name, {
                 permanent: true,
                 direction: 'top',
                 className: 'bg-white border-0 shadow-md text-xs font-bold px-3 py-1.5 rounded-lg mb-2 text-gray-800',
                 offset: [0, -50]
             });
        });
    </script>
</body>
</html>
