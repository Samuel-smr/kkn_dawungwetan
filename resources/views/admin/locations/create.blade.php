<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lokasi - Admin Profil Desa</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('storage/logo.jpeg') }}?v={{ time() }}">
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
    <nav class="bg-[#1e583f] shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center gap-6">
                    <a href="{{ route('dashboard') }}" class="text-xl font-extrabold text-white tracking-tight hover:text-[#deaf65] transition-colors">Dawung Wetan <span class="text-[#deaf65]">Admin</span></a>
                    
                    <div class="hidden md:flex space-x-1 items-center h-full pt-1">
                        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'text-white border-b-2 border-[#deaf65]' : 'text-emerald-100/80 hover:text-white hover:bg-white/10 rounded-t-sm' }} px-3 py-2 text-sm font-semibold transition-colors h-full flex items-center">Dashboard</a>
                        <a href="{{ route('admin.locations.index') }}" class="{{ request()->routeIs('admin.locations.*') ? 'text-white border-b-2 border-[#deaf65]' : 'text-emerald-100/80 hover:text-white hover:bg-white/10 rounded-t-sm' }} px-3 py-2 text-sm font-semibold transition-colors h-full flex items-center">Lokasi</a>
                        <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'text-white border-b-2 border-[#deaf65]' : 'text-emerald-100/80 hover:text-white hover:bg-white/10 rounded-t-sm' }} px-3 py-2 text-sm font-semibold transition-colors h-full flex items-center">Kategori</a>
                        <a href="{{ route('admin.profile') }}" class="{{ request()->routeIs('admin.profile') ? 'text-white border-b-2 border-[#deaf65]' : 'text-emerald-100/80 hover:text-white hover:bg-white/10 rounded-t-sm' }} px-3 py-2 text-sm font-semibold transition-colors h-full flex items-center">Profil</a>
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="text-emerald-100/90 font-medium mr-6">Halo, {{ Auth::user()->username ?? 'Admin' }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="text-[#ff8a8a] hover:text-[#ffb3b3] font-semibold px-3 py-1.5 rounded-lg hover:bg-white/10 transition-colors">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto py-8 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="mb-8 flex items-center justify-between">
                <h2 class="text-3xl font-extrabold text-[#1a4d33] tracking-tight">Tambah Lokasi Baru</h2>
                <a href="{{ route('admin.locations.index') }}" class="text-amber-600 hover:text-amber-800 font-medium transition-colors border border-amber-200 px-4 py-2 rounded-xl hover:bg-[#fbfaf5]">Batal</a>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 shadow-sm">
                    <ul class="list-disc pl-5 font-medium">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
                <form action="{{ route('admin.locations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-5">
                        <label class="block text-[#1a4d33] text-sm font-bold mb-2">Nama Lokasi</label>
                        <input type="text" name="name" value="{{ old('name') }}" required class="appearance-none border border-emerald-200 rounded-xl w-full py-2.5 px-3 text-[#1a4d33] leading-tight focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm">
                    </div>

                    <div class="mb-5">
                        <label class="block text-[#1a4d33] text-sm font-bold mb-2">Kategori</label>
                        <select name="category_id" required class="appearance-none border border-emerald-200 rounded-xl w-full py-2.5 px-3 text-[#1a4d33] leading-tight focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm bg-white">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-5">
                        <label class="block text-[#1a4d33] text-sm font-bold mb-2">Deskripsi</label>
                        <textarea name="description" rows="4" required class="appearance-none border border-emerald-200 rounded-xl w-full py-2.5 px-3 text-[#1a4d33] leading-tight focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-5">
                        <label class="block text-[#1a4d33] text-sm font-bold mb-2">Alamat Lengkap</label>
                        <textarea name="address" rows="2" required class="appearance-none border border-emerald-200 rounded-xl w-full py-2.5 px-3 text-[#1a4d33] leading-tight focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm">{{ old('address') }}</textarea>
                    </div>

                    <div class="mb-5">
                        <label class="block text-[#1a4d33] text-sm font-bold mb-2">Nomor HP/WA (Opsional)</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="appearance-none border border-emerald-200 rounded-xl w-full py-2.5 px-3 text-[#1a4d33] leading-tight focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm" placeholder="Contoh: 628123456789">
                        <p class="text-xs text-[#246343]/70 mt-1 font-medium">Gunakan format 628... agar tombol WA berfungsi langsung</p>
                    </div>

                    <div class="grid grid-cols-2 gap-5 mb-5">
                        <div>
                            <label class="block text-[#1a4d33] text-sm font-bold mb-2">Latitude</label>
                            <input type="text" name="latitude" value="{{ old('latitude') }}" required class="appearance-none border border-emerald-200 rounded-xl w-full py-2.5 px-3 text-[#1a4d33] leading-tight focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm" placeholder="Contoh: -7.123456">
                        </div>
                        <div>
                            <label class="block text-[#1a4d33] text-sm font-bold mb-2">Longitude</label>
                            <input type="text" name="longitude" value="{{ old('longitude') }}" required class="appearance-none border border-emerald-200 rounded-xl w-full py-2.5 px-3 text-[#1a4d33] leading-tight focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm" placeholder="Contoh: 110.123456">
                        </div>
                    </div>

                    <div class="mb-8">
                        <label class="block text-[#1a4d33] text-sm font-bold mb-2">Foto (Opsional)</label>
                        <input type="file" name="image" accept="image/*" class="appearance-none border border-emerald-200 rounded-xl w-full py-2 px-3 text-[#1a4d33] leading-tight focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-[#f0f9f4] file:text-[#246343] hover:file:bg-emerald-100 cursor-pointer">
                        <p class="text-xs text-[#246343]/70 mt-2 font-medium">Maksimal ukuran 2MB (JPG, PNG)</p>
                    </div>

                    <div class="flex justify-end pt-4 border-t border-gray-100">
                        <button type="submit" class="bg-gradient-to-r from-[#1e583f] to-[#246343] hover:from-[#1a4d33] hover:to-[#1e583f] text-white font-bold py-3 px-6 rounded-xl shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition-all">
                            Simpan Lokasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
