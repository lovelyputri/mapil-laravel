<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Warisan Osing')
    </title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect"
        href="https://fonts.googleapis.com">

    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap"
        rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brown: '#4A2C20',
                        terracotta: '#A85432',
                        cream: '#F8F2E8',
                        gold: '#C89B3C',
                        sand: '#E9D7B7',
                        dark: '#2B1B16'
                    },

                    fontFamily: {
                        sans: ['DM Sans', 'sans-serif'],
                        serif: ['Playfair Display', 'serif']
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'DM Sans', sans-serif;
            background: #f8f2e8;
            color: #4a2c20;
        }

        .font-display {
            font-family: 'Playfair Display', serif;
        }

        .pattern {
            background-image:
                radial-gradient(#c89b3c 0.8px, transparent 0.8px);
            background-size: 16px 16px;
            opacity: .15;
        }

        .card {
            transition: .2s ease;
        }

        .card:hover {
            transform: translateY(-2px);
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- NAVBAR -->

    <header class="sticky top-0 z-50 bg-[#4A2C20] text-white shadow-lg">

        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            <div class="h-20 flex items-center justify-between">

                <a href="{{ route('budaya.dashboard') }}"
                    class="flex items-center gap-3">

                    <div
                        class="w-11 h-11 rounded-full bg-[#C89B3C] flex items-center justify-center text-[#4A2C20] font-bold text-lg">
                        O
                    </div>

                    <div>
                        <div class="font-display text-xl font-bold">
                            Warisan Osing
                        </div>

                        <div class="text-[10px] uppercase tracking-[.25em] text-[#E9D7B7]">
                            Banyuwangi
                        </div>
                    </div>

                </a>


                <nav class="hidden lg:flex items-center gap-1">

                    <a href="{{ route('budaya.dashboard') }}"
                        class="px-4 py-2 rounded-xl text-sm hover:bg-white/10
                        {{ request()->routeIs('budaya.dashboard') ? 'bg-white/10' : '' }}">
                        Beranda
                    </a>

                    <a href="{{ route('budaya.kamus.index') }}"
                        class="px-4 py-2 rounded-xl text-sm hover:bg-white/10
                        {{ request()->routeIs('budaya.kamus.*') ? 'bg-white/10' : '' }}">
                        Kamus Osing
                    </a>

                    <a href="{{ route('budaya.rumah.index') }}"
                        class="px-4 py-2 rounded-xl text-sm hover:bg-white/10
                        {{ request()->routeIs('budaya.rumah.*') ? 'bg-white/10' : '' }}">
                        Rumah Adat
                    </a>

                    <a href="{{ route('budaya.tradisi.index') }}"
                        class="px-4 py-2 rounded-xl text-sm hover:bg-white/10
                        {{ request()->routeIs('budaya.tradisi.*') ? 'bg-white/10' : '' }}">
                        Tradisi
                    </a>

                    <a href="{{ route('budaya.kuliner.index') }}"
                        class="px-4 py-2 rounded-xl text-sm hover:bg-white/10
                        {{ request()->routeIs('budaya.kuliner.*') ? 'bg-white/10' : '' }}">
                        Kuliner
                    </a>

                    <a href="{{ route('budaya.kuis') }}"
                        class="ml-2 px-4 py-2 rounded-xl bg-[#C89B3C] text-[#4A2C20] font-bold text-sm hover:bg-[#d9ad4d]">
                        Kuis
                    </a>

                </nav>


                <button onclick="toggleMenu()"
                    class="lg:hidden w-10 h-10 rounded-xl bg-white/10">
                    ☰
                </button>

            </div>


            <!-- MOBILE MENU -->

            <div id="mobileMenu"
                class="hidden lg:hidden pb-5">

                <div class="grid gap-1">

                    <a href="{{ route('budaya.dashboard') }}"
                        class="px-4 py-3 rounded-xl hover:bg-white/10">
                        Beranda
                    </a>

                    <a href="{{ route('budaya.kamus.index') }}"
                        class="px-4 py-3 rounded-xl hover:bg-white/10">
                        Kamus Osing
                    </a>

                    <a href="{{ route('budaya.rumah.index') }}"
                        class="px-4 py-3 rounded-xl hover:bg-white/10">
                        Rumah Adat
                    </a>

                    <a href="{{ route('budaya.tradisi.index') }}"
                        class="px-4 py-3 rounded-xl hover:bg-white/10">
                        Tradisi & Kesenian
                    </a>

                    <a href="{{ route('budaya.kuliner.index') }}"
                        class="px-4 py-3 rounded-xl hover:bg-white/10">
                        Kuliner
                    </a>

                    <a href="{{ route('budaya.kuis') }}"
                        class="px-4 py-3 rounded-xl bg-[#C89B3C] text-[#4A2C20] font-bold">
                        Kuis Interaktif
                    </a>

                </div>

            </div>

        </div>

    </header>


    <!-- FLASH MESSAGE -->

    @if(session('success'))

        <div class="max-w-7xl mx-auto px-5 lg:px-8 pt-6">

            <div class="bg-green-50 border border-green-200 text-green-800 rounded-2xl px-5 py-4 flex items-center justify-between">

                <span class="text-sm font-medium">
                    ✓ {{ session('success') }}
                </span>

                <button onclick="this.parentElement.parentElement.remove()"
                    class="text-green-700 text-xl">
                    ×
                </button>

            </div>

        </div>

    @endif


    <!-- VALIDATION ERROR -->

    @if($errors->any())

        <div class="max-w-7xl mx-auto px-5 lg:px-8 pt-6">

            <div class="bg-red-50 border border-red-200 text-red-800 rounded-2xl px-5 py-4">

                <div class="font-bold mb-2">
                    Periksa kembali data:
                </div>

                <ul class="text-sm list-disc ml-5 space-y-1">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        </div>

    @endif


    <!-- CONTENT -->

    <main>
        @yield('content')
    </main>


    <!-- FOOTER -->

    <footer class="mt-20 bg-[#2B1B16] text-[#E9D7B7]">

        <div class="max-w-7xl mx-auto px-5 lg:px-8 py-12">

            <div class="grid md:grid-cols-2 gap-10">

                <div>

                    <h3 class="font-display text-2xl text-white">
                        Warisan Osing
                    </h3>

                    <p class="mt-3 text-sm leading-7 max-w-md text-[#E9D7B7]/80">
                        Ensiklopedia digital sederhana untuk mengenal,
                        mempelajari, dan menjaga warisan budaya Osing
                        Banyuwangi.
                    </p>

                </div>

                <div class="md:text-right">

                    <p class="text-xs uppercase tracking-[.2em] text-[#C89B3C]">
                        Banyuwangi
                    </p>

                    <p class="mt-2 text-sm">
                        Budaya • Tradisi • Bahasa • Kuliner
                    </p>

                </div>

            </div>

            <div class="border-t border-white/10 mt-10 pt-6 text-xs text-white/40">
                Warisan Osing © {{ date('Y') }}
            </div>

        </div>

    </footer>


    <script>

        function toggleMenu() {

            document
                .getElementById('mobileMenu')
                .classList.toggle('hidden');

        }

    </script>

    @stack('scripts')

</body>

</html>
