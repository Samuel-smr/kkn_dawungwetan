<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lokasi - Admin Profil Desa</title>
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
                    <a href="{{ route('dashboard') }}" class="text-xl font-extrabold text-[#1a4d33] tracking-tight hover:text-[#246343] transition-colors">Dawung Wetan <span class="text-[#246343]">Admin</span></a>
                    
                    <div class="hidden md:flex space-x-4">
                        <a href="{{ route('dashboard') }}" class="text-[#246343] hover:text-[#1a4d33] px-3 py-2 text-sm font-semibold transition-colors">Dashboard</a>
                        <a href="{{ route('admin.locations.index') }}" class="text-[#1a4d33] border-b-2 border-emerald-600 px-3 py-2 text-sm font-bold transition-colors">Lokasi</a>
                        <a href="{{ route('admin.categories.index') }}" class="text-[#246343] hover:text-[#1a4d33] px-3 py-2 text-sm font-semibold transition-colors">Kategori</a>
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="text-[#246343] font-medium mr-6">Halo, {{ Auth::user()->name ?? 'Admin' }}</span>
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
