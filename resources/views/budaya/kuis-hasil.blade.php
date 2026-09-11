@extends('budaya.layout')

@section('title', 'Hasil Kuis')

@section('content')

<div class="max-w-2xl mx-auto px-5 lg:px-8 py-20">

    <div class="bg-[#4A2C20] rounded-[2rem] p-10 md:p-14 text-center text-white">

        <span class="text-xs uppercase tracking-widest text-[#C89B3C] font-bold">
            Hasil Kuis
        </span>


        @if($score >= 80)

            <h1 class="font-display text-4xl md:text-5xl font-bold mt-5">
                Luar Biasa!
            </h1>

            <p class="text-[#E9D7B7] mt-3">
                Kamu cukup mengenal budaya Osing.
            </p>

        @else

            <h1 class="font-display text-4xl md:text-5xl font-bold mt-5">
                Bagus!
            </h1>

            <p class="text-[#E9D7B7] mt-3">
                Terus pelajari budaya Osing agar semakin mengenal warisannya.
            </p>

        @endif


        <div class="mt-10">

            <div class="text-7xl font-display font-bold text-[#C89B3C]">
                {{ $score }}
            </div>

            <div class="text-[#E9D7B7] mt-2">
                dari 100
            </div>

        </div>


        <div class="flex flex-col sm:flex-row justify-center gap-3 mt-10">

            <a href="{{ route('budaya.kuis') }}"
                class="px-6 py-3 rounded-xl bg-[#C89B3C] text-[#4A2C20] font-bold text-sm">
                Ulangi Kuis
            </a>

            <a href="{{ route('budaya.dashboard') }}"
                class="px-6 py-3 rounded-xl border border-white/20 text-white font-bold text-sm">
                Kembali ke Beranda
            </a>

        </div>

    </div>

</div>

@endsection
