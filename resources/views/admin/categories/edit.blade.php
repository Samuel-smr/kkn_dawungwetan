<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori - Admin Profil Desa</title>
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
                        <a href="{{ route('admin.locations.index') }}" class="text-[#246343] hover:text-[#1a4d33] px-3 py-2 text-sm font-semibold transition-colors">Lokasi</a>
                        <a href="{{ route('admin.categories.index') }}" class="text-[#1a4d33] border-b-2 border-emerald-600 px-3 py-2 text-sm font-bold transition-colors">Kategori</a>
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
                <div>
                    <h2 class="text-3xl font-extrabold text-[#1a4d33] tracking-tight">Edit Kategori</h2>
                    <p class="text-[#246343] mt-1 font-medium">{{ $category->name }}</p>
                </div>
                <a href="{{ route('admin.categories.index') }}" class="text-amber-600 hover:text-amber-800 font-medium transition-colors border border-amber-200 px-4 py-2 rounded-xl hover:bg-[#fbfaf5]">Batal</a>
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
                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-5">
                        <label class="block text-[#1a4d33] text-sm font-bold mb-2">Nama Kategori</label>
                        <input type="text" name="name" value="{{ old('name', $category->name) }}" required class="appearance-none border border-emerald-200 rounded-xl w-full py-2.5 px-3 text-[#1a4d33] leading-tight focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all shadow-sm">
                    </div>

                    <div class="mb-8">
                        <label class="block text-[#1a4d33] text-sm font-bold mb-2">Warna Kategori (Untuk Peta)</label>
                        <div class="flex items-center gap-4">
                            <input type="color" name="color" value="{{ old('color', $category->color) }}" required class="h-12 w-24 p-1 rounded-lg border border-emerald-200 cursor-pointer shadow-sm">
                            <span class="text-xs text-[#246343] font-medium">Pilih warna yang akan menjadi penanda titik kategori ini di peta.</span>
                        </div>
                    </div>

                    <div class="flex justify-end pt-4 border-t border-gray-100">
                        <button type="submit" class="bg-gradient-to-r from-[#1e583f] to-[#246343] hover:from-[#1a4d33] hover:to-[#1e583f] text-white font-bold py-3 px-6 rounded-xl shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition-all">
                            Perbarui Kategori
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
