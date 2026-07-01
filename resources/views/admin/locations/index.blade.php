<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Lokasi - Admin Profil Desa</title>
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
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700 font-semibold px-3 py-1.5 rounded-lg hover:bg-red-50 transition-colors">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-[#1a4d33] tracking-tight">Kelola Lokasi</h2>
                    <p class="text-[#246343] mt-1">Daftar semua titik pemetaan di desa.</p>
                </div>
                <a href="{{ route('admin.locations.create') }}" class="bg-gradient-to-r from-[#1e583f] to-[#246343] hover:from-[#1a4d33] hover:to-[#1e583f] text-white font-bold py-2.5 px-5 rounded-xl shadow-sm hover:shadow-md transition-all">
                    + Tambah Lokasi
                </a>
            </div>

            @if(session('success'))
                <div class="bg-[#f0f9f4] border border-emerald-200 text-[#1e583f] px-4 py-3 rounded-xl mb-6 font-medium shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <table class="min-w-full divide-y divide-emerald-100">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-[#1e583f] uppercase tracking-wider">No</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-[#1e583f] uppercase tracking-wider">Foto</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-[#1e583f] uppercase tracking-wider">Nama Lokasi</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-[#1e583f] uppercase tracking-wider">Kategori</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-[#1e583f] uppercase tracking-wider">Alamat</th>
                            <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-[#1e583f] uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-emerald-50">
                        @forelse($locations as $index => $location)
                            <tr class="hover:bg-[#fbfaf5]/30 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-[#1e583f]/60">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($location->image)
                                        <img src="{{ asset('storage/' . $location->image) }}" alt="Foto" class="h-12 w-12 rounded-lg object-cover shadow-sm border border-gray-100">
                                    @else
                                        <div class="h-12 w-12 rounded-lg bg-[#f0f9f4] border border-gray-200 flex items-center justify-center text-emerald-400 text-xs italic">Kosong</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-[#1a4d33]">{{ $location->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full bg-amber-100 text-[#1a4d33] border border-amber-200">
                                        {{ $location->category->name ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-[#246343] truncate max-w-xs font-medium">{{ $location->address }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-bold">
                                    <a href="{{ route('admin.locations.edit', $location->id) }}" class="text-amber-600 hover:text-amber-800 mr-4 transition-colors">Edit</a>
                                    <form action="{{ route('admin.locations.destroy', $location->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus lokasi ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition-colors">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 whitespace-nowrap text-sm text-center text-[#246343] font-medium">Belum ada data lokasi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-8">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center text-[#246343] hover:text-[#1e583f] font-semibold transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
    </main>

</body>
</html>
