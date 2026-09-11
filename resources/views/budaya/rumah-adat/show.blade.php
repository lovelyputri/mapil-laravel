@extends('budaya.layout')

@section('title', $item['nama'])

@section('content')

<div class="max-w-4xl mx-auto px-5 lg:px-8 py-14">

    <a href="{{ route('budaya.rumah.index') }}"
        class="text-sm font-bold text-[#A85432]">
        ← Kembali ke Rumah Adat
    </a>


    <div class="bg-[#4A2C20] rounded-[2rem] p-8 md:p-12 mt-6 text-white">

        <span class="text-xs uppercase tracking-widest text-[#C89B3C] font-bold">
            {{ $item['jenis'] }}
        </span>

        <h1 class="font-display text-5xl font-bold mt-4">
            {{ $item['nama'] }}
        </h1>

    </div>


    <div class="grid gap-5 mt-6">

        <div class="bg-white rounded-3xl p-7">

            <p class="text-xs uppercase tracking-widest text-[#A85432] font-bold">
                Deskripsi
            </p>

            <p class="text-sm leading-7 mt-4 text-[#4A2C20]/70">
                {{ $item['deskripsi'] }}
            </p>

        </div>


        <div class="grid md:grid-cols-2 gap-5">

            <div class="bg-white rounded-3xl p-7">

                <p class="text-xs uppercase tracking-widest text-[#A85432] font-bold">
                    Ciri-ciri
                </p>

                <p class="text-sm leading-7 mt-4 text-[#4A2C20]/70">
                    {{ $item['ciri'] }}
                </p>

            </div>


            <div class="bg-white rounded-3xl p-7">

                <p class="text-xs uppercase tracking-widest text-[#A85432] font-bold">
                    Makna
                </p>

                <p class="text-sm leading-7 mt-4 text-[#4A2C20]/70">
                    {{ $item['makna'] }}
                </p>

            </div>

        </div>

    </div>


    <div class="flex gap-3 mt-6">

        <a href="{{ route('budaya.rumah.edit', $item['id']) }}"
            class="px-6 py-3 rounded-xl bg-[#C89B3C] text-[#4A2C20] font-bold text-sm">
            Edit
        </a>

        <form method="POST"
            action="{{ route('budaya.rumah.destroy', $item['id']) }}"
            onsubmit="return confirm('Hapus rumah adat ini?')">

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
