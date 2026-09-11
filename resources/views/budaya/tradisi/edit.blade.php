@extends('budaya.layout')

@section('title', 'Edit Tradisi')

@section('content')

<div class="max-w-3xl mx-auto px-5 lg:px-8 py-14">

    <a href="{{ route('budaya.tradisi.show', $item['id']) }}"
        class="text-sm font-bold text-[#A85432]">
        ← Kembali
    </a>

    <h1 class="font-display text-4xl font-bold mt-6 mb-8">
        Edit Tradisi & Kesenian
    </h1>


    <form method="POST"
        action="{{ route('budaya.tradisi.update', $item['id']) }}"
        class="bg-white rounded-3xl p-7 md:p-9 shadow-sm">

        @csrf
        @method('PUT')

        <div class="grid gap-6">

            <div>

                <label class="block text-sm font-bold mb-2">
                    Nama
                </label>

                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama', $item['nama']) }}"
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

                    <option value="Tradisi"
                        {{ $item['kategori'] === 'Tradisi' ? 'selected' : '' }}>
                        Tradisi
                    </option>

                    <option value="Kesenian"
                        {{ $item['kategori'] === 'Kesenian' ? 'selected' : '' }}>
                        Kesenian
                    </option>

                </select>

            </div>


            <div>

                <label class="block text-sm font-bold mb-2">
                    Lokasi
                </label>

                <input
                    type="text"
                    name="lokasi"
                    value="{{ old('lokasi', $item['lokasi']) }}"
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none"
                    required>

            </div>


            <div>

                <label class="block text-sm font-bold mb-2">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    rows="7"
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none"
                    required>{{ old('deskripsi', $item['deskripsi']) }}</textarea>

            </div>

        </div>


        <div class="flex justify-end gap-3 mt-8">

            <a href="{{ route('budaya.tradisi.show', $item['id']) }}"
                class="px-5 py-3 rounded-xl bg-[#F8F2E8] font-bold text-sm">
                Batal
            </a>

            <button
                class="px-6 py-3 rounded-xl bg-[#4A2C20] text-white font-bold text-sm">
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>

@endsection
