<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Perpustakaan' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="flex">
        @include('components.sidebar')
        
        <div class="flex-1 flex flex-col min-h-screen">
            @include('components.navbar')
            
            <main class="flex-1 p-6">
                <div class="flex flex-col items-center justify-center min-h-[60vh]">
                    <div class="bg-white rounded-xl shadow-md p-8 max-w-md w-full text-center">
                        <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $title ?? 'Halaman' }}</h2>
                        <p class="text-gray-600 mb-6">{{ $message ?? 'Halaman ini sedang dalam pengembangan.' }}</p>
                        
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 text-left mb-6">
                            <p class="text-sm text-yellow-800 font-medium">⚠️ Dalam Pengembangan</p>
                        </div>
                        
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                            ← Kembali ke Dashboard
                        </a>
                    </div>
                </div>
            </main>
            
            <footer class="bg-white border-t border-gray-200 py-4 px-6">
                <p class="text-center text-gray-500 text-sm">
                    &copy; {{ date('Y') }} Perpustakaan. Dibuat dengan Laravel + Livewire.
                </p>
            </footer>
        </div>
    </div>
    @livewireScripts
</body>
</html>
