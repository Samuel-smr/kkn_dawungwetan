<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - SIASRI</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-[#fbfaf5] min-h-screen flex items-center justify-center p-4 selection:bg-[#deaf65] selection:text-white">

    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
        
        <!-- Header Section -->
        <div class="bg-[#1e583f] px-8 pt-10 pb-12 text-center relative overflow-hidden">
            <div class="relative z-10">
                <div class="w-16 h-16 bg-[#377b5a] rounded-2xl mx-auto flex items-center justify-center mb-4 shadow-inner">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-extrabold text-white tracking-tight">Portal Admin</h2>
                <p class="text-emerald-100/80 text-sm mt-2 font-medium">Sistem Informasi Dusun Dawung Wetan</p>
            </div>
            <!-- Decorative curve -->
            <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-[#377b5a] rounded-full mix-blend-multiply filter blur-2xl opacity-50"></div>
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-emerald-800 rounded-full mix-blend-multiply filter blur-2xl opacity-50"></div>
        </div>

        <!-- Form Section -->
        <div class="px-8 py-10 -mt-6 bg-white rounded-t-3xl relative z-20">
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 shadow-sm">
                    <ul class="list-disc pl-5 font-medium text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                <div>
                    <label class="block text-[#1a4d33] text-sm font-bold mb-2" for="username">Username Admin</label>
                    <input type="text" name="username" id="username" required autofocus
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#deaf65] focus:ring-2 focus:ring-[#deaf65]/20 outline-none transition-all text-[#1a4d33] bg-[#fbfaf5]" 
                        placeholder="admin">
                </div>

                <div>
                    <label class="block text-[#1a4d33] text-sm font-bold mb-2" for="password">Kata Sandi</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#deaf65] focus:ring-2 focus:ring-[#deaf65]/20 outline-none transition-all text-[#1a4d33] bg-[#fbfaf5]"
                        placeholder="••••••••">
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full bg-[#deaf65] hover:bg-[#c99a53] text-[#1e583f] font-bold py-3.5 px-4 rounded-xl shadow-md transition-all flex justify-center items-center gap-2">
                        <span>Masuk ke Dashboard</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
                
                <div class="text-center mt-6">
                    <a href="{{ route('home') }}" class="text-sm font-semibold text-gray-500 hover:text-[#1a4d33] transition-colors">&larr; Kembali ke Beranda Warga</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
