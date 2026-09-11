@extends('budaya.layout')

@section('title', 'Kamus Osing')

@section('content')

<div class="max-w-7xl mx-auto px-5 lg:px-8 py-14">

    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">

        <div>

            <span class="text-xs uppercase tracking-widest font-bold text-[#A85432]">
                Bahasa Osing
            </span>

            <h1 class="font-display text-4xl md:text-5xl font-bold mt-2">
                Kamus Osing
            </h1>

            <p class="text-[#4A2C20]/60 mt-3">
                Temukan arti kosakata khas masyarakat Osing.
            </p>

        </div>

        <a href="{{ route('budaya.kamus.create') }}"
            class="inline-flex justify-center px-5 py-3 rounded-xl bg-[#4A2C20] text-white font-bold text-sm">
            + Tambah Kosakata
        </a>

    </div>


    <!-- FILTER -->

    <form method="GET"
        class="bg-white rounded-3xl p-4 border border-[#4A2C20]/5 shadow-sm mb-8">

        <div class="grid md:grid-cols-[1fr_220px_auto] gap-3">

            <input
                type="text"
                name="search"
                value="{{ $search }}"
                placeholder="Cari kata atau arti..."
                class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none focus:ring-2 focus:ring-[#C89B3C] text-sm">

            <select
                name="kategori"
                class="px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none text-sm">

                <option value="">
                    Semua kategori
                </option>

                @foreach($kategoriList as $item)

                    <option
                        value="{{ $item }}"
                        {{ $kategori == $item ? 'selected' : '' }}>
                        {{ $item }}
                    </option>

                @endforeach

            </select>

            <button
                class="px-6 py-3 rounded-xl bg-[#A85432] text-white font-bold text-sm">
                Cari
            </button>

        </div>

    </form>


    <!-- DATA -->

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">

        @forelse($data as $item)

            <div class="card bg-white rounded-3xl p-6 border border-[#4A2C20]/5 shadow-sm">

                <div class="flex justify-between items-start">

                    <span class="px-3 py-1 rounded-full bg-[#C89B3C]/10 text-[#A85432] text-[10px] font-bold uppercase">
                        {{ $item['kategori'] }}
                    </span>

                </div>

                <h2 class="font-display text-2xl font-bold mt-5">
                    {{ $item['kata'] }}
                </h2>

                <p class="text-[#A85432] font-semibold mt-1">
                    {{ $item['arti'] }}
                </p>

                <p class="text-sm text-[#4A2C20]/60 mt-4 leading-6">
                    {{ \Illuminate\Support\Str::limit($item['keterangan'], 90) }}
                </p>


                <div class="flex gap-2 mt-6">

                    <a href="{{ route('budaya.kamus.show', $item['id']) }}"
                        class="flex-1 text-center px-3 py-2.5 rounded-xl bg-[#F8F2E8] text-[#4A2C20] text-xs font-bold">
                        Detail
                    </a>

                    <a href="{{ route('budaya.kamus.edit', $item['id']) }}"
                        class="px-4 py-2.5 rounded-xl bg-[#C89B3C]/15 text-[#8B681D] text-xs font-bold">
                        Edit
                    </a>

                    <form method="POST"
                        action="{{ route('budaya.kamus.destroy', $item['id']) }}"
                        onsubmit="return confirm('Hapus kosakata ini?')">

                        @csrf
                        @method('DELETE')

                        <button
                            class="px-4 py-2.5 rounded-xl bg-red-50 text-red-600 text-xs font-bold">
                            Hapus
                        </button>

                    </form>

                </div>

            </div>

        @empty

            <div class="col-span-full bg-white rounded-3xl py-16 text-center">

                <div class="text-4xl">
                    📖
                </div>

                <p class="font-bold mt-4">
                    Data tidak ditemukan
                </p>

                <p class="text-sm text-[#4A2C20]/50 mt-1">
                    Coba gunakan kata pencarian lain.
                </p>

            </div>

        @endforelse

    </div>

</div>

@endsection
