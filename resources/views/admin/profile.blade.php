<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin - Profil Desa Dawung Wetan</title>
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

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 max-w-2xl mx-auto">
                <h2 class="text-3xl font-extrabold mb-2 text-[#1a4d33] tracking-tight">Profil & Ganti Password</h2>
                <p class="text-gray-500 mb-8">Ubah password akun admin Anda di bawah ini.</p>
                
                @if (session('success'))
                    <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-700 p-4 mb-6 rounded-r-lg" role="alert">
                        <p class="font-medium">{{ session('success') }}</p>
                    </div>
                @endif
                
                <form action="{{ route('admin.password.update') }}" method="POST">
                    @csrf
                    
                    <div class="mb-6">
                        <label for="username" class="block text-sm font-bold text-gray-700 mb-2">Username</label>
                        <input type="text" name="username" id="username" value="{{ old('username', Auth::user()->username) }}" class="w-full px-4 py-3 rounded-xl border {{ $errors->has('username') ? 'border-red-300 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 focus:ring-[#377b5a] focus:border-[#377b5a]' }} transition-colors" required>
                        @error('username')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block text-sm font-bold text-gray-700 mb-2">Password Baru <span class="text-gray-400 font-normal">(opsional, isi jika ingin diganti)</span></label>
                        <input type="password" name="password" id="password" class="w-full px-4 py-3 rounded-xl border {{ $errors->has('password') ? 'border-red-300 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 focus:ring-[#377b5a] focus:border-[#377b5a]' }} transition-colors">
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-8">
                        <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-2">Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-[#377b5a] focus:border-[#377b5a] transition-colors">
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-[#1e583f] hover:bg-[#1a4d33] text-white font-bold py-3 px-6 rounded-xl shadow-sm transition-colors">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

</body>
</html>
