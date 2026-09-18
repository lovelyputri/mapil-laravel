<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Warisan Osing - Ensiklopedia Budaya Banyuwangi')
    </title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500;1,600;1,700&display=swap" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            brown: '#4A2C20',
                            'brown-light': '#6B4030',
                            terracotta: '#A85432',
                            'terracotta-dark': '#843D26',
                            gold: '#C89B3C',
                            'gold-light': '#E3C477',
                            cream: '#F8F2E8',
                            'cream-dark': '#EFE3D0',
                            sand: '#E9D7B7',
                            dark: '#2B1B16',
                            olive: '#68704A',
                        }
                    },

                    fontFamily: {
                        sans: ['DM Sans', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                        cinzel: ['Cinzel', 'serif'],
                    },

                    boxShadow: {
                        'soft': '0 10px 35px rgba(74, 44, 32, .10)',
                        'gold': '0 10px 35px rgba(200, 155, 60, .18)',
                    }
                }
            }
        }
    </script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #F8F2E8;
            color: #4A2C20;
        }

        .font-serif {
            font-family: 'Playfair Display', serif;
        }

        .font-cinzel {
            font-family: 'Cinzel', serif;
        }

        /* =========================================
           Gajah Oling / Batik Pattern
        ========================================= */

        .gajah-oling-bg {
            background-color: #F8F2E8;
            background-image:
                radial-gradient(
                    circle at 20% 20%,
                    rgba(200, 155, 60, .13) 0 2px,
                    transparent 2.5px
                ),
                radial-gradient(
                    circle at 80% 70%,
                    rgba(168, 84, 50, .08) 0 2px,
                    transparent 2.5px
                );
            background-size: 28px 28px, 36px 36px;
        }

        .dark-pattern {
            background-color: #2B1B16;
            background-image:
                radial-gradient(
                    circle at 15% 25%,
                    rgba(200, 155, 60, .10) 0 1.5px,
                    transparent 2px
                ),
                radial-gradient(
                    circle at 80% 70%,
                    rgba(200, 155, 60, .07) 0 1.5px,
                    transparent 2px
                );
            background-size: 30px 30px, 42px 42px;
        }

        /* =========================================
           Glass Card
        ========================================= */

        .glass-card {
            background: rgba(255, 255, 255, .70);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(200, 155, 60, .25);
            box-shadow: 0 10px 35px rgba(74, 44, 32, .07);
        }

        .glass-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 45px rgba(74, 44, 32, .12);
        }

        /* =========================================
           Navbar
        ========================================= */

        .nav-glass {
            background: rgba(248, 242, 232, .88);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(200, 155, 60, .18);
        }

        .nav-link {
            position: relative;
            color: rgba(74, 44, 32, .78);
            transition: all .25s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -7px;
            width: 0;
            height: 2px;
            background: #A85432;
            border-radius: 999px;
            transform: translateX(-50%);
            transition: width .25s ease;
        }

        .nav-link:hover {
            color: #A85432;
        }

        .nav-link:hover::after {
            width: 22px;
        }

        /* =========================================
           Buttons
        ========================================= */

        .btn-primary {
            background: #A85432;
            color: white;
            box-shadow: 0 10px 25px rgba(168, 84, 50, .20);
            transition: all .25s ease;
        }

        .btn-primary:hover {
            background: #843D26;
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(168, 84, 50, .28);
        }

        .btn-outline {
            background: rgba(255,255,255,.72);
            color: #4A2C20;
            border: 1px solid rgba(200,155,60,.45);
            transition: all .25s ease;
        }

        .btn-outline:hover {
            background: #EFE3D0;
            transform: translateY(-2px);
        }

        /* =========================================
           Scrollbar
        ========================================= */

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #EFE3D0;
        }

        ::-webkit-scrollbar-thumb {
            background: #C89B3C;
            border-radius: 999px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #A85432;
        }

        /* =========================================
           Mobile Menu
        ========================================= */

        #mobileMenu {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition:
                max-height .35s ease,
                opacity .25s ease;
        }

        #mobileMenu.show {
            max-height: 600px;
            opacity: 1;
        }

        /* =========================================
           Flash Animation
        ========================================= */

        .flash-message {
            animation: slideDown .35s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* =========================================
           Page Animation
        ========================================= */

        .page-enter {
            animation: pageEnter .45s ease-out;
        }

        @keyframes pageEnter {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    @stack('styles')
</head>

<body class="min-h-screen flex flex-col">

    {{-- =========================================
         NAVBAR
    ========================================== --}}
    <header class="fixed top-0 left-0 right-0 z-50">

        <nav class="nav-glass">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="h-[78px] flex items-center justify-between">

                    {{-- LOGO --}}
                    <a href="{{ url('/') }}"
                       class="flex items-center gap-3 group">

                        <div class="w-11 h-11 rounded-2xl
                                    bg-brand-gold
                                    text-brand-dark
                                    flex items-center justify-center
                                    shadow-md
                                    group-hover:rotate-3
                                    transition">

                            <span class="font-cinzel text-xl font-bold">
                                ✦
                            </span>

                        </div>

                        <div class="leading-tight">

                            <div class="font-cinzel
                                        text-[15px]
                                        sm:text-lg
                                        font-bold
                                        tracking-[.12em]
                                        text-brand-brown">

                                WARISAN OSING

                            </div>

                            <div class="text-[9px]
                                        sm:text-[10px]
                                        uppercase
                                        tracking-[.22em]
                                        text-brand-terracotta
                                        font-semibold">

                                Banyuwangi Heritage

                            </div>

                        </div>

                    </a>


                    {{-- DESKTOP MENU --}}
                    <div class="hidden lg:flex items-center gap-7">

                        <a href="{{ url('/') }}"
                           class="nav-link text-sm font-semibold
                                  {{ request()->is('/') ? 'text-brand-terracotta' : '' }}">

                            Beranda

                        </a>

                        <a href="{{ route('budaya.kamus.index') }}"
                           class="nav-link text-sm font-semibold
                                  {{ request()->routeIs('budaya.kamus.*') ? 'text-brand-terracotta' : '' }}">

                            Kamus Osing

                        </a>

                        <a href="{{ route('budaya.rumah.index') }}"
                           class="nav-link text-sm font-semibold
                                  {{ request()->routeIs('budaya.rumah.*') ? 'text-brand-terracotta' : '' }}">

                            Rumah Adat

                        </a>

                        <a href="{{ route('budaya.tradisi.index') }}"
                           class="nav-link text-sm font-semibold
                                  {{ request()->routeIs('budaya.tradisi.*') ? 'text-brand-terracotta' : '' }}">

                            Tradisi

                        </a>

                        <a href="{{ route('budaya.kuliner.index') }}"
                           class="nav-link text-sm font-semibold
                                  {{ request()->routeIs('budaya.kuliner.*') ? 'text-brand-terracotta' : '' }}">

                            Kuliner

                        </a>

                        <a href="{{ route('budaya.kuis') }}"
                           class="px-5 py-2.5
                                  rounded-xl
                                  bg-brand-terracotta
                                  text-white
                                  text-sm
                                  font-bold
                                  shadow-lg
                                  shadow-brand-terracotta/20
                                  hover:bg-brand-terracotta-dark
                                  hover:-translate-y-0.5
                                  transition">

                            <i class="fa-solid fa-puzzle-piece mr-1"></i>
                            Kuis

                        </a>

                    </div>


                    {{-- MOBILE BUTTON --}}
                    <button type="button"
                            onclick="toggleMobileMenu()"
                            class="lg:hidden
                                   w-11 h-11
                                   rounded-xl
                                   border border-brand-gold/30
                                   bg-white/70
                                   text-brand-brown
                                   flex items-center justify-center
                                   hover:bg-brand-cream-dark
                                   transition">

                        <i id="menuIcon"
                           class="fa-solid fa-bars"></i>

                    </button>

                </div>


                {{-- MOBILE MENU --}}
                <div id="mobileMenu"
                     class="lg:hidden">

                    <div class="pb-5 pt-2 space-y-1">

                        <a href="{{ url('/') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  rounded-xl
                                  text-sm font-semibold
                                  text-brand-brown
                                  hover:bg-brand-cream-dark
                                  transition">

                            <i class="fa-solid fa-house w-5 text-brand-terracotta"></i>
                            Beranda

                        </a>

                        <a href="{{ route('budaya.kamus.index') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  rounded-xl
                                  text-sm font-semibold
                                  text-brand-brown
                                  hover:bg-brand-cream-dark
                                  transition">

                            <i class="fa-solid fa-book-open w-5 text-brand-terracotta"></i>
                            Kamus Osing

                        </a>

                        <a href="{{ route('budaya.rumah.index') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  rounded-xl
                                  text-sm font-semibold
                                  text-brand-brown
                                  hover:bg-brand-cream-dark
                                  transition">

                            <i class="fa-solid fa-house-chimney w-5 text-brand-terracotta"></i>
                            Rumah Adat

                        </a>

                        <a href="{{ route('budaya.tradisi.index') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  rounded-xl
                                  text-sm font-semibold
                                  text-brand-brown
                                  hover:bg-brand-cream-dark
                                  transition">

                            <i class="fa-solid fa-masks-theater w-5 text-brand-terracotta"></i>
                            Tradisi

                        </a>

                        <a href="{{ route('budaya.kuliner.index') }}"
                           class="flex items-center gap-3
                                  px-4 py-3
                                  rounded-xl
                                  text-sm font-semibold
                                  text-brand-brown
                                  hover:bg-brand-cream-dark
                                  transition">

                            <i class="fa-solid fa-bowl-food w-5 text-brand-terracotta"></i>
                            Kuliner

                        </a>

                        <a href="{{ route('budaya.kuis') }}"
                           class="mt-2
                                  flex items-center justify-center gap-2
                                  px-4 py-3
                                  rounded-xl
                                  bg-brand-terracotta
                                  text-white
                                  text-sm
                                  font-bold
                                  shadow-lg">

                            <i class="fa-solid fa-puzzle-piece"></i>
                            Kuis Budaya

                        </a>

                    </div>

                </div>

            </div>

        </nav>

    </header>


    {{-- =========================================
         FLASH MESSAGE
    ========================================== --}}
    <div class="fixed top-[95px]
                left-4 right-4 sm:left-auto
                sm:right-6
                z-40
                sm:w-[380px]">

        @if(session('success'))

            <div class="flash-message
                        flex items-start gap-3
                        p-4
                        rounded-2xl
                        bg-white/95
                        backdrop-blur
                        border border-green-200
                        shadow-xl">

                <div class="w-9 h-9
                            rounded-xl
                            bg-green-100
                            text-green-600
                            flex items-center justify-center
                            shrink-0">

                    <i class="fa-solid fa-check"></i>

                </div>

                <div class="flex-1">

                    <p class="text-sm
                              font-bold
                              text-brand-brown">

                        Berhasil

                    </p>

                    <p class="text-xs
                              text-gray-500
                              mt-0.5">

                        {{ session('success') }}

                    </p>

                </div>

                <button onclick="this.parentElement.remove()"
                        class="text-gray-400 hover:text-brand-brown">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>

        @endif


        @if($errors->any())

            <div class="flash-message
                        mt-3
                        p-4
                        rounded-2xl
                        bg-white/95
                        backdrop-blur
                        border border-red-200
                        shadow-xl">

                <div class="flex items-start gap-3">

                    <div class="w-9 h-9
                                rounded-xl
                                bg-red-100
                                text-red-600
                                flex items-center justify-center
                                shrink-0">

                        <i class="fa-solid fa-triangle-exclamation"></i>

                    </div>

                    <div class="flex-1">

                        <p class="text-sm
                                  font-bold
                                  text-brand-brown">

                            Terjadi Kesalahan

                        </p>

                        <ul class="mt-1 space-y-1">

                            @foreach($errors->all() as $error)

                                <li class="text-xs text-gray-500">
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        @endif

    </div>


    {{-- =========================================
         MAIN CONTENT
    ========================================== --}}
    <main class="flex-grow pt-[78px] page-enter">

        @yield('content')

    </main>


    {{-- =========================================
         FOOTER
    ========================================== --}}
    <footer class="bg-brand-dark
                   text-white
                   pt-16
                   pb-10
                   border-t
                   border-brand-gold/20
                   dark-pattern">

        <div class="max-w-7xl mx-auto
                    px-4 sm:px-6 lg:px-8">

            <div class="grid
                        grid-cols-1
                        md:grid-cols-4
                        gap-10
                        pb-10
                        border-b
                        border-brand-gold/20">

                {{-- BRAND --}}
                <div class="md:col-span-2 space-y-4">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11
                                    rounded-xl
                                    bg-brand-gold
                                    text-brand-dark
                                    flex items-center justify-center">

                            <span class="font-cinzel
                                         font-bold
                                         text-xl">

                                ✦

                            </span>

                        </div>

                        <div>

                            <div class="font-cinzel
                                        text-lg
                                        font-bold
                                        tracking-wider
                                        text-brand-gold">

                                WARISAN OSING

                            </div>

                            <div class="text-[9px]
                                        tracking-[.2em]
                                        uppercase
                                        text-gray-500">

                                Banyuwangi Heritage

                            </div>

                        </div>

                    </div>

                    <p class="text-sm
                              text-gray-400
                              max-w-md
                              leading-relaxed">

                        Platform edukasi kebudayaan digital
                        untuk mengenal sejarah, bahasa,
                        rumah adat, tradisi, dan kuliner
                        Suku Osing Banyuwangi.

                    </p>

                </div>


                {{-- NAVIGASI --}}
                <div>

                    <h4 class="font-serif
                               font-bold
                               text-brand-gold
                               text-base
                               mb-4">

                        Navigasi Budaya

                    </h4>

                    <div class="space-y-2.5">

                        <a href="{{ url('/') }}"
                           class="block text-sm text-gray-400
                                  hover:text-brand-gold
                                  transition">

                            Beranda

                        </a>

                        <a href="{{ route('budaya.kamus.index') }}"
                           class="block text-sm text-gray-400
                                  hover:text-brand-gold
                                  transition">

                            Kamus Osing

                        </a>

                        <a href="{{ route('budaya.rumah.index') }}"
                           class="block text-sm text-gray-400
                                  hover:text-brand-gold
                                  transition">

                            Rumah Adat

                        </a>

                        <a href="{{ route('budaya.tradisi.index') }}"
                           class="block text-sm text-gray-400
                                  hover:text-brand-gold
                                  transition">

                            Tradisi

                        </a>

                    </div>

                </div>


                {{-- LAINNYA --}}
                <div>

                    <h4 class="font-serif
                               font-bold
                               text-brand-gold
                               text-base
                               mb-4">

                        Jelajahi

                    </h4>

                    <div class="space-y-2.5">

                        <a href="{{ route('budaya.kuliner.index') }}"
                           class="block text-sm text-gray-400
                                  hover:text-brand-gold
                                  transition">

                            Kuliner Osing

                        </a>

                        <a href="{{ route('budaya.kuis') }}"
                           class="block text-sm text-gray-400
                                  hover:text-brand-gold
                                  transition">

                            Kuis Budaya

                        </a>

                    </div>

                </div>

            </div>


            {{-- COPYRIGHT --}}
            <div class="pt-7
                        flex flex-col
                        sm:flex-row
                        items-center
                        justify-between
                        gap-3">

                <p class="text-xs text-gray-500">

                    © {{ date('Y') }}
                    Warisan Osing.
                    Seluruh hak cipta dilindungi.

                </p>

                <p class="text-xs
                          text-brand-gold/70
                          font-serif
                          italic">

                    Merawat warisan, mengenal jati diri.

                </p>

            </div>

        </div>

    </footer>


    {{-- =========================================
         JAVASCRIPT
    ========================================== --}}
    <script>

        function toggleMobileMenu() {

            const menu = document.getElementById('mobileMenu');
            const icon = document.getElementById('menuIcon');

            menu.classList.toggle('show');

            if (menu.classList.contains('show')) {

                icon.classList.remove('fa-bars');
                icon.classList.add('fa-xmark');

            } else {

                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');

            }

        }


        // Tutup menu ketika klik link
        document.querySelectorAll('#mobileMenu a').forEach(link => {

            link.addEventListener('click', () => {

                const menu = document.getElementById('mobileMenu');
                const icon = document.getElementById('menuIcon');

                menu.classList.remove('show');

                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');

            });

        });


        // Flash message otomatis hilang
        setTimeout(() => {

            document.querySelectorAll('.flash-message').forEach(message => {

                message.style.transition = 'opacity .4s ease, transform .4s ease';
                message.style.opacity = '0';
                message.style.transform = 'translateY(-8px)';

                setTimeout(() => {
                    message.remove();
                }, 400);

            });

        }, 4500);

    </script>

    @stack('scripts')

</body>
</html>

