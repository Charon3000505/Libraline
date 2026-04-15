<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Daftar — Libraline</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,500,600,700|inter:300,400,500,600" rel="stylesheet" />

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'serif': ['Playfair Display', 'serif'],
                        'sans': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        'cream': '#FDFBF7',
                        'gold': '#A88964',
                        'dark': '#2C241B',
                        'muted': '#6B5D4F',
                    }
                }
            }
        }
    </script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, .font-serif { font-family: 'Playfair Display', serif; }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-cream via-[#F5EFE7] to-[#EDE4D9] antialiased">

    <div class="flex min-h-screen items-center justify-center px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md">
            {{-- Logo --}}
            <div class="text-center">
                <a href="{{ url('/') }}" class="inline-flex items-center justify-center space-x-2">
                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-gradient-to-br from-[#C4A77D] to-gold">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <span class="font-serif text-2xl font-bold tracking-tight text-dark">
                        Libraline
                    </span>
                </a>
                <h2 class="mt-6 font-serif text-3xl font-bold text-dark">Buat Akun Baru</h2>
                <p class="mt-2 text-sm text-muted">Bergabunglah dengan ribuan pembaca lainnya</p>
            </div>

            {{-- Form Card --}}
            <div class="mt-8 rounded-3xl border border-[#E8E0D5] bg-white/80 p-8 shadow-xl backdrop-blur-sm">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-dark">Nama Lengkap</label>
                        <div class="mt-2">
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name"
                                class="block w-full rounded-full border @error('name') border-red-300 @else border-[#E8E0D5] @enderror bg-cream px-5 py-3 text-sm text-dark placeholder-[#B8A692] shadow-sm transition focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold"
                                placeholder="Nama Anda">
                        </div>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mt-5">
                        <label for="email" class="block text-sm font-medium text-dark">Alamat Email</label>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username"
                                class="block w-full rounded-full border @error('email') border-red-300 @else border-[#E8E0D5] @enderror bg-cream px-5 py-3 text-sm text-dark placeholder-[#B8A692] shadow-sm transition focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold"
                                placeholder="nama@email.com">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mt-5">
                        <label for="password" class="block text-sm font-medium text-dark">Kata Sandi</label>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" required autocomplete="new-password"
                                class="block w-full rounded-full border @error('password') border-red-300 @else border-[#E8E0D5] @enderror bg-cream px-5 py-3 text-sm text-dark placeholder-[#B8A692] shadow-sm transition focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold"
                                placeholder="Minimal 8 karakter">
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mt-5">
                        <label for="password_confirmation" class="block text-sm font-medium text-dark">Konfirmasi Kata Sandi</label>
                        <div class="mt-2">
                            <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                                class="block w-full rounded-full border border-[#E8E0D5] bg-cream px-5 py-3 text-sm text-dark placeholder-[#B8A692] shadow-sm transition focus:border-gold focus:outline-none focus:ring-1 focus:ring-gold"
                                placeholder="Ulangi kata sandi">
                        </div>
                    </div>

                    {{-- Terms & Conditions --}}
                    <div class="mt-6">
                        <label class="flex items-start">
                            <input type="checkbox" name="terms" required
                                class="mt-0.5 h-4 w-4 rounded border-[#E8E0D5] text-gold focus:ring-gold">
                            <span class="ml-2 text-sm text-muted">
                                Saya setuju dengan
                                <a href="#" class="text-gold hover:underline">Syarat & Ketentuan</a>
                                dan
                                <a href="#" class="text-gold hover:underline">Kebijakan Privasi</a>
                            </span>
                        </label>
                        @error('terms')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="mt-6">
                        <button type="submit" class="w-full rounded-full bg-gold px-4 py-3 text-sm font-medium text-white shadow-sm transition hover:bg-[#8B7355] focus:outline-none focus:ring-2 focus:ring-gold focus:ring-offset-2">
                            Daftar Sekarang
                        </button>
                    </div>
                </form>

                {{-- Divider --}}
                <div class="relative mt-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-[#E8E0D5]"></div>
                    </div>
                    <div class="relative flex justify-center text-xs uppercase">
                        <span class="bg-white/80 px-3 text-muted">Sudah punya akun?</span>
                    </div>
                </div>

                {{-- Login Link --}}
                <div class="mt-6 text-center">
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-full border border-gold px-6 py-3 text-sm font-medium text-gold transition hover:bg-gold hover:text-white">
                        Masuk ke Akun
                    </a>
                </div>
            </div>

            {{-- Back to Home --}}
            <div class="mt-8 text-center">
                <a href="{{ url('/') }}" class="inline-flex items-center text-sm text-muted transition hover:text-gold">
                    <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

    {{-- Background Decoration --}}
    <div class="pointer-events-none fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -left-40 -top-40 h-80 w-80 rounded-full bg-[#C4A77D] opacity-5 blur-3xl"></div>
        <div class="absolute -bottom-40 -right-40 h-80 w-80 rounded-full bg-gold opacity-5 blur-3xl"></div>
    </div>
</body>
</html>
