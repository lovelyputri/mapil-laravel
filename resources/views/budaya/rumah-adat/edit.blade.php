@extends('budaya.layout')

@section('title', 'Edit Rumah Adat')

@section('content')

<div class="max-w-3xl mx-auto px-5 lg:px-8 py-14">

    <a href="{{ route('budaya.rumah.show', $item['id']) }}"
        class="text-sm font-bold text-[#A85432]">
        ← Kembali
    </a>

    <h1 class="font-display text-4xl font-bold mt-6 mb-8">
        Edit Rumah Adat
    </h1>


    <form method="POST"
        action="{{ route('budaya.rumah.update', $item['id']) }}"
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
                    Jenis
                </label>

                <input
                    type="text"
                    name="jenis"
                    value="{{ old('jenis', $item['jenis']) }}"
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none"
                    required>
            </div>


            <div>
                <label class="block text-sm font-bold mb-2">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    rows="5"
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none"
                    required>{{ old('deskripsi', $item['deskripsi']) }}</textarea>
            </div>


            <div>
                <label class="block text-sm font-bold mb-2">
                    Ciri-ciri
                </label>

                <textarea
                    name="ciri"
                    rows="4"
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none"
                    required>{{ old('ciri', $item['ciri']) }}</textarea>
            </div>


            <div>
                <label class="block text-sm font-bold mb-2">
                    Makna
                </label>

                <textarea
                    name="makna"
                    rows="4"
                    class="w-full px-4 py-3 rounded-xl bg-[#F8F2E8] border-0 outline-none"
                    required>{{ old('makna', $item['makna']) }}</textarea>
            </div>

        </div>


        <div class="flex justify-end gap-3 mt-8">

            <a href="{{ route('budaya.rumah.show', $item['id']) }}"
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
