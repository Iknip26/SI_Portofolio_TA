@extends('public.layouts')
@section('content')
    <div class="card mx-auto p-2 " style="border-radius: 30px; max-width: 1225px; max-height: fit-content; margin-top: 0px;">
        <div class="mx-auto" style="margin-top: 50px;">
            <img src="{{ asset('asset/carou.png') }}" alt="Deskripsi Gambar" width="100%" height="fit-content"
                style="width: 1225px; height: 581px; border-radius: 30px;">
            <div
                style="position: absolute; bottom: 60px; left: 50%; transform: translateX(-50%); text-align: center; color: white; width: 100%;">
                <h1 style="font-size: 2rem; padding: 1rem;">Dosen Pengampu TA<br> Teknologi Rekayasa Perangkat Lunak</h1>
            </div>
        </div>
    </div>

    <br>

    <div class="flex-container"
        style="display: flex; flex-wrap: wrap; justify-content: center; padding: 5px; margin-right: 80px; margin-left: 80px ;">

        @foreach ($dosens as $data_dosen)
            <div class="max-w-sm rounded overflow-hidden shadow-lg mx-auto mt-10"
                style="background-color: #2D918C; padding: 15px; border-radius: 30px;">
                <img class="w-full" src="{{ asset('storage/photos/card/' . $data_dosen->image_profile) }}"
                    style="border-radius: 20px;">
                <div class="px-6 py-4 text-center">
                    <div class="text-2xl mb-2 text-white">{{ $data_dosen->name }}</div>
                    <div class="text-2xl mb-2 text-white">{{ $data_dosen->specialization }}</div>
                </div>
                <div class="flex justify-center">
                    <button class="text-white text-2xl py-2 px-4 rounded"
                        style="background-color: #62B5B1; border-radius: 30px;">
                        Tugas Akhir →
                    </button>
                </div>
            </div>
        @endforeach

    </div>

    </div><br><br>
@endsection
