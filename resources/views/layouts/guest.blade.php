<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Perpustakaan') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-700 min-h-screen">
    {{-- Background Pattern --}}
    <div class="fixed inset-0 opacity-10 pointer-events-none">
        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
            <defs>
                <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                    <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                </pattern>
            </defs>
            <rect width="100" height="100" fill="url(#grid)" />
        </svg>
    </div>

    {{-- Floating Decorations --}}
    <div class="fixed top-6 left-6 w-10 h-10 bg-white/10 rounded-lg rotate-12 hidden sm:block"></div>
    <div class="fixed bottom-12 left-12 w-8 h-8 bg-white/10 rounded-lg -rotate-6 hidden sm:block"></div>
    <div class="fixed top-16 right-10 w-12 h-12 bg-white/10 rounded-lg rotate-45 hidden md:block"></div>
    <div class="fixed bottom-20 right-16 w-8 h-8 bg-white/10 rounded rotate-12 hidden md:block"></div>
    
    {{-- Main Container --}}
    <div class="relative min-h-screen flex items-center justify-center p-3">
        <div class="w-full max-w-xs">
            {{-- Logo & Title --}}
            <div class="text-center mb-4">
                <div class="inline-flex items-center justify-center w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl mb-2">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                    </svg>
                </div>
                <h1 class="text-base font-bold text-white">Perpustakaan Digital</h1>
                <p class="text-[10px] text-white/70">Sistem Manajemen Perpustakaan</p>
            </div>

            {{-- Form Card --}}
            <div class="bg-white rounded-xl shadow-xl p-4">
                {{ $slot }}
            </div>

            {{-- Footer --}}
            <p class="mt-3 text-center text-[10px] text-white/60">
                &copy; {{ date('Y') }} Perpustakaan Digital
            </p>
        </div>
    </div>
</body>
</html>
