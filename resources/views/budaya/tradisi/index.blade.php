@extends('budaya.layout')

@section('title', 'Tradisi & Kesenian')

@section('content')

<div class="max-w-7xl mx-auto px-5 lg:px-8 py-14">

    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">

        <div>

            <span class="text-xs uppercase tracking-widest font-bold text-[#A85432]">
                Warisan Budaya
            </span>

            <h1 class="font-display text-4xl md:text-5xl font-bold mt-2">
                Tradisi & Kesenian
            </h1>

            <p class="text-[#4A2C20]/60 mt-3">
                Mengenal tradisi dan kesenian masyarakat Osing Banyuwangi.
            </p>

        </div>

        <a href="{{ route('budaya.tradisi.create') }}"
            class="px-5 py-3 rounded-xl bg-[#4A2C20] text-white font-bold text-sm text-center">
            + Tambah Tradisi
        </a>

    </div>


    <form method="GET"
        class="bg-white rounded-3xl p-4 mb-8 shadow-sm">

        <div class="grid md:grid-cols-[1fr_220px_auto] gap-3">

            <input
                type="text"
                name="search"
                value="{{ $search }}"
                placeholder="Cari tradisi atau lokasi..."
                class="px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none">

            <select
                name="kategori"
                class="px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none">

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


    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">

        @forelse($data as $item)

            <div class="card bg-white rounded-3xl p-6 shadow-sm border border-[#4A2C20]/5">

                <div class="flex justify-between">

                    <span class="px-3 py-1 rounded-full bg-[#A85432]/10 text-[#A85432] text-[10px] uppercase font-bold">
                        {{ $item['kategori'] }}
                    </span>

                </div>

                <h2 class="font-display text-2xl font-bold mt-5">
                    {{ $item['nama'] }}
                </h2>

                <p class="text-xs text-[#C89B3C] font-bold mt-2">
                    📍 {{ $item['lokasi'] }}
                </p>

                <p class="text-sm text-[#4A2C20]/60 leading-6 mt-4">
                    {{ \Illuminate\Support\Str::limit($item['deskripsi'], 120) }}
                </p>


                <div class="flex gap-2 mt-6">

                    <a href="{{ route('budaya.tradisi.show', $item['id']) }}"
                        class="flex-1 text-center px-3 py-2.5 rounded-xl bg-[#F8F2E8] text-xs font-bold">
                        Detail
                    </a>

                    <a href="{{ route('budaya.tradisi.edit', $item['id']) }}"
                        class="px-4 py-2.5 rounded-xl bg-[#C89B3C]/15 text-[#8B681D] text-xs font-bold">
                        Edit
                    </a>

                    <form method="POST"
                        action="{{ route('budaya.tradisi.destroy', $item['id']) }}"
                        onsubmit="return confirm('Hapus tradisi ini?')">

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

            <div class="col-span-full text-center py-16 bg-white rounded-3xl">
                Data tradisi tidak ditemukan.
            </div>

        @endforelse

    </div>

</div>

@endsection
