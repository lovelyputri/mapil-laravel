@extends('budaya.layout')

@section('title', $item['nama'])

@section('content')

<div class="max-w-4xl mx-auto px-5 lg:px-8 py-14">

    <a href="{{ route('budaya.kuliner.index') }}"
        class="text-sm font-bold text-[#A85432]">
        ← Kembali ke Kuliner
    </a>


    <div class="bg-[#A85432] rounded-[2rem] p-8 md:p-12 mt-6 text-white">

        <span class="text-xs uppercase tracking-widest text-[#E9D7B7] font-bold">
            {{ $item['kategori'] }}
        </span>

        <h1 class="font-display text-4xl md:text-5xl font-bold mt-4">
            {{ $item['nama'] }}
        </h1>

    </div>


    <div class="grid md:grid-cols-2 gap-5 mt-6">

        <div class="bg-white rounded-3xl p-7">

            <p class="text-xs uppercase tracking-widest text-[#A85432] font-bold">
                Bahan
            </p>

            <p class="text-sm text-[#4A2C20]/70 mt-4 leading-7">
                {{ $item['bahan'] }}
            </p>

        </div>


        <div class="bg-white rounded-3xl p-7">

            <p class="text-xs uppercase tracking-widest text-[#A85432] font-bold">
                Keunikan
            </p>

            <p class="text-sm text-[#4A2C20]/70 mt-4 leading-7">
                {{ $item['keunikan'] }}
            </p>

        </div>

    </div>


    <div class="bg-white rounded-3xl p-7 mt-5">

        <p class="text-xs uppercase tracking-widest text-[#A85432] font-bold">
            Deskripsi
        </p>

        <p class="text-sm text-[#4A2C20]/70 mt-4 leading-8">
            {{ $item['deskripsi'] }}
        </p>

    </div>


    <div class="flex gap-3 mt-6">

        <a href="{{ route('budaya.kuliner.edit', $item['id']) }}"
            class="px-6 py-3 rounded-xl bg-[#C89B3C] text-[#4A2C20] font-bold text-sm">
            Edit
        </a>

        <form method="POST"
            action="{{ route('budaya.kuliner.destroy', $item['id']) }}"
            onsubmit="return confirm('Hapus kuliner ini?')">

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
