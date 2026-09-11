@extends('budaya.layout')

@section('title', 'Edit Kosakata')

@section('content')

<div class="max-w-3xl mx-auto px-5 lg:px-8 py-14">

    <a href="{{ route('budaya.kamus.show', $item['id']) }}"
        class="text-sm font-bold text-[#A85432]">
        ← Kembali
    </a>

    <div class="mt-6 mb-8">

        <span class="text-xs uppercase tracking-widest font-bold text-[#A85432]">
            Kamus Osing
        </span>

        <h1 class="font-display text-4xl font-bold mt-2">
            Edit Kosakata
        </h1>

    </div>


    <form method="POST"
        action="{{ route('budaya.kamus.update', $item['id']) }}"
        class="bg-white rounded-3xl p-7 md:p-9 shadow-sm">

        @csrf
        @method('PUT')

        <div class="grid gap-6">

            <div>
                <label class="block text-sm font-bold mb-2">
                    Kata Osing
                </label>

                <input
                    type="text"
                    name="kata"
                    value="{{ old('kata', $item['kata']) }}"
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none"
                    required>
            </div>


            <div>
                <label class="block text-sm font-bold mb-2">
                    Arti
                </label>

                <input
                    type="text"
                    name="arti"
                    value="{{ old('arti', $item['arti']) }}"
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none"
                    required>
            </div>


            <div>
                <label class="block text-sm font-bold mb-2">
                    Kategori
                </label>

                <input
                    type="text"
                    name="kategori"
                    value="{{ old('kategori', $item['kategori']) }}"
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none"
                    required>
            </div>


            <div>
                <label class="block text-sm font-bold mb-2">
                    Contoh Kalimat
                </label>

                <input
                    type="text"
                    name="contoh"
                    value="{{ old('contoh', $item['contoh']) }}"
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none">
            </div>


            <div>
                <label class="block text-sm font-bold mb-2">
                    Keterangan
                </label>

                <textarea
                    name="keterangan"
                    rows="5"
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none">{{ old('keterangan', $item['keterangan']) }}</textarea>
            </div>

        </div>


        <div class="flex justify-end gap-3 mt-8">

            <a href="{{ route('budaya.kamus.show', $item['id']) }}"
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
