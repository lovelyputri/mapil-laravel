@extends('budaya.layout')

@section('title', 'Tambah Kosakata')

@section('content')

<div class="max-w-3xl mx-auto px-5 lg:px-8 py-14">

    <a href="{{ route('budaya.kamus.index') }}"
        class="text-sm font-bold text-[#A85432]">
        ← Kembali ke Kamus
    </a>

    <div class="mt-6 mb-8">

        <span class="text-xs uppercase tracking-widest font-bold text-[#A85432]">
            Kamus Osing
        </span>

        <h1 class="font-display text-4xl font-bold mt-2">
            Tambah Kosakata
        </h1>

    </div>


    <form method="POST"
        action="{{ route('budaya.kamus.store') }}"
        class="bg-white rounded-3xl p-7 md:p-9 shadow-sm border border-[#4A2C20]/5">

        @csrf

        <div class="grid gap-6">

            <div>
                <label class="block text-sm font-bold mb-2">
                    Kata Osing
                </label>

                <input
                    type="text"
                    name="kata"
                    value="{{ old('kata') }}"
                    placeholder="Contoh: Isun"
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none focus:ring-2 focus:ring-[#C89B3C]"
                    required>
            </div>


            <div>
                <label class="block text-sm font-bold mb-2">
                    Arti
                </label>

                <input
                    type="text"
                    name="arti"
                    value="{{ old('arti') }}"
                    placeholder="Contoh: Saya / Aku"
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none focus:ring-2 focus:ring-[#C89B3C]"
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

                    <option value="Kata Ganti">
                        Kata Ganti
                    </option>

                    <option value="Kata Kerja">
                        Kata Kerja
                    </option>

                    <option value="Tempat">
                        Tempat
                    </option>

                    <option value="Keterangan Tempat">
                        Keterangan Tempat
                    </option>

                    <option value="Lainnya">
                        Lainnya
                    </option>

                </select>

            </div>


            <div>
                <label class="block text-sm font-bold mb-2">
                    Contoh Kalimat
                </label>

                <input
                    type="text"
                    name="contoh"
                    value="{{ old('contoh') }}"
                    placeholder="Contoh penggunaan kata..."
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none">
            </div>


            <div>
                <label class="block text-sm font-bold mb-2">
                    Keterangan
                </label>

                <textarea
                    name="keterangan"
                    rows="5"
                    placeholder="Jelaskan penggunaan kata..."
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none">{{ old('keterangan') }}</textarea>
            </div>

        </div>


        <div class="flex justify-end gap-3 mt-8">

            <a href="{{ route('budaya.kamus.index') }}"
                class="px-5 py-3 rounded-xl bg-[#F8F2E8] font-bold text-sm">
                Batal
            </a>

            <button
                class="px-6 py-3 rounded-xl bg-[#4A2C20] text-white font-bold text-sm">
                Simpan Kosakata
            </button>

        </div>

    </form>

</div>

@endsection
