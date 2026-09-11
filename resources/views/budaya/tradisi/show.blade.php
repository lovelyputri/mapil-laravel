@extends('budaya.layout')

@section('title', $item['nama'])

@section('content')

<div class="max-w-4xl mx-auto px-5 lg:px-8 py-14">

    <a href="{{ route('budaya.tradisi.index') }}"
        class="text-sm font-bold text-[#A85432]">
        ← Kembali ke Tradisi
    </a>


    <div class="bg-[#4A2C20] rounded-[2rem] p-8 md:p-12 mt-6 text-white">

        <span class="text-xs uppercase tracking-widest text-[#C89B3C] font-bold">
            {{ $item['kategori'] }}
        </span>

        <h1 class="font-display text-4xl md:text-5xl font-bold mt-4">
            {{ $item['nama'] }}
        </h1>

        <p class="text-[#E9D7B7] mt-4">
            📍 {{ $item['lokasi'] }}
        </p>

    </div>


    <div class="bg-white rounded-3xl p-7 md:p-9 mt-6">

        <p class="text-xs uppercase tracking-widest text-[#A85432] font-bold">
            Tentang Tradisi
        </p>

        <p class="text-[#4A2C20]/70 leading-8 mt-5">
            {{ $item['deskripsi'] }}
        </p>

    </div>


    <div class="flex gap-3 mt-6">

        <a href="{{ route('budaya.tradisi.edit', $item['id']) }}"
            class="px-6 py-3 rounded-xl bg-[#C89B3C] text-[#4A2C20] font-bold text-sm">
            Edit
        </a>

        <form method="POST"
            action="{{ route('budaya.tradisi.destroy', $item['id']) }}"
            onsubmit="return confirm('Hapus tradisi ini?')">

            @csrf
            @method('DELETE')

            <button
                class="px-6 py-3 rounded-xl bg-red-50 text-red-600 font-bold text-sm">
                Hapus
            </button>

        </form>

    </div>

</div>

@endsection
