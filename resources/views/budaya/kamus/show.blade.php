@extends('budaya.layout')

@section('title', $item['kata'] . ' - Kamus Osing')

@section('content')

<div class="max-w-4xl mx-auto px-5 lg:px-8 py-14">

    <a href="{{ route('budaya.kamus.index') }}"
        class="text-sm font-bold text-[#A85432]">
        ← Kembali ke Kamus
    </a>


    <div class="bg-[#4A2C20] text-white rounded-[2rem] p-8 md:p-12 mt-6">

        <span class="text-xs uppercase tracking-widest text-[#C89B3C] font-bold">
            {{ $item['kategori'] }}
        </span>

        <h1 class="font-display text-5xl font-bold mt-5">
            {{ $item['kata'] }}
        </h1>

        <p class="text-[#E9D7B7] text-xl mt-2">
            {{ $item['arti'] }}
        </p>

    </div>


    <div class="grid md:grid-cols-2 gap-5 mt-6">

        <div class="bg-white rounded-3xl p-7">

            <p class="text-xs uppercase tracking-widest text-[#A85432] font-bold">
                Contoh Kalimat
            </p>

            <p class="font-display text-xl mt-4 leading-8">
                "{{ $item['contoh'] ?: 'Belum ada contoh kalimat.' }}"
            </p>

        </div>


        <div class="bg-white rounded-3xl p-7">

            <p class="text-xs uppercase tracking-widest text-[#A85432] font-bold">
                Keterangan
            </p>

            <p class="text-sm text-[#4A2C20]/70 mt-4 leading-7">
                {{ $item['keterangan'] ?: 'Belum ada keterangan.' }}
            </p>

        </div>

    </div>


    <div class="flex gap-3 mt-6">

        <a href="{{ route('budaya.kamus.edit', $item['id']) }}"
            class="px-6 py-3 rounded-xl bg-[#C89B3C] text-[#4A2C20] font-bold text-sm">
            Edit
        </a>

        <form method="POST"
            action="{{ route('budaya.kamus.destroy', $item['id']) }}"
            onsubmit="return confirm('Hapus kosakata ini?')">

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
