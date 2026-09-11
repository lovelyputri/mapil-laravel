@extends('budaya.layout')

@section('title', 'Kuis Budaya Osing')

@section('content')

<div class="max-w-4xl mx-auto px-5 lg:px-8 py-14">

    <div class="text-center mb-10">

        <span class="inline-flex px-4 py-2 rounded-full bg-[#A85432]/10 text-[#A85432] border border-[#A85432]/20 text-xs font-bold uppercase tracking-widest">
            Uji Pemahaman Budaya
        </span>

        <h1 class="font-display text-4xl md:text-5xl font-bold mt-5">
            Kuis Interaktif Suku Osing
        </h1>

        <p class="text-[#4A2C20]/60 mt-3">
            Uji seberapa jauh kamu mengenal budaya Osing.
        </p>

    </div>


    <form method="POST"
        action="{{ route('budaya.kuis.hasil') }}">

        @csrf


        @foreach($questions as $index => $question)

            <div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm mb-5">

                <div class="flex items-center gap-3 mb-5">

                    <span class="w-9 h-9 rounded-xl bg-[#4A2C20] text-white flex items-center justify-center font-bold">
                        {{ $index + 1 }}
                    </span>

                    <span class="text-xs uppercase tracking-widest font-bold text-[#C89B3C]">
                        Pertanyaan {{ $index + 1 }}
                    </span>

                </div>


                <h2 class="font-display text-xl md:text-2xl font-bold leading-8">
                    {{ $question['question'] }}
                </h2>


                <div class="grid gap-3 mt-6">

                    @foreach($question['options'] as $optionIndex => $option)

                        <label class="cursor-pointer">

                            <input
                                type="radio"
                                name="answers[{{ $index }}]"
                                value="{{ $optionIndex }}"
                                class="peer sr-only"
                                required>

                            <div class="p-4 rounded-2xl border border-[#4A2C20]/10 bg-[#F8F2E8] peer-checked:bg-[#4A2C20] peer-checked:text-white peer-checked:border-[#4A2C20] transition">

                                <span class="text-sm font-medium">
                                    {{ $option }}
                                </span>

                            </div>

                        </label>

                    @endforeach

                </div>

            </div>

        @endforeach


        <div class="text-center mt-8">

            <button
                class="px-8 py-4 rounded-2xl bg-[#A85432] text-white font-bold shadow-lg hover:bg-[#91462b]">

                Lihat Hasil Kuis →

            </button>

        </div>

    </form>

</div>

@endsection
