<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profil Dusun Dawung Wetan</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            /* Subtly animated gradient background */
            background: linear-gradient(-45deg, #f3f4f6, #e5e7eb, #d1d5db, #f3f4f6);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        #map {
            height: 600px;
            z-index: 1; /* Keep map below fixed header if any */
        }
        
        /* Glassmorphism utilities */
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="antialiased text-gray-800">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 glass shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0 flex items-center">
                    <span class="font-bold text-xl text-emerald-700 tracking-tight">Dawung Wetan</span>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#beranda" class="text-gray-700 hover:text-emerald-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">Beranda</a>
                    <a href="#profil" class="text-gray-700 hover:text-emerald-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">Profil</a>
                    <a href="#peta" class="text-gray-700 hover:text-emerald-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">Peta Sebaran</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight text-gray-900 mb-6 drop-shadow-sm">
                Selamat Datang di <br/>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-teal-500">Dusun Dawung Wetan</span>
            </h1>
            <p class="mt-4 text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto mb-10">
                Desa Candi, Kecamatan Pringkuku, Kabupaten Pacitan. <br/>
                Jelajahi potensi UMKM, fasilitas umum, dan sekolah melalui peta interaktif kami.
            </p>
            <div class="flex justify-center gap-4">
                <a href="#peta" class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 px-8 rounded-full shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1">
                    Lihat Peta
                </a>
                <a href="#profil" class="bg-white hover:bg-gray-50 text-gray-800 font-semibold py-3 px-8 rounded-full shadow-md hover:shadow-lg transition-all border border-gray-200">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
        
        <!-- Decorative blobs -->
        <div class="absolute top-0 left-1/4 w-72 h-72 bg-emerald-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute top-0 right-1/4 w-72 h-72 bg-teal-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-1/3 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>
    </section>

    <!-- Profile Section -->
    <section id="profil" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Profil Singkat</h2>
                <div class="w-24 h-1 bg-emerald-500 mx-auto mt-4 rounded-full"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                    <div class="w-14 h-14 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mb-6 text-2xl">
                        🏪
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Potensi UMKM</h3>
                    <p class="text-gray-600">Dusun Dawung Wetan memiliki berbagai potensi Usaha Mikro, Kecil, dan Menengah (UMKM) yang mendukung perekonomian warga lokal.</p>
                </div>
                
                <div class="bg-gray-50 rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                    <div class="w-14 h-14 bg-teal-100 text-teal-600 rounded-xl flex items-center justify-center mb-6 text-2xl">
                        🏥
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Fasilitas Umum</h3>
                    <p class="text-gray-600">Tersedia berbagai fasilitas umum seperti tempat ibadah, balai pertemuan, dan infrastruktur penunjang lainnya.</p>
                </div>
                
                <div class="bg-gray-50 rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                    <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6 text-2xl">
                        🏫
                    </div>
                    <h3 class="text-xl font-semibold mb-3">Pendidikan</h3>
                    <p class="text-gray-600">Fasilitas pendidikan yang memadai untuk memastikan generasi penerus mendapatkan akses belajar yang baik.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section id="peta" class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-10">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Peta Sebaran</h2>
                    <p class="text-gray-600 mt-2">Peta lokasi UMKM, Fashum, dan Sekolah di Dusun Dawung Wetan.</p>
                </div>
                
                <!-- Legend -->
                <div class="mt-6 md:mt-0 glass px-6 py-3 rounded-xl flex flex-wrap gap-4 shadow-sm">
                    @foreach($categories as $category)
                    <div class="flex items-center gap-2">
                        <span class="w-4 h-4 rounded-full shadow-inner" style="background-color: {{ $category->color }};"></span>
                        <span class="text-sm font-medium">{{ $category->name }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Map Container -->
            <div class="bg-white rounded-3xl shadow-2xl p-2 border border-gray-100 relative overflow-hidden">
                <div id="map" class="rounded-2xl w-full"></div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h3 class="text-2xl font-bold text-emerald-400 mb-4">Dusun Dawung Wetan</h3>
            <p class="text-gray-400 mb-8 max-w-2xl mx-auto">
                Desa Candi, Kecamatan Pringkuku, Kabupaten Pacitan, Jawa Timur.<br/>
                Dibuat untuk memudahkan masyarakat dan pengunjung mengakses informasi lokal.
            </p>
            <div class="text-gray-500 text-sm border-t border-gray-800 pt-8">
                &copy; {{ date('Y') }} KKN Dusun Dawung Wetan. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data from Laravel
            const locationsData = @json($locations);
            
            // Initialize map (centering roughly on Pacitan / Candi area)
            // If we have locations, center on the first one, else default to -8.2230, 111.0240
            let initialLat = -8.2230;
            let initialLng = 111.0240;
            
            if (locationsData.length > 0) {
                initialLat = locationsData[0].latitude;
                initialLng = locationsData[0].longitude;
            }

            const map = L.map('map').setView([initialLat, initialLng], 15);

            // Add OpenStreetMap tiles
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // Custom Marker Icon SVG Generator based on color
            function getMarkerIcon(color) {
                const svgIcon = `
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="30" height="40">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="${color}" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                    </svg>
                `;
                
                return L.divIcon({
                    className: 'custom-div-icon',
                    html: `<div style="filter: drop-shadow(0px 4px 6px rgba(0,0,0,0.3)); cursor:pointer; transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">${svgIcon}</div>`,
                    iconSize: [30, 40],
                    iconAnchor: [15, 40],
                    popupAnchor: [0, -40]
                });
            }

            // Add markers
            const bounds = [];
            locationsData.forEach(loc => {
                if (loc.latitude && loc.longitude) {
                    const color = loc.category ? loc.category.color : '#3b82f6';
                    const marker = L.marker([loc.latitude, loc.longitude], {
                        icon: getMarkerIcon(color)
                    }).addTo(map);
                    
                    bounds.push([loc.latitude, loc.longitude]);

                    // Popup Content
                    const popupContent = `
                        <div class="p-2 min-w-[200px]">
                            <div class="text-xs font-bold px-2 py-1 rounded-full text-white inline-block mb-2 shadow-sm" style="background-color: ${color}">
                                ${loc.category ? loc.category.name : 'Uncategorized'}
                            </div>
                            <h3 class="font-bold text-lg text-gray-900 mb-1 leading-tight">${loc.name}</h3>
                            <p class="text-sm text-gray-600 mb-2 leading-relaxed">${loc.description || 'Tidak ada deskripsi'}</p>
                            <div class="text-xs text-gray-500 border-t pt-2 mt-2 flex items-start gap-1">
                                📍 ${loc.address || 'Alamat tidak tersedia'}
                            </div>
                        </div>
                    `;
                    marker.bindPopup(popupContent, {
                        maxWidth: 300,
                        className: 'custom-popup'
                    });
                }
            });

            // Fit map to show all markers if any exist
            if (bounds.length > 0) {
                map.fitBounds(bounds, { padding: [50, 50] });
            }
        });
    </script>
</body>
</html>
