@extends('budaya.layout')

@section('title', 'Tambah Kuliner')

@section('content')

<div class="max-w-3xl mx-auto px-5 lg:px-8 py-14">

    <a href="{{ route('budaya.kuliner.index') }}"
        class="text-sm font-bold text-[#A85432]">
        ← Kembali
    </a>

    <h1 class="font-display text-4xl font-bold mt-6 mb-8">
        Tambah Kuliner
    </h1>


    <form method="POST"
        action="{{ route('budaya.kuliner.store') }}"
        class="bg-white rounded-3xl p-7 md:p-9 shadow-sm">

        @csrf

        <div class="grid gap-6">

            <div>

                <label class="block text-sm font-bold mb-2">
                    Nama Kuliner
                </label>

                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama') }}"
                    placeholder="Contoh: Pecel Pitik"
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none"
                    required>

            </div>


            <div>

                <label class="block text-sm font-bold mb-2">
                    Kategori
                </label>

                <select
                    name="kategori"
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none"
                    required>

                    <option value="">
                        Pilih kategori
                    </option>

                    <option value="Makanan Tradisional">
                        Makanan Tradisional
                    </option>

                    <option value="Minuman Tradisional">
                        Minuman Tradisional
                    </option>

                    <option value="Jajanan">
                        Jajanan
                    </option>

                </select>

            </div>


            <div>

                <label class="block text-sm font-bold mb-2">
                    Bahan
                </label>

                <textarea
                    name="bahan"
                    rows="4"
                    placeholder="Tuliskan bahan utama..."
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none"
                    required>{{ old('bahan') }}</textarea>

            </div>


            <div>

                <label class="block text-sm font-bold mb-2">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    rows="6"
                    placeholder="Jelaskan makanan tersebut..."
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none"
                    required>{{ old('deskripsi') }}</textarea>

            </div>


            <div>

                <label class="block text-sm font-bold mb-2">
                    Keunikan
                </label>

                <textarea
                    name="keunikan"
                    rows="4"
                    placeholder="Apa yang membuat makanan ini khas?"
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none"
                    required>{{ old('keunikan') }}</textarea>

            </div>

        </div>


        <div class="flex justify-end gap-3 mt-8">

            <a href="{{ route('budaya.kuliner.index') }}"
                class="px-5 py-3 rounded-xl bg-[#F8F2E8] font-bold text-sm">
                Batal
            </a>

            <button
                class="px-6 py-3 rounded-xl bg-[#4A2C20] text-white font-bold text-sm">
                Simpan
            </button>

        </div>

    </form>

</div>

@endsection
