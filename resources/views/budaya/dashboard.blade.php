@extends('budaya.layout')

@section('title', 'Beranda - Warisan Osing')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

    :root {
        --brown: #2c1e16;
        --dark: #1c120c;
        --terracotta: #a8432a;
        --terracotta-dark: #83311c;
        --gold: #c9933b;
        --gold-light: #e5b869;
        --cream: #fbf7ee;
        --cream-dark: #f2e8d5;
        --olive: #4a5738;
    }

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

    /* =========================
       PATTERN
    ========================= */

    .osing-pattern {
        background-image:
            radial-gradient(rgba(201,147,59,.22) .7px, transparent .7px),
            radial-gradient(rgba(168,67,42,.12) .7px, transparent .7px);
        background-size: 30px 30px;
        background-position: 0 0, 15px 15px;
    }

    .osing-dark-pattern {
        background-image:
            radial-gradient(rgba(201,147,59,.13) .8px, transparent .8px);
        background-size: 25px 25px;
    }

    /* =========================
       HERO
    ========================= */

    .osing-hero {
        position: relative;
        min-height: 680px;
        display: flex;
        align-items: center;
        overflow: hidden;
        padding: 80px 0 90px;
    }

    .hero-orb-one,
    .hero-orb-two {
        position: absolute;
        border-radius: 999px;
        pointer-events: none;
        filter: blur(70px);
    }

    .hero-orb-one {
        width: 330px;
        height: 330px;
        left: -100px;
        top: 100px;
        background: rgba(201,147,59,.18);
    }

    .hero-orb-two {
        width: 420px;
        height: 420px;
        right: -150px;
        bottom: -80px;
        background: rgba(168,67,42,.13);
    }

    .hero-image {
        height: 490px;
        border-radius: 32px;
        overflow: hidden;
        border: 5px solid white;
        box-shadow: 0 30px 70px rgba(44,30,22,.22);
        transform: rotate(2deg);
        transition: .5s ease;
    }

    .hero-image:hover {
        transform: rotate(0deg) scale(1.01);
    }

    .hero-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to top,
            rgba(28,18,12,.92),
            rgba(28,18,12,.15),
            transparent
        );
    }

    /* =========================
       FLOAT CARD
    ========================= */

    .floating-card {
        position: absolute;
        z-index: 20;
        background: rgba(255,255,255,.86);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(201,147,59,.35);
        box-shadow: 0 18px 40px rgba(44,30,22,.15);
    }

    .floating-card.bottom {
        left: -30px;
        bottom: -28px;
    }

    .floating-card.top {
        right: -25px;
        top: -25px;
        background: var(--dark);
        color: white;
    }

    @keyframes osingFloat {
        0%,100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-8px);
        }
    }

    .floating-animation {
        animation: osingFloat 5s ease-in-out infinite;
    }

    /* =========================
       BUTTON
    ========================= */

    .osing-btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 14px 22px;
        border-radius: 15px;
        background: linear-gradient(
            135deg,
            var(--terracotta),
            var(--terracotta-dark)
        );
        color: white;
        font-size: 13px;
        font-weight: 800;
        box-shadow: 0 12px 25px rgba(168,67,42,.22);
        transition: .3s ease;
    }

    .osing-btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 18px 30px rgba(168,67,42,.3);
    }

    .osing-btn-secondary {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 14px 22px;
        border-radius: 15px;
        background: white;
        color: var(--brown);
        border: 1px solid rgba(201,147,59,.35);
        font-size: 13px;
        font-weight: 800;
        transition: .3s ease;
    }

    .osing-btn-secondary:hover {
        background: var(--cream-dark);
        transform: translateY(-2px);
    }

    /* =========================
       STAT
    ========================= */

    .stat-card {
        background: rgba(255,255,255,.85);
        border: 1px solid rgba(44,30,22,.06);
        border-radius: 24px;
        padding: 24px;
        transition: .3s ease;
        box-shadow: 0 8px 25px rgba(44,30,22,.04);
    }

    .stat-card:hover {
        transform: translateY(-4px);
        border-color: rgba(201,147,59,.35);
        box-shadow: 0 15px 30px rgba(44,30,22,.08);
    }

    .stat-icon {
        width: 46px;
        height: 46px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(168,67,42,.1);
        color: var(--terracotta);
    }

    /* =========================
       SECTION
    ========================= */

    .section-label {
        display: inline-flex;
        padding: 7px 12px;
        border-radius: 999px;
        background: rgba(168,67,42,.08);
        border: 1px solid rgba(168,67,42,.15);
        color: var(--terracotta);
        font-size: 10px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .16em;
    }

    /* =========================
       CARDS
    ========================= */

    .culture-card {
        background: white;
        border: 1px solid rgba(44,30,22,.06);
        border-radius: 26px;
        padding: 25px;
        transition: .35s ease;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .culture-card::before {
        content: '';
        position: absolute;
        width: 90px;
        height: 90px;
        border-radius: 999px;
        background: rgba(201,147,59,.08);
        right: -30px;
        top: -30px;
    }

    .culture-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 20px 45px rgba(44,30,22,.1);
        border-color: rgba(201,147,59,.3);
    }

    .culture-number {
        font-family: 'Cinzel', serif;
        font-size: 11px;
        font-weight: 800;
        color: var(--gold);
    }

    /* =========================
       DARK SECTION
    ========================= */

    .dark-section {
        background: var(--dark);
        color: white;
    }

    .dark-card {
        background: rgba(255,255,255,.045);
        border: 1px solid rgba(201,147,59,.2);
        border-radius: 26px;
        padding: 26px;
        transition: .3s ease;
    }

    .dark-card:hover {
        background: rgba(255,255,255,.07);
        border-color: rgba(201,147,59,.4);
        transform: translateY(-5px);
    }

    /* =========================
       TIMELINE
    ========================= */

    .timeline-line {
        position: absolute;
        left: 13px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: rgba(201,147,59,.25);
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
        font-size: 11px;
        font-weight: 800;
        box-shadow: 0 0 0 5px var(--dark);
        flex-shrink: 0;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media(max-width: 1024px) {
        .osing-hero {
            min-height: auto;
            padding-top: 55px;
        }

        .hero-image {
            transform: none;
            height: 430px;
        }

        .floating-card.bottom {
            left: 10px;
        }

        .floating-card.top {
            right: 10px;
        }
    }

    @media(max-width: 640px) {
        .osing-hero {
            padding: 45px 0 70px;
        }

        .hero-image {
            height: 360px;
            border-radius: 25px;
        }

        .floating-card {
            position: relative;
            inset: auto !important;
            margin-top: 14px;
        }
    }
</style>


<div class="osing-page">

    {{-- =====================================================
        HERO
    ====================================================== --}}

    <section class="osing-hero osing-pattern">

        <div class="hero-orb-one"></div>
        <div class="hero-orb-two"></div>

        <div class="max-w-7xl mx-auto px-5 lg:px-8 w-full relative z-10">

            <div class="grid lg:grid-cols-12 gap-12 items-center">

                {{-- HERO TEXT --}}
                <div class="lg:col-span-7">

                    <div class="section-label mb-6">
                        Ensiklopedia Kebudayaan Banyuwangi
                    </div>

                    <h1 class="font-serif text-5xl sm:text-6xl lg:text-7xl font-bold leading-[1.08] text-[#2c1e16]">

                        Mengenal Lebih Dekat

                        <span class="block italic text-[#a8432a] mt-2">
                            Warisan Osing.
                        </span>

                    </h1>

                    <p class="mt-7 max-w-2xl text-base sm:text-lg leading-8 text-[#2c1e16]/70">

                        Jelajahi sejarah, bahasa, rumah adat, tradisi,
                        kesenian, batik, dan kuliner khas masyarakat
                        Osing Banyuwangi dalam satu ruang digital.

                    </p>

                    <div class="flex flex-wrap gap-3 mt-8">

                        <a href="{{ route('budaya.kamus.index') }}"
                           class="osing-btn-primary">

                            <i class="fa-solid fa-book-open"></i>

                            Jelajahi Kamus

                        </a>

                        <a href="{{ route('budaya.kuis') }}"
                           class="osing-btn-secondary">

                            <i class="fa-solid fa-circle-question"></i>

                            Coba Kuis

                        </a>

                    </div>

                    {{-- QUICK STATS --}}

                    <div class="grid grid-cols-3 gap-5 mt-10 pt-7 border-t border-[#c9933b]/25">

                        <div>

                            <div class="font-cinzel text-2xl sm:text-3xl font-bold text-[#a8432a]">
                                {{ $jumlahKamus }}+
                            </div>

                            <div class="text-[11px] sm:text-xs text-[#2c1e16]/60 mt-1">
                                Kosakata Osing
                            </div>

                        </div>

                        <div>

                            <div class="font-cinzel text-2xl sm:text-3xl font-bold text-[#c9933b]">
                                1771
                            </div>

                            <div class="text-[11px] sm:text-xs text-[#2c1e16]/60 mt-1">
                                Puputan Bayu
                            </div>

                        </div>

                        <div>

                            <div class="font-cinzel text-2xl sm:text-3xl font-bold text-[#4a5738]">
                                3
                            </div>

                            <div class="text-[11px] sm:text-xs text-[#2c1e16]/60 mt-1">
                                Bentuk Rumah Adat
                            </div>

                        </div>

                    </div>

                </div>


                {{-- HERO VISUAL --}}
                <div class="lg:col-span-5 relative">

                    <div class="relative">

                        <div class="hero-image">

                            <img
                                src="https://tse1.mm.bing.net/th/id/OIP.j_jCFyZ92d3OB_8bNmKb7AHaEy?r=0&pid=Api&P=0&h=180"
                                alt="Budaya Osing Banyuwangi"
                            >

                            <div class="hero-overlay"></div>

                            <div class="absolute bottom-0 left-0 right-0 p-7 text-white">

                                <span class="inline-flex px-3 py-1 rounded-md bg-[#c9933b] text-[#1c120c] text-[10px] font-extrabold uppercase tracking-wider">
                                    Ikon Banyuwangi
                                </span>

                                <h3 class="font-serif text-3xl font-bold mt-3">
                                    Tari Gandrung
                                </h3>

                                <p class="text-xs text-white/75 mt-1">
                                    Salah satu identitas budaya paling kuat
                                    dari Banyuwangi.
                                </p>

                            </div>

                        </div>


                        {{-- FLOAT CARD --}}
                        <div class="floating-card bottom rounded-2xl p-4 max-w-[245px] floating-animation">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11 rounded-xl bg-[#a8432a]/10 flex items-center justify-center text-xl">
                                    🛖
                                </div>

                                <div>

                                    <div class="font-serif font-bold text-sm text-[#2c1e16]">
                                        Desa Kemiren
                                    </div>

                                    <div class="text-[10px] text-[#2c1e16]/60 mt-1">
                                        Pusat pelestarian budaya Osing
                                    </div>

                                </div>

                            </div>

                        </div>


                        {{-- TOP BADGE --}}
                        <div class="floating-card top rounded-2xl px-4 py-3">

                            <div class="flex items-center gap-3">

                                <div class="w-8 h-8 rounded-full bg-[#c9933b]/15 flex items-center justify-center text-[#c9933b]">
                                    <i class="fa-solid fa-quote-left text-xs"></i>
                                </div>

                                <div>

                                    <div class="font-bold text-xs">
                                        "Isun Wong Osing"
                                    </div>

                                    <div class="text-[10px] text-white/50 mt-1">
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

    <section class="relative z-20 -mt-8 pb-16">

        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

                {{-- KAMUS --}}
                <div class="stat-card">

                    <div class="flex items-start justify-between">

                        <div>

                            <div class="text-3xl font-cinzel font-bold text-[#a8432a]">
                                {{ $jumlahKamus }}
                            </div>

                            <div class="text-xs text-[#2c1e16]/55 mt-1">
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

                    <div class="flex items-start justify-between">

                        <div>

                            <div class="text-3xl font-cinzel font-bold text-[#c9933b]">
                                {{ $jumlahRumah }}
                            </div>

                            <div class="text-xs text-[#2c1e16]/55 mt-1">
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

                    <div class="flex items-start justify-between">

                        <div>

                            <div class="text-3xl font-cinzel font-bold text-[#4a5738]">
                                {{ $jumlahTradisi }}
                            </div>

                            <div class="text-xs text-[#2c1e16]/55 mt-1">
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

                    <div class="flex items-start justify-between">

                        <div>

                            <div class="text-3xl font-cinzel font-bold text-[#a8432a]">
                                {{ $jumlahKuliner }}
                            </div>

                            <div class="text-xs text-[#2c1e16]/55 mt-1">
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

                    <h2 class="font-serif text-4xl sm:text-5xl font-bold mt-4 text-[#2c1e16]">
                        Kamus Bahasa Osing
                    </h2>

                    <p class="text-sm text-[#2c1e16]/60 mt-3 max-w-xl">
                        Kenali kosakata sehari-hari masyarakat Osing
                        dan pahami makna di balik setiap katanya.
                    </p>

                </div>

                <a href="{{ route('budaya.kamus.index') }}"
                   class="text-sm font-bold text-[#a8432a] hover:text-[#83311c]">

                    Lihat semua
                    <span class="ml-1">→</span>

                </a>

            </div>


            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">

                @forelse($kamusTerbaru as $index => $item)

                    <a href="{{ route('budaya.kamus.show', $item['id']) }}"
                       class="culture-card group">

                        <div class="flex items-center justify-between">

                            <span class="culture-number">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>

                            <span class="px-3 py-1 rounded-full bg-[#c9933b]/10 text-[#c9933b] text-[9px] font-extrabold uppercase tracking-wider">
                                {{ $item['kategori'] }}
                            </span>

                        </div>

                        <h3 class="font-serif text-2xl font-bold mt-6 text-[#2c1e16] group-hover:text-[#a8432a] transition-colors">
                            {{ $item['kata'] }}
                        </h3>

                        <p class="text-sm text-[#2c1e16]/60 mt-2">
                            {{ $item['arti'] }}
                        </p>

                        <div class="mt-7 pt-4 border-t border-[#c9933b]/15 text-xs font-bold text-[#a8432a]">
                            Pelajari arti
                            <span class="ml-1 transition-transform inline-block group-hover:translate-x-1">
                                →
                            </span>
                        </div>

                    </a>

                @empty

                    <div class="md:col-span-3 py-16 text-center">

                        <div class="text-4xl mb-4">
                            📖
                        </div>

                        <p class="text-sm text-[#2c1e16]/50">
                            Belum ada kosakata.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </section>


    {{-- =====================================================
        SEJARAH / IDENTITAS
    ====================================================== --}}

    <section class="dark-section osing-dark-pattern py-24">

        <div class="max-w-7xl mx-auto px-5 lg:px-8">

            <div class="grid lg:grid-cols-12 gap-12 items-center">

                <div class="lg:col-span-5">

                    <span class="inline-flex px-3 py-1 rounded-full bg-[#c9933b]/10 border border-[#c9933b]/25 text-[#c9933b] text-[10px] font-extrabold uppercase tracking-widest">
                        Sejarah & Identitas
                    </span>

                    <h2 class="font-serif text-4xl sm:text-5xl font-bold text-white mt-5 leading-tight">
                        Jejak Wong Osing
                    </h2>

                    <p class="text-sm text-white/60 leading-7 mt-5">
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

                            <p class="text-[11px] text-white/50 mt-2">
                                Puputan Bayu
                            </p>

                        </div>

                        <div class="dark-card">

                            <div class="text-[#a8432a] text-2xl font-cinzel font-bold">
                                Osing
                            </div>

                            <p class="text-[11px] text-white/50 mt-2">
                                Identitas masyarakat
                            </p>

                        </div>

                    </div>

                </div>


                <div class="lg:col-span-7">

                    <div class="dark-card relative overflow-hidden">

                        <div class="absolute top-0 right-0 font-cinzel text-8xl font-bold text-[#c9933b]/5">
                            1771
                        </div>

                        <h3 class="font-serif text-2xl font-bold text-[#c9933b] mb-8">
                            Perjalanan Sejarah
                        </h3>

                        <div class="relative space-y-8">

                            <div class="timeline-line"></div>

                            <div class="flex gap-5 relative">

                                <div class="timeline-dot">
                                    01
                                </div>

                                <div>

                                    <h4 class="font-bold text-sm text-[#e5b869]">
                                        Kerajaan Blambangan
                                    </h4>

                                    <p class="text-xs text-white/55 leading-6 mt-2">
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

                                    <p class="text-xs text-white/55 leading-6 mt-2">
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

                                    <p class="text-xs text-white/55 leading-6 mt-2">
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

                    <h2 class="font-serif text-4xl sm:text-5xl font-bold mt-4">
                        Tradisi & Kesenian
                    </h2>

                    <p class="text-sm text-[#2c1e16]/60 mt-3 max-w-xl">
                        Beragam tradisi dan kesenian yang menjadi
                        identitas masyarakat Osing Banyuwangi.
                    </p>

                </div>

                <a href="{{ route('budaya.tradisi.index') }}"
                   class="text-sm font-bold text-[#a8432a]">

                    Lihat semua →

                </a>

            </div>


            <div class="grid md:grid-cols-3 gap-5">

                @forelse($tradisiTerbaru as $index => $item)

                    <a href="{{ route('budaya.tradisi.show', $item['id']) }}"
                       class="culture-card group">

                        <div class="flex justify-between items-start">

                            <span class="culture-number">
                                0{{ $index + 1 }}
                            </span>

                            <span class="text-[9px] uppercase tracking-widest font-bold text-[#c9933b]">
                                {{ $item['kategori'] }}
                            </span>

                        </div>

                        <div class="w-12 h-12 rounded-2xl bg-[#a8432a]/10 text-[#a8432a] flex items-center justify-center mt-7">
                            <i class="fa-solid fa-masks-theater"></i>
                        </div>

                        <h3 class="font-serif text-2xl font-bold mt-5">
                            {{ $item['nama'] }}
                        </h3>

                        <p class="text-xs text-[#2c1e16]/60 leading-6 mt-3">
                            {{ \Illuminate\Support\Str::limit($item['deskripsi'], 110) }}
                        </p>

                        <div class="mt-6 text-xs font-bold text-[#a8432a]">
                            Pelajari budaya
                            <span class="ml-1">
                                →
                            </span>
                        </div>

                    </a>

                @empty

                    <div class="md:col-span-3 py-16 text-center">

                        <div class="text-4xl mb-4">
                            🎭
                        </div>

                        <p class="text-sm text-[#2c1e16]/50">
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

            <div class="relative overflow-hidden rounded-[32px] bg-[#2c1e16] osing-dark-pattern p-8 sm:p-12">

                <div class="absolute -right-20 -top-20 w-72 h-72 rounded-full border border-[#c9933b]/10"></div>

                <div class="absolute -right-10 -bottom-20 w-64 h-64 rounded-full border border-[#a8432a]/10"></div>

                <div class="relative z-10 grid lg:grid-cols-12 gap-10 items-center">

                    <div class="lg:col-span-7">

                        <span class="text-[10px] uppercase tracking-[.2em] font-extrabold text-[#c9933b]">
                            Mari menjaga warisan
                        </span>

                        <h2 class="font-serif text-4xl sm:text-5xl font-bold text-white mt-4 leading-tight">
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
                                <span>→</span>

                            </a>

                        </div>

                    </div>


                    <div class="lg:col-span-5">

                        <div class="grid grid-cols-2 gap-3">

                            <div class="dark-card">

                                <div class="text-2xl">
                                    🏡
                                </div>

                                <div class="font-serif text-lg font-bold text-[#e5b869] mt-4">
                                    Rumah
                                </div>

                                <div class="text-[10px] text-white/45 mt-1">
                                    Arsitektur khas Osing
                                </div>

                            </div>

                            <div class="dark-card">

                                <div class="text-2xl">
                                    🎭
                                </div>

                                <div class="font-serif text-lg font-bold text-[#e5b869] mt-4">
                                    Seni
                                </div>

                                <div class="text-[10px] text-white/45 mt-1">
                                    Gandrung & tradisi
                                </div>

                            </div>

                            <div class="dark-card">

                                <div class="text-2xl">
                                    🍚
                                </div>

                                <div class="font-serif text-lg font-bold text-[#e5b869] mt-4">
                                    Kuliner
                                </div>

                                <div class="text-[10px] text-white/45 mt-1">
                                    Cita rasa Banyuwangi
                                </div>

                            </div>

                            <div class="dark-card">

                                <div class="text-2xl">
                                    🧵
                                </div>

                                <div class="font-serif text-lg font-bold text-[#e5b869] mt-4">
                                    Batik
                                </div>

                                <div class="text-[10px] text-white/45 mt-1">
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

