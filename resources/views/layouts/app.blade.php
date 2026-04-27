<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Perpustakaan') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased text-sm">
        <div x-data="{ sidebarOpen: false }" class="min-h-screen bg-gray-100">

            {{-- Mobile sidebar overlay --}}
            <div x-show="sidebarOpen"
                 x-transition:enter="transition-opacity ease-linear duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity ease-linear duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-40 bg-gray-600 bg-opacity-75 lg:hidden"
                 @click="sidebarOpen = false">
            </div>

            {{-- Sidebar - Mobile --}}
            <div x-show="sidebarOpen"
                 x-transition:enter="transition ease-in-out duration-300 transform"
                 x-transition:enter-start="-translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transition ease-in-out duration-300 transform"
                 x-transition:leave-start="translate-x-0"
                 x-transition:leave-end="-translate-x-full"
                 class="fixed inset-y-0 left-0 z-50 w-52 lg:hidden">
                @include('components.sidebar')
            </div>

            {{-- Sidebar - Desktop --}}
            <div class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-52">
                @include('components.sidebar')
            </div>

            {{-- Main content --}}
            <div class="lg:pl-52 flex flex-col min-h-screen">
                @include('components.navbar')

                <main class="flex-1 p-3">
                    {{ $slot }}
                </main>

                <footer class="bg-white border-t border-gray-200 py-2 px-3">
                    <p class="text-center text-gray-500 text-[10px]">
                        &copy; {{ date('Y') }} Perpustakaan. Laravel + Livewire.
                    </p>
                </footer>
            </div>
        </div>

        @livewireScripts
    </body>
</html>
