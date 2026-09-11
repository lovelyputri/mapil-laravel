@extends('budaya.layout')

@section('title', 'Kuliner Banyuwangi')

@section('content')

<div class="max-w-7xl mx-auto px-5 lg:px-8 py-14">

    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">

        <div>

            <span class="text-xs uppercase tracking-widest font-bold text-[#A85432]">
                Cita Rasa Banyuwangi
            </span>

            <h1 class="font-display text-4xl md:text-5xl font-bold mt-2">
                Kuliner
            </h1>

            <p class="text-[#4A2C20]/60 mt-3">
                Mengenal makanan khas yang menjadi bagian dari budaya Banyuwangi.
            </p>

        </div>

        <a href="{{ route('budaya.kuliner.create') }}"
            class="px-5 py-3 rounded-xl bg-[#4A2C20] text-white font-bold text-sm text-center">
            + Tambah Kuliner
        </a>

    </div>


    <form method="GET"
        class="bg-white rounded-3xl p-4 mb-8 shadow-sm">

        <div class="flex gap-3">

            <input
                type="text"
                name="search"
                value="{{ $search }}"
                placeholder="Cari kuliner atau bahan..."
                class="flex-1 px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none">

            <button
                class="px-6 rounded-xl bg-[#A85432] text-white font-bold text-sm">
                Cari
            </button>

        </div>

    </form>


    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-5">

        @forelse($data as $item)

            <div class="card bg-white rounded-3xl overflow-hidden shadow-sm border border-[#4A2C20]/5">

                <div class="h-36 bg-[#A85432] relative">

                    <div class="absolute inset-0 pattern"></div>

                    <div class="absolute bottom-5 left-5 right-5">

                        <span class="text-[10px] uppercase tracking-widest text-[#E9D7B7] font-bold">
                            {{ $item['kategori'] }}
                        </span>

                        <h2 class="font-display text-xl text-white font-bold mt-1">
                            {{ $item['nama'] }}
                        </h2>

                    </div>

                </div>


                <div class="p-5">

                    <p class="text-xs text-[#4A2C20]/60 leading-5">
                        {{ \Illuminate\Support\Str::limit($item['deskripsi'], 100) }}
                    </p>


                    <div class="flex gap-2 mt-5">

                        <a href="{{ route('budaya.kuliner.show', $item['id']) }}"
                            class="flex-1 text-center px-2 py-2.5 rounded-xl bg-[#F8F2E8] text-xs font-bold">
                            Detail
                        </a>

                        <a href="{{ route('budaya.kuliner.edit', $item['id']) }}"
                            class="px-3 py-2.5 rounded-xl bg-[#C89B3C]/15 text-[#8B681D] text-xs font-bold">
                            Edit
                        </a>

                        <form method="POST"
                            action="{{ route('budaya.kuliner.destroy', $item['id']) }}"
                            onsubmit="return confirm('Hapus kuliner ini?')">

                            @csrf
                            @method('DELETE')

                            <button
                                class="px-3 py-2.5 rounded-xl bg-red-50 text-red-600 text-xs font-bold">
                                Hapus
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-span-full text-center py-16 bg-white rounded-3xl">
                Data kuliner tidak ditemukan.
            </div>

        @endforelse

    </div>

</div>

@endsection
