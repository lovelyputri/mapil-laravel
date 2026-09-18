@extends('budaya.layout')

@section('title', 'Beranda - Warisan Osing')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    :root {
        --brown: #2c1e16;
        --brown-soft: #5c4133;
        --dark: #1c120c;
        --terracotta: #a8432a;
        --terracotta-dark: #83311c;
        --gold: #c9933b;
        --gold-light: #e5b869;
        --cream: #fbf7ee;
        --cream-dark: #f2e8d5;
        --olive: #4a5738;
    }

    /* =========================================================
       BASE
    ========================================================= */

    .osing-page {
        background: var(--cream);
        color: var(--brown);
        font-family: 'Plus Jakarta Sans', sans-serif;
        overflow: hidden;
    }

    .osing-page .font-serif {
        font-family: 'Playfair Display', serif;
    }

    .osing-page .font-cinzel {
        font-family: 'Cinzel', serif;
    }

    /* =========================================================
       PATTERN
    ========================================================= */

    .osing-pattern {
        background-color: var(--cream);
        background-image:
            radial-gradient(
                rgba(201,147,59,.20) .7px,
                transparent .7px
            ),
            radial-gradient(
                rgba(168,67,42,.10) .7px,
                transparent .7px
            );
        background-size: 30px 30px;
        background-position: 0 0, 15px 15px;
    }

    .osing-dark-pattern {
        background-color: var(--dark);
        background-image:
            radial-gradient(
                rgba(201,147,59,.12) .8px,
                transparent .8px
            );
        background-size: 25px 25px;
    }

    /* =========================================================
       HERO
    ========================================================= */

    .osing-hero {
        position: relative;
        min-height: 700px;
        display: flex;
        align-items: center;
        overflow: hidden;
        padding: 95px 0 115px;
    }

    .hero-orb {
        position: absolute;
        border-radius: 999px;
        pointer-events: none;
        filter: blur(75px);
    }

    .hero-orb-one {
        width: 360px;
        height: 360px;
        left: -130px;
        top: 80px;
        background: rgba(201,147,59,.16);
    }

    .hero-orb-two {
        width: 450px;
        height: 450px;
        right: -170px;
        bottom: -100px;
        background: rgba(168,67,42,.11);
    }

    .hero-orb-three {
        width: 180px;
        height: 180px;
        right: 38%;
        top: 5%;
        background: rgba(201,147,59,.07);
    }

    .hero-title {
        letter-spacing: -.045em;
    }

    .hero-accent {
        position: relative;
        display: inline-block;
        color: var(--terracotta);
    }

    .hero-accent::after {
        content: '';
        position: absolute;
        left: 2px;
        right: 8px;
        bottom: 3px;
        height: 8px;
        background: rgba(201,147,59,.20);
        z-index: -1;
        border-radius: 999px;
        transform: rotate(-1deg);
    }

    .hero-image-wrap {
        position: relative;
    }

    .hero-image {
        height: 500px;
        border-radius: 34px;
        overflow: hidden;
        border: 6px solid rgba(255,255,255,.95);
        box-shadow:
            0 35px 80px rgba(44,30,22,.22),
            0 8px 20px rgba(44,30,22,.08);
        transform: rotate(2deg);
        transition: .55s ease;
    }

    .hero-image:hover {
        transform: rotate(0deg) scale(1.015);
    }

    .hero-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .7s ease;
    }

    .hero-image:hover img {
        transform: scale(1.04);
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background:
            linear-gradient(
                to top,
                rgba(28,18,12,.94),
                rgba(28,18,12,.22) 50%,
                transparent 80%
            );
    }

    .hero-frame {
        position: absolute;
        inset: -13px;
        border: 1px solid rgba(201,147,59,.35);
        border-radius: 42px;
        transform: rotate(-2deg);
        pointer-events: none;
    }

    /* =========================================================
       BADGE
    ========================================================= */

    .section-label {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 7px 13px;
        border-radius: 999px;
        background: rgba(168,67,42,.07);
        border: 1px solid rgba(168,67,42,.14);
        color: var(--terracotta);
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .16em;
    }

    .section-label::before {
        content: '';
        width: 5px;
        height: 5px;
        border-radius: 999px;
        background: var(--gold);
    }

    /* =========================================================
       FLOATING CARDS
    ========================================================= */

    .floating-card {
        position: absolute;
        z-index: 20;
        background: rgba(255,255,255,.88);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border: 1px solid rgba(201,147,59,.30);
        box-shadow: 0 20px 45px rgba(44,30,22,.15);
    }

    .floating-card.bottom {
        left: -38px;
        bottom: -30px;
    }

    .floating-card.top {
        right: -28px;
        top: -27px;
        background: rgba(28,18,12,.94);
        color: white;
        border-color: rgba(201,147,59,.30);
    }

    .floating-animation {
        animation: osingFloat 5s ease-in-out infinite;
    }

    @keyframes osingFloat {
        0%,100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-8px);
        }
    }

    /* =========================================================
       BUTTON
    ========================================================= */

    .osing-btn-primary,
    .osing-btn-secondary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        padding: 14px 22px;
        border-radius: 15px;
        font-size: 13px;
        font-weight: 800;
        transition: .3s ease;
    }

    .osing-btn-primary {
        background: linear-gradient(
            135deg,
            var(--terracotta),
            var(--terracotta-dark)
        );
        color: white;
        box-shadow: 0 13px 28px rgba(168,67,42,.23);
    }

    .osing-btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 19px 35px rgba(168,67,42,.30);
    }

    .osing-btn-secondary {
        background: rgba(255,255,255,.82);
        color: var(--brown);
        border: 1px solid rgba(201,147,59,.35);
        box-shadow: 0 8px 20px rgba(44,30,22,.04);
    }

    .osing-btn-secondary:hover {
        background: white;
        border-color: rgba(201,147,59,.55);
        transform: translateY(-3px);
    }

    /* =========================================================
       HERO STATS
    ========================================================= */

    .hero-stat {
        position: relative;
    }

    .hero-stat:not(:last-child)::after {
        content: '';
        position: absolute;
        right: -10px;
        top: 5px;
        bottom: 5px;
        width: 1px;
        background: rgba(201,147,59,.20);
    }

    /* =========================================================
       STATISTICS
    ========================================================= */

    .statistics-wrap {
        position: relative;
        z-index: 30;
        margin-top: -48px;
    }

    .statistics-box {
        background: rgba(255,255,255,.92);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border: 1px solid rgba(201,147,59,.20);
        border-radius: 28px;
        box-shadow:
            0 22px 55px rgba(44,30,22,.10),
            0 3px 10px rgba(44,30,22,.03);
        overflow: hidden;
    }

    .stat-card {
        position: relative;
        padding: 25px 24px;
        transition: .3s ease;
    }

    .stat-card + .stat-card {
        border-left: 1px solid rgba(44,30,22,.06);
    }

    .stat-card:hover {
        background: rgba(201,147,59,.045);
    }

    .stat-icon {
        width: 46px;
        height: 46px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(168,67,42,.08);
        color: var(--terracotta);
    }

    /* =========================================================
       CULTURE CARDS
    ========================================================= */

    .culture-card {
        background: rgba(255,255,255,.88);
        border: 1px solid rgba(44,30,22,.065);
        border-radius: 27px;
        padding: 26px;
        transition: .35s ease;
        height: 100%;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 28px rgba(44,30,22,.035);
    }

    .culture-card::before {
        content: '';
        position: absolute;
        width: 130px;
        height: 130px;
        border-radius: 999px;
        background: rgba(201,147,59,.07);
        right: -60px;
        top: -60px;
        transition: .4s ease;
    }

    .culture-card::after {
        content: '';
        position: absolute;
        width: 4px;
        height: 0;
        left: 0;
        top: 26px;
        background: var(--terracotta);
        border-radius: 0 999px 999px 0;
        transition: .35s ease;
    }

    .culture-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 22px 48px rgba(44,30,22,.10);
        border-color: rgba(201,147,59,.28);
    }

    .culture-card:hover::before {
        transform: scale(1.2);
    }

    .culture-card:hover::after {
        height: 45px;
    }

    .culture-number {
        font-family: 'Cinzel', serif;
        font-size: 11px;
        font-weight: 800;
        color: var(--gold);
    }

    /* =========================================================
       DARK SECTION
    ========================================================= */

    .dark-section {
        background: var(--dark);
        color: white;
    }

    .dark-card {
        background: rgba(255,255,255,.045);
        border: 1px solid rgba(201,147,59,.18);
        border-radius: 26px;
        padding: 26px;
        transition: .3s ease;
    }

    .dark-card:hover {
        background: rgba(255,255,255,.065);
        border-color: rgba(201,147,59,.35);
        transform: translateY(-4px);
    }

    /* =========================================================
       TIMELINE
    ========================================================= */

    .timeline {
        position: relative;
    }

    .timeline-line {
        position: absolute;
        left: 13px;
        top: 8px;
        bottom: 8px;
        width: 1px;
        background: linear-gradient(
            to bottom,
            rgba(201,147,59,.45),
            rgba(201,147,59,.08)
        );
    }

    .timeline-dot {
        position: relative;
        z-index: 2;
        width: 28px;
        height: 28px;
        border-radius: 999px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--gold);
        color: var(--dark);
        font-size: 9px;
        font-weight: 800;
        box-shadow:
            0 0 0 5px var(--dark),
            0 0 0 6px rgba(201,147,59,.15);
        flex-shrink: 0;
    }

    /* =========================================================
       HIGHLIGHT
    ========================================================= */

    .highlight-box {
        position: relative;
        overflow: hidden;
        border-radius: 34px;
        background: var(--dark);
        border: 1px solid rgba(201,147,59,.18);
        box-shadow: 0 25px 60px rgba(44,30,22,.10);
    }

    .highlight-box::before {
        content: '';
        position: absolute;
        width: 450px;
        height: 450px;
        right: -220px;
        top: -250px;
        border-radius: 999px;
        border: 1px solid rgba(201,147,59,.10);
    }

    .highlight-box::after {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        right: -150px;
        bottom: -200px;
        border-radius: 999px;
        border: 1px solid rgba(168,67,42,.13);
    }

    .highlight-mini-card {
        background: rgba(255,255,255,.045);
        border: 1px solid rgba(201,147,59,.18);
        border-radius: 22px;
        padding: 21px;
        transition: .3s ease;
    }

    .highlight-mini-card:hover {
        background: rgba(255,255,255,.075);
        transform: translateY(-3px);
        border-color: rgba(201,147,59,.35);
    }

    /* =========================================================
       DIVIDER
    ========================================================= */

    .ornament-divider {
        display: flex;
        align-items: center;
        gap: 13px;
        color: var(--gold);
        opacity: .55;
    }

    .ornament-divider::before,
    .ornament-divider::after {
        content: '';
        height: 1px;
        flex: 1;
        background: linear-gradient(
            to right,
            transparent,
            rgba(201,147,59,.35)
        );
    }

    .ornament-divider::after {
        background: linear-gradient(
            to left,
            transparent,
            rgba(201,147,59,.35)
        );
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media(max-width: 1024px) {

        .osing-hero {
            min-height: auto;
            padding-top: 70px;
        }

        .hero-image {
            transform: none;
            height: 440px;
        }

        .hero-frame {
            display: none;
        }

        .floating-card.bottom {
            left: 12px;
        }

        .floating-card.top {
            right: 12px;
        }

        .stat-card + .stat-card {
            border-left: none;
        }

    }

    @media(max-width: 640px) {

        .osing-hero {
            padding: 50px 0 75px;
        }

        .hero-title {
            letter-spacing: -.035em;
        }

        .hero-image {
            height: 365px;
            border-radius: 26px;
            border-width: 4px;
        }

        .floating-card {
            position: relative;
            inset: auto !important;
            margin-top: 14px;
        }

        .statistics-wrap {
            margin-top: -25px;
        }

        .statistics-box {
            border-radius: 23px;
        }

        .stat-card {
            padding: 20px 17px;
        }

        .culture-card {
            border-radius: 23px;
        }

    }
</style>


<div class="osing-page">

    {{-- =====================================================
         HERO
    ====================================================== --}}

    <section class="osing-hero osing-pattern">

        <div class="hero-orb hero-orb-one"></div>
        <div class="hero-orb hero-orb-two"></div>
        <div class="hero-orb hero-orb-three"></div>

        <div class="max-w-7xl mx-auto px-5 lg:px-8 w-full relative z-10">

            <div class="grid lg:grid-cols-12 gap-14 items-center">

                {{-- =========================
                     HERO TEXT
                ========================== --}}

                <div class="lg:col-span-7">

                    <div class="section-label mb-6">
                        Ensiklopedia Kebudayaan Banyuwangi
                    </div>

                    <h1 class="hero-title font-serif text-5xl sm:text-6xl lg:text-[72px] font-bold leading-[1.04] text-[#2c1e16]">

                        Mengenal Lebih Dekat

                        <span class="block italic hero-accent mt-3">
                            Warisan Osing.
                        </span>

                    </h1>

                    <p class="mt-7 max-w-2xl text-base sm:text-lg leading-8 text-[#2c1e16]/68">

                        Jelajahi sejarah, bahasa, rumah adat, tradisi,
                        kesenian, batik, dan kuliner khas masyarakat
                        Osing Banyuwangi dalam satu ruang digital.

                    </p>


                    {{-- BUTTON --}}

                    <div class="flex flex-wrap gap-3 mt-8">

                        <a href="{{ route('budaya.kamus.index') }}"
                           class="osing-btn-primary">

                            <i class="fa-solid fa-book-open"></i>

                            Jelajahi Kamus

                            <i class="fa-solid fa-arrow-right text-[11px]"></i>

                        </a>

                        <a href="{{ route('budaya.kuis') }}"
                           class="osing-btn-secondary">

                            <i class="fa-solid fa-circle-question text-[#c9933b]"></i>

                            Coba Kuis

                        </a>

                    </div>


                    {{-- QUICK STATS --}}

                    <div class="grid grid-cols-3 gap-5 mt-11 pt-7 border-t border-[#c9933b]/25 max-w-2xl">

                        <div class="hero-stat">

                            <div class="font-cinzel text-2xl sm:text-3xl font-bold text-[#a8432a]">
                                {{ $jumlahKamus }}+
                            </div>

                            <div class="text-[10px] sm:text-xs text-[#2c1e16]/55 mt-1.5">
                                Kosakata Osing
                            </div>

                        </div>


                        <div class="hero-stat">

                            <div class="font-cinzel text-2xl sm:text-3xl font-bold text-[#c9933b]">
                                1771
                            </div>

                            <div class="text-[10px] sm:text-xs text-[#2c1e16]/55 mt-1.5">
                                Puputan Bayu
                            </div>

                        </div>


                        <div class="hero-stat">

                            <div class="font-cinzel text-2xl sm:text-3xl font-bold text-[#4a5738]">
                                3
                            </div>

                            <div class="text-[10px] sm:text-xs text-[#2c1e16]/55 mt-1.5">
                                Bentuk Rumah Adat
                            </div>

                        </div>

                    </div>

                </div>


                {{-- =========================
                     HERO VISUAL
                ========================== --}}

                <div class="lg:col-span-5 relative">

                    <div class="hero-image-wrap">

                        <div class="hero-frame"></div>

                        <div class="hero-image relative">

                            <img
                                src="{{ asset('image/gandung.jpg') }}"
                                alt="Budaya Osing Banyuwangi"
                                loading="eager"
                                onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=800&q=80';"
                            >

                            <div class="hero-overlay"></div>

                            <div class="absolute inset-x-0 bottom-0 p-7 sm:p-8">

                                <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-[#c9933b] text-[#1c120c] text-[9px] font-extrabold uppercase tracking-widest">

                                    <span class="w-1.5 h-1.5 rounded-full bg-[#1c120c]"></span>

                                    Ikon Banyuwangi

                                </span>

                                <h3 class="font-serif text-3xl sm:text-4xl font-bold text-white mt-3">
                                    Tari Gandrung
                                </h3>

                                <p class="text-xs text-white/70 mt-2 max-w-sm leading-5">
                                    Salah satu identitas budaya paling kuat
                                    dari Banyuwangi.
                                </p>

                            </div>

                        </div>


                        {{-- FLOAT CARD BOTTOM --}}

                        <div class="floating-card bottom rounded-2xl p-4 max-w-[255px] floating-animation">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11 rounded-xl
                                            bg-[#a8432a]/10
                                            text-[#a8432a]
                                            flex items-center justify-center
                                            text-lg">

                                    🛖

                                </div>

                                <div>

                                    <div class="font-serif font-bold text-sm text-[#2c1e16]">
                                        Desa Kemiren
                                    </div>

                                    <div class="text-[10px] text-[#2c1e16]/55 mt-1 leading-4">
                                        Pusat pelestarian budaya Osing
                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- FLOAT CARD TOP --}}

                        <div class="floating-card top rounded-2xl px-4 py-3">

                            <div class="flex items-center gap-3">

                                <div class="w-8 h-8 rounded-full
                                            bg-[#c9933b]/10
                                            flex items-center justify-center
                                            text-[#c9933b]">

                                    <i class="fa-solid fa-quote-left text-[10px]"></i>

                                </div>

                                <div>

                                    <div class="font-bold text-xs">
                                        "Isun Wong Osing"
                                    </div>

                                    <div class="text-[10px] text-white/45 mt-1">
                                        Saya Orang Osing
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
         STATISTIK
    ====================================================== --}}

    <section class="statistics-wrap pb-20">

        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            <div class="statistics-box grid grid-cols-2 lg:grid-cols-4">

                {{-- KAMUS --}}

                <div class="stat-card">

                    <div class="flex items-center justify-between gap-4">

                        <div>

                            <div class="text-3xl font-cinzel font-bold text-[#a8432a]">
                                {{ $jumlahKamus }}
                            </div>

                            <div class="text-[11px] text-[#2c1e16]/55 mt-1">
                                Kosakata Osing
                            </div>

                        </div>

                        <div class="stat-icon">
                            <i class="fa-solid fa-book-open"></i>
                        </div>

                    </div>

                </div>


                {{-- RUMAH --}}

                <div class="stat-card">

                    <div class="flex items-center justify-between gap-4">

                        <div>

                            <div class="text-3xl font-cinzel font-bold text-[#c9933b]">
                                {{ $jumlahRumah }}
                            </div>

                            <div class="text-[11px] text-[#2c1e16]/55 mt-1">
                                Rumah Adat
                            </div>

                        </div>

                        <div class="stat-icon">
                            <i class="fa-solid fa-house"></i>
                        </div>

                    </div>

                </div>


                {{-- TRADISI --}}

                <div class="stat-card">

                    <div class="flex items-center justify-between gap-4">

                        <div>

                            <div class="text-3xl font-cinzel font-bold text-[#4a5738]">
                                {{ $jumlahTradisi }}
                            </div>

                            <div class="text-[11px] text-[#2c1e16]/55 mt-1">
                                Tradisi & Seni
                            </div>

                        </div>

                        <div class="stat-icon">
                            <i class="fa-solid fa-masks-theater"></i>
                        </div>

                    </div>

                </div>


                {{-- KULINER --}}

                <div class="stat-card">

                    <div class="flex items-center justify-between gap-4">

                        <div>

                            <div class="text-3xl font-cinzel font-bold text-[#a8432a]">
                                {{ $jumlahKuliner }}
                            </div>

                            <div class="text-[11px] text-[#2c1e16]/55 mt-1">
                                Kuliner Khas
                            </div>

                        </div>

                        <div class="stat-icon">
                            <i class="fa-solid fa-utensils"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
         KAMUS
    ====================================================== --}}

    <section class="py-24 bg-[#fbf7ee]">

        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-5 mb-10">

                <div>

                    <span class="section-label">
                        Bahasa & Identitas
                    </span>

                    <h2 class="font-serif text-4xl sm:text-5xl font-bold mt-4 text-[#2c1e16] tracking-tight">
                        Kamus Bahasa Osing
                    </h2>

                    <p class="text-sm text-[#2c1e16]/58 mt-3 max-w-xl leading-6">
                        Kenali kosakata sehari-hari masyarakat Osing
                        dan pahami makna di balik setiap katanya.
                    </p>

                </div>

                <a href="{{ route('budaya.kamus.index') }}"
                   class="inline-flex items-center gap-2
                          text-sm font-bold
                          text-[#a8432a]
                          hover:text-[#83311c]
                          transition">

                    Lihat semua

                    <i class="fa-solid fa-arrow-right text-[10px]"></i>

                </a>

            </div>


            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">

                @forelse($kamusTerbaru as $index => $item)

                    <a href="{{ route('budaya.kamus.show', $item['id']) }}"
                       class="culture-card group">

                        <div class="relative z-10">

                            <div class="flex items-center justify-between">

                                <span class="culture-number">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>

                                <span class="px-3 py-1.5 rounded-full
                                             bg-[#c9933b]/10
                                             text-[#c9933b]
                                             text-[9px]
                                             font-extrabold
                                             uppercase
                                             tracking-wider">

                                    {{ $item['kategori'] }}

                                </span>

                            </div>

                            <h3 class="font-serif text-2xl font-bold mt-7
                                       text-[#2c1e16]
                                       group-hover:text-[#a8432a]
                                       transition-colors">

                                {{ $item['kata'] }}

                            </h3>

                            <p class="text-sm text-[#2c1e16]/58 mt-2 leading-6">

                                {{ $item['arti'] }}

                            </p>

                            <div class="mt-7 pt-4
                                        border-t border-[#c9933b]/15
                                        text-xs font-bold text-[#a8432a]
                                        flex items-center justify-between">

                                <span>
                                    Pelajari arti
                                </span>

                                <span class="w-7 h-7 rounded-full
                                             bg-[#a8432a]/8
                                             flex items-center justify-center
                                             group-hover:bg-[#a8432a]
                                             group-hover:text-white
                                             transition">

                                    <i class="fa-solid fa-arrow-right text-[9px]"></i>

                                </span>

                            </div>

                        </div>

                    </a>

                @empty

                    <div class="md:col-span-3 py-16 text-center">

                        <div class="w-16 h-16 rounded-2xl
                                    bg-[#c9933b]/10
                                    text-[#c9933b]
                                    mx-auto
                                    flex items-center justify-center
                                    text-2xl">

                            <i class="fa-solid fa-book-open"></i>

                        </div>

                        <p class="text-sm text-[#2c1e16]/50 mt-4">
                            Belum ada kosakata.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </section>


    {{-- =====================================================
         ORNAMENT
    ====================================================== --}}

    <div class="bg-[#fbf7ee] max-w-7xl mx-auto px-8">

        <div class="ornament-divider">
            <span class="text-sm">✦</span>
        </div>

    </div>


    {{-- =====================================================
         SEJARAH
    ====================================================== --}}

    <section class="dark-section osing-dark-pattern py-24">

        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            <div class="grid lg:grid-cols-12 gap-12 items-center">

                {{-- TEXT --}}

                <div class="lg:col-span-5">

                    <span class="inline-flex items-center gap-2
                                 px-3 py-1.5
                                 rounded-full
                                 bg-[#c9933b]/10
                                 border border-[#c9933b]/25
                                 text-[#c9933b]
                                 text-[10px]
                                 font-extrabold
                                 uppercase
                                 tracking-widest">

                        <span class="w-1.5 h-1.5 rounded-full bg-[#c9933b]"></span>

                        Sejarah & Identitas

                    </span>

                    <h2 class="font-serif text-4xl sm:text-5xl font-bold text-white mt-5 leading-tight tracking-tight">
                        Jejak Wong Osing
                    </h2>

                    <p class="text-sm text-white/58 leading-7 mt-5">

                        Warisan budaya Osing tumbuh dari sejarah panjang
                        masyarakat Banyuwangi dan jejak Kerajaan Blambangan.
                        Nilai leluhur terus hidup melalui bahasa,
                        tradisi, seni, dan kehidupan masyarakat.

                    </p>


                    <div class="grid grid-cols-2 gap-4 mt-8">

                        <div class="dark-card">

                            <div class="text-[#c9933b] text-2xl font-cinzel font-bold">
                                1771
                            </div>

                            <p class="text-[11px] text-white/45 mt-2">
                                Puputan Bayu
                            </p>

                        </div>


                        <div class="dark-card">

                            <div class="text-[#a8432a] text-2xl font-cinzel font-bold">
                                Osing
                            </div>

                            <p class="text-[11px] text-white/45 mt-2">
                                Identitas masyarakat
                            </p>

                        </div>

                    </div>

                </div>


                {{-- TIMELINE --}}

                <div class="lg:col-span-7">

                    <div class="dark-card relative overflow-hidden">

                        <div class="absolute top-0 right-0
                                    font-cinzel
                                    text-8xl
                                    font-bold
                                    text-[#c9933b]/[.035]">

                            1771

                        </div>

                        <h3 class="font-serif text-2xl font-bold text-[#c9933b] mb-8 relative z-10">
                            Perjalanan Sejarah
                        </h3>


                        <div class="timeline space-y-8">

                            <div class="timeline-line"></div>


                            <div class="flex gap-5 relative">

                                <div class="timeline-dot">
                                    01
                                </div>

                                <div>

                                    <h4 class="font-bold text-sm text-[#e5b869]">
                                        Kerajaan Blambangan
                                    </h4>

                                    <p class="text-xs text-white/50 leading-6 mt-2">
                                        Blambangan menjadi salah satu pusat
                                        kekuasaan di ujung timur Pulau Jawa
                                        dan meninggalkan jejak budaya yang
                                        kuat bagi masyarakat Banyuwangi.
                                    </p>

                                </div>

                            </div>


                            <div class="flex gap-5 relative">

                                <div class="timeline-dot bg-[#a8432a] text-white">
                                    02
                                </div>

                                <div>

                                    <h4 class="font-bold text-sm text-[#e5b869]">
                                        Puputan Bayu — 1771
                                    </h4>

                                    <p class="text-xs text-white/50 leading-6 mt-2">
                                        Peristiwa perjuangan rakyat Blambangan
                                        yang menjadi salah satu bagian penting
                                        dalam sejarah Banyuwangi.
                                    </p>

                                </div>

                            </div>


                            <div class="flex gap-5 relative">

                                <div class="timeline-dot bg-[#4a5738] text-white">
                                    03
                                </div>

                                <div>

                                    <h4 class="font-bold text-sm text-[#e5b869]">
                                        Warisan yang Terus Hidup
                                    </h4>

                                    <p class="text-xs text-white/50 leading-6 mt-2">
                                        Bahasa, arsitektur, kesenian,
                                        kuliner, dan tradisi terus
                                        diwariskan dari generasi ke generasi.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
         TRADISI
    ====================================================== --}}

    <section class="py-24 bg-[#f2e8d5]/45">

        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-5 mb-10">

                <div>

                    <span class="section-label">
                        Warisan Budaya
                    </span>

                    <h2 class="font-serif text-4xl sm:text-5xl font-bold mt-4 tracking-tight">
                        Tradisi & Kesenian
                    </h2>

                    <p class="text-sm text-[#2c1e16]/58 mt-3 max-w-xl leading-6">
                        Beragam tradisi dan kesenian yang menjadi
                        identitas masyarakat Osing Banyuwangi.
                    </p>

                </div>

                <a href="{{ route('budaya.tradisi.index') }}"
                   class="inline-flex items-center gap-2
                          text-sm font-bold
                          text-[#a8432a]
                          hover:text-[#83311c]
                          transition">

                    Lihat semua

                    <i class="fa-solid fa-arrow-right text-[10px]"></i>

                </a>

            </div>


            <div class="grid md:grid-cols-3 gap-5">

                @forelse($tradisiTerbaru as $index => $item)

                    <a href="{{ route('budaya.tradisi.show', $item['id']) }}"
                       class="culture-card group">

                        <div class="relative z-10">

                            <div class="flex justify-between items-start">

                                <span class="culture-number">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>

                                <span class="text-[9px]
                                             uppercase
                                             tracking-widest
                                             font-bold
                                             text-[#c9933b]">

                                    {{ $item['kategori'] }}

                                </span>

                            </div>


                            <div class="w-12 h-12
                                        rounded-2xl
                                        bg-[#a8432a]/10
                                        text-[#a8432a]
                                        flex items-center justify-center
                                        mt-7
                                        group-hover:bg-[#a8432a]
                                        group-hover:text-white
                                        transition">

                                <i class="fa-solid fa-masks-theater"></i>

                            </div>


                            <h3 class="font-serif text-2xl font-bold mt-5
                                       group-hover:text-[#a8432a]
                                       transition-colors">

                                {{ $item['nama'] }}

                            </h3>


                            <p class="text-xs text-[#2c1e16]/58 leading-6 mt-3">

                                {{ \Illuminate\Support\Str::limit($item['deskripsi'], 110) }}

                            </p>


                            <div class="mt-6
                                        text-xs
                                        font-bold
                                        text-[#a8432a]
                                        flex items-center gap-2">

                                Pelajari budaya

                                <i class="fa-solid fa-arrow-right text-[9px]
                                          transition-transform
                                          group-hover:translate-x-1"></i>

                            </div>

                        </div>

                    </a>

                @empty

                    <div class="md:col-span-3 py-16 text-center">

                        <div class="w-16 h-16 rounded-2xl
                                    bg-[#a8432a]/10
                                    text-[#a8432a]
                                    mx-auto
                                    flex items-center justify-center
                                    text-xl">

                            <i class="fa-solid fa-masks-theater"></i>

                        </div>

                        <p class="text-sm text-[#2c1e16]/50 mt-4">
                            Belum ada data tradisi.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </section>


    {{-- =====================================================
         CULTURE HIGHLIGHT
    ====================================================== --}}

    <section class="py-24 bg-[#fbf7ee]">

        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            <div class="highlight-box osing-dark-pattern p-8 sm:p-12">

                <div class="relative z-10 grid lg:grid-cols-12 gap-12 items-center">

                    {{-- TEXT --}}

                    <div class="lg:col-span-7">

                        <span class="text-[10px]
                                     uppercase
                                     tracking-[.2em]
                                     font-extrabold
                                     text-[#c9933b]">

                            Mari menjaga warisan

                        </span>

                        <h2 class="font-serif text-4xl sm:text-5xl font-bold text-white mt-4 leading-tight tracking-tight">

                            Budaya bukan hanya

                            <span class="text-[#c9933b] italic">
                                masa lalu.
                            </span>

                        </h2>

                        <p class="text-sm text-white/55 leading-7 mt-5 max-w-xl">

                            Bahasa, cerita, rumah, makanan, dan kesenian
                            adalah bagian dari identitas yang masih hidup.
                            Kenali, pelajari, dan ikut menjaga warisan
                            budaya Osing Banyuwangi.

                        </p>

                        <div class="flex flex-wrap gap-3 mt-7">

                            <a href="{{ route('budaya.kamus.index') }}"
                               class="osing-btn-primary">

                                Mulai menjelajah

                                <i class="fa-solid fa-arrow-right text-[10px]"></i>

                            </a>

                        </div>

                    </div>


                    {{-- MINI CARDS --}}

                    <div class="lg:col-span-5">

                        <div class="grid grid-cols-2 gap-3">

                            <div class="highlight-mini-card">

                                <div class="text-2xl">
                                    🏡
                                </div>

                                <div class="font-serif text-lg font-bold text-[#e5b869] mt-4">
                                    Rumah
                                </div>

                                <div class="text-[10px] text-white/40 mt-1">
                                    Arsitektur khas Osing
                                </div>

                            </div>


                            <div class="highlight-mini-card">

                                <div class="text-2xl">
                                    🎭
                                </div>

                                <div class="font-serif text-lg font-bold text-[#e5b869] mt-4">
                                    Seni
                                </div>

                                <div class="text-[10px] text-white/40 mt-1">
                                    Gandrung & tradisi
                                </div>

                            </div>


                            <div class="highlight-mini-card">

                                <div class="text-2xl">
                                    🍚
                                </div>

                                <div class="font-serif text-lg font-bold text-[#e5b869] mt-4">
                                    Kuliner
                                </div>

                                <div class="text-[10px] text-white/40 mt-1">
                                    Cita rasa Banyuwangi
                                </div>

                            </div>


                            <div class="highlight-mini-card">

                                <div class="text-2xl">
                                    🧵
                                </div>

                                <div class="font-serif text-lg font-bold text-[#e5b869] mt-4">
                                    Batik
                                </div>

                                <div class="text-[10px] text-white/40 mt-1">
                                    Motif penuh filosofi
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection
