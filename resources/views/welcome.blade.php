<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotheca Alexandrina - Gerbang Pengetahuan Digital</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cinzel:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])

    <style>
        .font-serif {
            font-family: 'Cormorant Garamond', 'Georgia', 'Times New Roman', serif;
        }
        .font-cinzel {
            font-family: 'Cinzel', 'Georgia', serif;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes floatSlow {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-float {
            animation: floatSlow 4s ease-in-out infinite;
        }

        .animate-shimmer {
            background: linear-gradient(90deg, transparent, rgba(212, 175, 55, 0.15), transparent);
            background-size: 200% 100%;
            animation: shimmer 3s infinite;
        }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }

        .text-shadow-gold {
            text-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
        }

        .pillar-shadow {
            box-shadow: 0 20px 60px rgba(45, 27, 78, 0.15), 0 0 0 1px rgba(212, 175, 55, 0.1);
        }
    </style>
</head>
<body class="bg-[#F5F0E8] antialiased">

    <!-- ========== NAVIGATION ========== -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-[#F5F0E8]/95 backdrop-blur-sm border-b-2 border-[#D4AF37]/20 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                {{-- Logo --}}
                <div class="flex items-center space-x-2">
                    <div class="w-9 h-9 bg-gradient-to-br from-[#D4AF37] to-[#B4941E] rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-5 h-5 text-[#2D1B4E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <span class="text-lg font-cinzel font-bold text-[#2D1B4E] tracking-wider hidden sm:block">
                        Bibliotheca Alexandrina
                    </span>
                </div>

                {{-- Nav Links --}}
                    <a href="{{ route('login') }}"
                       class="px-5 py-2 text-sm font-serif font-bold text-[#2D1B4E] bg-gradient-to-r from-[#D4AF37] to-[#B4941E] rounded-lg hover:shadow-lg hover:shadow-[#D4AF37]/30 transform hover:-translate-y-0.5 transition-all">
                        Enter Library
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- ========== HERO SECTION ========== -->
    <section class="relative min-h-screen flex items-center pt-16 overflow-hidden">
        {{-- Background Pattern --}}
        <div class="absolute inset-0 opacity-[0.03]">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M30 5 L55 30 L30 55 L5 30 Z" fill="none" stroke="%23D4AF37" stroke-width="0.5"/%3E%3C/svg%3E')]"></div>
        </div>

        {{-- Decorative Elements --}}
        <div class="absolute top-20 left-10 text-[#D4AF37]/10 text-9xl font-cinzel font-bold select-none">A</div>
        <div class="absolute bottom-20 right-10 text-[#D4AF37]/10 text-9xl font-cinzel font-bold select-none">Ω</div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid lg:grid-cols-2 gap-12 items-center">

                {{-- Left Content --}}
                <div class="text-center lg:text-left">
                    {{-- Subtle Label --}}
                    <div class="inline-flex items-center space-x-2 px-4 py-1.5 bg-[#D4AF37]/10 border border-[#D4AF37]/20 rounded-full mb-6 animate-fadeInUp">
                        <span class="text-[#D4AF37] text-sm">⚜️</span>
                        <span class="text-xs font-serif text-[#D4AF37] tracking-wider">THE GREAT LIBRARY</span>
                        <span class="text-[#D4AF37] text-sm">⚜️</span>
                    </div>

                    {{-- Main Title --}}
                    <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-cinzel font-bold text-[#2D1B4E] leading-tight mb-6 animate-fadeInUp delay-100 text-shadow-gold">
                        Bibliotheca<br>
                        <span class="bg-gradient-to-r from-[#D4AF37] via-[#E5C158] to-[#B4941E] bg-clip-text text-transparent">
                            Alexandrina
                        </span>
                    </h1>

                    {{-- Subtitle --}}
                    <p class="text-lg sm:text-xl text-[#5C4B3A] font-serif italic mb-8 animate-fadeInUp delay-200 leading-relaxed">
                        "Gerbang pengetahuan digital — tempat para pencari kebijaksanaan menemukan cahaya ilmu dari ribuan manuskrip kuno hingga modern."
                    </p>

                    {{-- Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start animate-fadeInUp delay-300">
                        <a href="{{ route('login') }}"
                           class="group inline-flex items-center justify-center px-8 py-3.5 bg-gradient-to-r from-[#2D1B4E] to-[#4A3568] text-[#D4AF37] font-serif font-bold text-lg rounded-lg border-2 border-[#D4AF37]/40 hover:border-[#D4AF37] transition-all duration-500 hover:shadow-2xl hover:shadow-[#D4AF37]/30 transform hover:-translate-y-1">
                            <span>📜 Enter Library</span>
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>

                        <a href="{{ route('books') }}"
                           class="inline-flex items-center justify-center px-8 py-3.5 bg-[#FAF8F5] text-[#2D1B4E] font-serif font-bold text-lg rounded-lg border-2 border-[#D4AF37]/30 hover:border-[#D4AF37] hover:bg-[#D4AF37]/5 transition-all duration-500 hover:shadow-xl transform hover:-translate-y-1">
                            <span>📚 Browse Collection</span>
                        </a>
                    </div>

                    {{-- Stats Mini --}}
                    <div class="flex justify-center lg:justify-start gap-8 mt-10 animate-fadeInUp delay-400">
                        <div class="text-center">
                            <p class="text-2xl font-cinzel font-bold text-[#D4AF37]">10,000+</p>
                            <p class="text-xs font-serif text-[#5C4B3A]">Manuscripts</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-cinzel font-bold text-[#D4AF37]">5,000+</p>
                            <p class="text-xs font-serif text-[#5C4B3A]">Scholars</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-cinzel font-bold text-[#D4AF37]">24/7</p>
                            <p class="text-xs font-serif text-[#5C4B3A]">Access</p>
                        </div>
                    </div>
                </div>

                {{-- Right Visual --}}
                <div class="hidden lg:flex justify-center items-center animate-fadeInUp delay-300">
                    <div class="relative">
                        {{-- Main Building Icon --}}
                        <div class="w-80 h-96 relative animate-float">
                            {{-- Temple Structure --}}
                            <div class="absolute inset-0 flex flex-col items-center justify-center">
                                {{-- Pediment (Triangle Top) --}}
                                <div class="w-64 h-0 border-l-[128px] border-r-[128px] border-b-[80px] border-l-transparent border-r-transparent border-b-[#D4AF37]/20 mb-0"></div>

                                {{-- Columns Area --}}
                                <div class="flex space-x-4">
                                    @for($i = 0; $i < 6; $i++)
                                        <div class="w-6 h-40 bg-gradient-to-b from-[#D4AF37]/20 to-[#D4AF37]/5 rounded-t-lg"></div>
                                    @endfor
                                </div>

                                {{-- Base --}}
                                <div class="w-72 h-4 bg-[#D4AF37]/20 rounded-b-lg"></div>
                            </div>

                            {{-- Floating Books --}}
                            <div class="absolute -top-4 -right-4 w-16 h-20 bg-gradient-to-br from-[#D4AF37] to-[#B4941E] rounded-sm shadow-xl transform rotate-12 animate-float opacity-80"></div>
                            <div class="absolute top-10 -left-8 w-14 h-18 bg-gradient-to-br from-[#2D1B4E] to-[#4A3568] rounded-sm shadow-xl transform -rotate-6 animate-float opacity-80" style="animation-delay: 1s;"></div>

                            {{-- Glow Orbs --}}
                            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-60 h-60 bg-[#D4AF37]/10 rounded-full blur-3xl"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Scroll Indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center animate-fadeInUp delay-500">
            <span class="text-[10px] font-serif text-[#C4A882] uppercase tracking-widest mb-2">Scroll</span>
            <div class="w-5 h-8 border-2 border-[#D4AF37]/30 rounded-full flex justify-center">
                <div class="w-1.5 h-1.5 bg-[#D4AF37] rounded-full mt-1.5 animate-bounce"></div>
            </div>
        </div>
    </section>

    {{-- Divider --}}
    <div class="flex items-center justify-center py-4">
        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-[#D4AF37]/30 to-transparent"></div>
        <div class="px-4 text-[#D4AF37] text-xl">⚜️</div>
        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-[#D4AF37]/30 to-transparent"></div>
    </div>

    <!-- ========== FEATURES SECTION ========== -->
    <section id="features" class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            {{-- Section Header --}}
            <div class="text-center mb-16">
                <span class="text-[#D4AF37] text-sm font-cinzel tracking-widest uppercase">Pillars of Knowledge</span>
                <h2 class="text-4xl sm:text-5xl font-cinzel font-bold text-[#2D1B4E] mt-3 mb-4">
                    Sacred Features
                </h2>
                <p class="text-lg text-[#5C4B3A] font-serif italic max-w-2xl mx-auto">
                    Built with the wisdom of ancient scholars, designed for modern seekers
                </p>
            </div>

            {{-- Features Grid --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">

                {{-- Feature 1: Borrow Books --}}
                <div class="group relative bg-gradient-to-br from-[#FAF8F5] to-[#F0EAE0] rounded-lg p-8 border-2 border-[#D4AF37]/20 hover:border-[#D4AF37]/50 transition-all duration-500 hover:shadow-2xl hover:shadow-[#D4AF37]/20 pillar-shadow">
                    <div class="absolute top-0 left-0 w-8 h-8 border-t-2 border-l-2 border-[#D4AF37]/30 rounded-tl-lg"></div>
                    <div class="absolute top-0 right-0 w-8 h-8 border-t-2 border-r-2 border-[#D4AF37]/30 rounded-tr-lg"></div>
                    <div class="absolute bottom-0 left-0 w-8 h-8 border-b-2 border-l-2 border-[#D4AF37]/30 rounded-bl-lg"></div>
                    <div class="absolute bottom-0 right-0 w-8 h-8 border-b-2 border-r-2 border-[#D4AF37]/30 rounded-br-lg"></div>

                    <div class="relative">
                        <div class="w-14 h-14 bg-gradient-to-br from-[#D4AF37]/20 to-[#B4941E]/20 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-cinzel font-bold text-[#2D1B4E] mb-3">Borrow Manuscripts</h3>
                        <p class="text-sm text-[#5C4B3A] font-serif leading-relaxed">
                            Borrow sacred texts with ease. Track due dates and never lose a scroll.
                        </p>
                    </div>
                </div>

                {{-- Feature 2: Manage Collection --}}
                <div class="group relative bg-gradient-to-br from-[#FAF8F5] to-[#F0EAE0] rounded-lg p-8 border-2 border-[#D4AF37]/20 hover:border-[#D4AF37]/50 transition-all duration-500 hover:shadow-2xl hover:shadow-[#D4AF37]/20 pillar-shadow">
                    <div class="absolute top-0 left-0 w-8 h-8 border-t-2 border-l-2 border-[#D4AF37]/30 rounded-tl-lg"></div>
                    <div class="absolute top-0 right-0 w-8 h-8 border-t-2 border-r-2 border-[#D4AF37]/30 rounded-tr-lg"></div>
                    <div class="absolute bottom-0 left-0 w-8 h-8 border-b-2 border-l-2 border-[#D4AF37]/30 rounded-bl-lg"></div>
                    <div class="absolute bottom-0 right-0 w-8 h-8 border-b-2 border-r-2 border-[#D4AF37]/30 rounded-br-lg"></div>

                    <div class="relative">
                        <div class="w-14 h-14 bg-gradient-to-br from-[#D4AF37]/20 to-[#B4941E]/20 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-cinzel font-bold text-[#2D1B4E] mb-3">Rich Collection</h3>
                        <p class="text-sm text-[#5C4B3A] font-serif leading-relaxed">
                            Explore thousands of manuscripts across various categories and eras.
                        </p>
                    </div>
                </div>

                {{-- Feature 3: Admin System --}}
                <div class="group relative bg-gradient-to-br from-[#FAF8F5] to-[#F0EAE0] rounded-lg p-8 border-2 border-[#D4AF37]/20 hover:border-[#D4AF37]/50 transition-all duration-500 hover:shadow-2xl hover:shadow-[#D4AF37]/20 pillar-shadow">
                    <div class="absolute top-0 left-0 w-8 h-8 border-t-2 border-l-2 border-[#D4AF37]/30 rounded-tl-lg"></div>
                    <div class="absolute top-0 right-0 w-8 h-8 border-t-2 border-r-2 border-[#D4AF37]/30 rounded-tr-lg"></div>
                    <div class="absolute bottom-0 left-0 w-8 h-8 border-b-2 border-l-2 border-[#D4AF37]/30 rounded-bl-lg"></div>
                    <div class="absolute bottom-0 right-0 w-8 h-8 border-b-2 border-r-2 border-[#D4AF37]/30 rounded-br-lg"></div>

                    <div class="relative">
                        <div class="w-14 h-14 bg-gradient-to-br from-[#D4AF37]/20 to-[#B4941E]/20 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-cinzel font-bold text-[#2D1B4E] mb-3">Royal Admin</h3>
                        <p class="text-sm text-[#5C4B3A] font-serif leading-relaxed">
                            Complete control for librarians. Manage users, books, and loans.
                        </p>
                    </div>
                </div>

                {{-- Feature 4: Elegant UI --}}
                <div class="group relative bg-gradient-to-br from-[#FAF8F5] to-[#F0EAE0] rounded-lg p-8 border-2 border-[#D4AF37]/20 hover:border-[#D4AF37]/50 transition-all duration-500 hover:shadow-2xl hover:shadow-[#D4AF37]/20 pillar-shadow">
                    <div class="absolute top-0 left-0 w-8 h-8 border-t-2 border-l-2 border-[#D4AF37]/30 rounded-tl-lg"></div>
                    <div class="absolute top-0 right-0 w-8 h-8 border-t-2 border-r-2 border-[#D4AF37]/30 rounded-tr-lg"></div>
                    <div class="absolute bottom-0 left-0 w-8 h-8 border-b-2 border-l-2 border-[#D4AF37]/30 rounded-bl-lg"></div>
                    <div class="absolute bottom-0 right-0 w-8 h-8 border-b-2 border-r-2 border-[#D4AF37]/30 rounded-br-lg"></div>

                    <div class="relative">
                        <div class="w-14 h-14 bg-gradient-to-br from-[#D4AF37]/20 to-[#B4941E]/20 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7 text-[#D4AF37]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-cinzel font-bold text-[#2D1B4E] mb-3">Classical Design</h3>
                        <p class="text-sm text-[#5C4B3A] font-serif leading-relaxed">
                            Experience a UI inspired by ancient Greek architecture and manuscripts.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Divider --}}
    <div class="flex items-center justify-center py-4">
        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-[#D4AF37]/30 to-transparent"></div>
        <div class="px-4 text-[#2D1B4E] text-xl font-serif">📜</div>
        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-[#D4AF37]/30 to-transparent"></div>
    </div>

    <!-- ========== BOOK SHOWCASE SECTION ========== -->
    <section id="collection" class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            {{-- Section Header --}}
            <div class="text-center mb-16">
                <span class="text-[#D4AF37] text-sm font-cinzel tracking-widest uppercase">Curated Scrolls</span>
                <h2 class="text-4xl sm:text-5xl font-cinzel font-bold text-[#2D1B4E] mt-3 mb-4">
                    Featured Manuscripts
                </h2>
                <p class="text-lg text-[#5C4B3A] font-serif italic max-w-2xl mx-auto">
                    A glimpse into our vast collection of wisdom
                </p>
            </div>

            {{-- Book Cards Grid --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6">

                @php
                    $dummyBooks = [
                        ['title' => 'The Republic', 'author' => 'Plato', 'cover' => 'https://covers.openlibrary.org/b/id/12819862-L.jpg', 'category' => 'Philosophy'],
                        ['title' => 'The Iliad', 'author' => 'Homer', 'cover' => 'https://covers.openlibrary.org/b/id/13549079-L.jpg', 'category' => 'Epic Poetry'],
                        ['title' => 'Elements', 'author' => 'Euclid', 'cover' => 'https://covers.openlibrary.org/b/id/143648-L.jpg', 'category' => 'Mathematics'],
                        ['title' => 'Histories', 'author' => 'Herodotus', 'cover' => 'https://covers.openlibrary.org/b/id/10961842-L.jpg', 'category' => 'History'],
                        ['title' => 'Poetics', 'author' => 'Aristotle', 'cover' => 'https://covers.openlibrary.org/b/id/8103249-L.jpg', 'category' => 'Literature'],
                    ];
                @endphp

                @foreach($dummyBooks as $book)
                    <div class="group">
                        {{-- Book Card --}}
                        <div class="relative bg-white rounded-lg shadow-lg overflow-hidden border-2 border-[#D4AF37]/20 hover:border-[#D4AF37]/50 transition-all duration-500 hover:shadow-2xl hover:shadow-[#D4AF37]/20 transform hover:-translate-y-2">
                            {{-- Cover Image --}}
                            <div class="relative aspect-[2/3] overflow-hidden bg-gradient-to-br from-[#D4AF37]/10 to-[#2D1B4E]/10">
                                <img src="{{ $book['cover'] }}"
                                     alt="{{ $book['title'] }}"
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                     loading="lazy"
                                     onerror="this.src='https://via.placeholder.com/200x300/D4AF37/2D1B4E?text=No+Cover';">

                                {{-- Overlay on hover --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-[#2D1B4E]/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-3">
                                    <span class="text-[#D4AF37] text-xs font-serif font-bold">View Details</span>
                                </div>

                                {{-- Category Badge --}}
                                <div class="absolute top-2 right-2">
                                    <span class="px-2 py-0.5 text-[10px] font-serif bg-[#2D1B4E]/80 text-[#D4AF37] rounded-full border border-[#D4AF37]/30">
                                        {{ $book['category'] }}
                                    </span>
                                </div>
                            </div>

                            {{-- Book Info --}}
                            <div class="p-3">
                                <h4 class="font-serif font-bold text-[#2D1B4E] text-sm leading-tight group-hover:text-[#D4AF37] transition-colors truncate">
                                    {{ $book['title'] }}
                                </h4>
                                <p class="text-xs text-[#C4A882] font-serif italic mt-1">
                                    {{ $book['author'] }}
                                </p>
                            </div>

                            {{-- Spine effect --}}
                            <div class="absolute left-0 top-2 bottom-2 w-[3px] bg-gradient-to-r from-[#D4AF37]/40 to-transparent"></div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- View All Button --}}
            <div class="text-center mt-12">
                <a href="{{ route('books') }}"
                   class="inline-flex items-center px-8 py-3.5 bg-gradient-to-r from-[#2D1B4E] to-[#4A3568] text-[#D4AF37] font-serif font-bold text-lg rounded-lg border-2 border-[#D4AF37]/40 hover:border-[#D4AF37] transition-all duration-500 hover:shadow-2xl hover:shadow-[#D4AF37]/30 transform hover:-translate-y-1">
                    <span>📚 Explore Full Collection</span>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Divider --}}
    <div class="flex items-center justify-center py-4">
        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-[#D4AF37]/30 to-transparent"></div>
        <div class="px-4 text-[#D4AF37] text-2xl">🏛️</div>
        <div class="flex-1 h-px bg-gradient-to-r from-transparent via-[#D4AF37]/30 to-transparent"></div>
    </div>

    <!-- ========== CTA SECTION ========== -->
    <section class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <div class="relative bg-gradient-to-br from-[#2D1B4E] via-[#3D2B5E] to-[#1a0f2e] rounded-2xl p-10 sm:p-16 text-center border-2 border-[#D4AF37]/40 shadow-2xl overflow-hidden">

                {{-- Background Pattern --}}
                <div class="absolute inset-0 opacity-5">
                    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="40" height="40" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M0 20 L10 20 L10 10 L20 10 L20 20 L30 20 L30 10 L40 10 L40 20 L40 30 L30 30 L30 20 L20 20 L20 30 L10 30 L10 20 L0 20 Z" fill="%23D4AF37"/%3E%3C/svg%3E')]"></div>
                </div>

                {{-- Content --}}
                <div class="relative">
                    <span class="text-[#D4AF37] text-4xl mb-4 block">⚜️</span>
                    <h2 class="text-3xl sm:text-4xl font-cinzel font-bold text-[#D4AF37] mb-4">
                        Ready to Enter the Library?
                    </h2>
                    <p class="text-lg text-[#C4A882] font-serif italic mb-8 max-w-2xl mx-auto leading-relaxed">
                        "The library is a temple of wisdom. Step inside and let the pursuit of knowledge begin."
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('login') }}"
                           class="group inline-flex items-center justify-center px-10 py-4 bg-gradient-to-r from-[#D4AF37] to-[#B4941E] text-[#2D1B4E] font-serif font-bold text-lg rounded-lg hover:shadow-2xl hover:shadow-[#D4AF37]/40 transform hover:-translate-y-1 transition-all duration-500">
                            <span>📜 Enter Library</span>
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>

                        <a href="{{ route('books') }}"
                           class="inline-flex items-center justify-center px-10 py-4 bg-transparent text-[#D4AF37] font-serif font-bold text-lg rounded-lg border-2 border-[#D4AF37]/40 hover:border-[#D4AF37] hover:bg-[#D4AF37]/10 transition-all duration-500 transform hover:-translate-y-1">
                            📚 Browse Collection
                        </a>
                    </div>
                </div>

                {{-- Corner Ornaments --}}
                <div class="absolute top-4 left-4 w-12 h-12 border-t-2 border-l-2 border-[#D4AF37]/30 rounded-tl-xl"></div>
                <div class="absolute top-4 right-4 w-12 h-12 border-t-2 border-r-2 border-[#D4AF37]/30 rounded-tr-xl"></div>
                <div class="absolute bottom-4 left-4 w-12 h-12 border-b-2 border-l-2 border-[#D4AF37]/30 rounded-bl-xl"></div>
                <div class="absolute bottom-4 right-4 w-12 h-12 border-b-2 border-r-2 border-[#D4AF37]/30 rounded-br-xl"></div>
            </div>
        </div>
    </section>

    <!-- ========== FOOTER ========== -->
    <footer class="bg-gradient-to-r from-[#2D1B4E] via-[#3D2B5E] to-[#2D1B4E] border-t-2 border-[#D4AF37]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                {{-- Left --}}
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 bg-gradient-to-br from-[#D4AF37] to-[#B4941E] rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-4 h-4 text-[#2D1B4E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[#D4AF37] font-cinzel font-bold text-sm tracking-wider">Bibliotheca Alexandrina</p>
                        <p class="text-[#C4A882] text-[10px] font-serif italic">~ Eternal Legacy of Knowledge ~</p>
                    </div>
                </div>

                {{-- Center --}}
                <div class="flex items-center space-x-2 text-[#D4AF37]/40">
                    <span>🌿</span>
                    <span>🏛️</span>
                    <span>📜</span>
                    <span>🌿</span>
                </div>

                {{-- Right --}}
                <div class="text-center sm:text-right">
                    <p class="text-[#C4A882] text-xs font-serif">
                        &copy; {{ date('Y') }} Bibliotheca Alexandrina
                    </p>
                    <p class="text-[#C4A882]/60 text-[10px] font-serif italic">
                        All rights reserved to the keepers of knowledge
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>
</html>
