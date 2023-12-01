@extends('public.layouts')
@section('content')
    <div class="card mx-auto p-2 " style="border-radius: 30px; max-width: 1225px; max-height: fit-content; margin-top: 20px;">
        <div class="carousel" style="border-radius: 30px; width: 1225px; height: 581px;">
            <div class="carousel-inner" style="border-radius: 30px;">
                <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden=""
                    checked="checked">
                <div class="carousel-item" ssty>
                    <img style="width: 1225px; height: 581px;" src="{{ asset('asset/gambar.png') }}">
                    <div class="carousel-caption absolute bottom-10 w-full text-white p-4 ">
                        <h1 class="text-center text-2xl font-bold">Kantor Arsip Gelar Pameran Kegiatan<br>Mahasiswa UGM
                            Tempo Doloe</h1>
                    </div>
                </div>
                <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true"
                    hidden="">
                <div class="carousel-item">
                    <img style="width: 1225px; height: 581px;" src="{{ asset('asset/gambar.png') }}"">
                </div>
                <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true"
                    hidden="">
                <div class="carousel-item">
                    <img style="width: 1225px; height: 581px;" src="{{ asset('asset/gambar.png') }}"">
                </div>
                <label for="carousel-3" class="carousel-control prev control-1">‹</label>
                <label for="carousel-2" class="carousel-control next control-1">›</label>
                <label for="carousel-1" class="carousel-control prev control-2">‹</label>
                <label for="carousel-3" class="carousel-control next control-2">›</label>
                <label for="carousel-2" class="carousel-control prev control-3">‹</label>
                <label for="carousel-1" class="carousel-control next control-3">›</label>
            </div>
        </div>
    </div>

    <div class="card mx-auto p-2 "
        style="border-radius: 30px; max-width: 1220px; max-height: fit-content; margin-top: 10px;">
        <div class="flex mx-auto shadow-lg rounded-lg overflow-hidden my-10"
            style="width: 1220px; border-radius: 30px;  background-color: #2D918C;">
            <div class="flex" style="width: 1220px; display: flex; flex-direction: row; align-items: flex-start;">
                <img style="width: 447px; height: 379px; border-radius: 60px; padding-left: 30px; padding-right: 30px; padding-top: 30px; padding-bottom: 30px;"
                    src="{{ asset('asset/model.jpeg') }}" alt="Gambar">
                <div class="px-6 py-4"
                    style="padding-top: 30px; padding-bottom: 10px; padding-left: 10px; padding-right: 30px;">
                    <h1 class="font-bold text-4xl mb-2 " style="color: white;">Teknologi Rekayasa Perangkat Lunak</h1>
                    <p class="text-base align-items" style="text-align: justify; color: white;">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mx-auto p-2 " style="border-radius: 30px; max-width: 1220px; max-height: fit-content;">
        <div class="container mx-auto p-2 text-center flex justify-center items-center"
            style="background-color: #62B5B1; width: 1220px; height: 122px; border-radius: 30px; ">
            <h1 class="text-3xl font-bold text-center" style="color: white;">Tugas Akhir</h1>
        </div>
    </div>
    <div class="flex items-center justify-center" style="margin-left: 90px; margin-right: 90px; margin-top: 40px;">
        <div class="flex" style="margin-bottom: 10px; width: 1220px;">
            <div class="w-1/2 mr-4 text-center flex justify-center items-center relative"
                style="border-radius: 15px; background-color: #62B5B1; width: 543px; height: 445px; margin-left: 40px;">
                <a href="{{ route('public.team') }}">
                    <h1 class="absolute bottom-0 left-0 mb-4 ml-4 text-white text-3xl">TEAM</h1>
                </a>
            </div>
            <div class="w-1/2 mr-4 text-center flex justify-center items-center relative"
                style="border-radius: 15px; background-color: #62B5B1; width: 543px; height: 445px; margin-left: 40px;">
                <a href="{{ route('public.portofolio') }}">
                    <h1 class="absolute bottom-0 left-0 mb-4 ml-4 text-white text-3xl">PORTOFOLIO</h1>
                </a>
            </div>
        </div>

    </div><br><br>

    <div class="card mx-auto p-4 mt-4"
        style="background-color: #2D918C; border-radius: 30px; width: 1220px; height: max-content;">
        <div class="container mx-auto p-4 mt-10 mb-10">
            <div class="flex justify-center mx-auto">
                <div class="w-1/4 p-4 aspect-w-1 aspect-h-1 rounded ml-4 relative"
                    style="background-color: white; width: 228px; height: 215px; border-radius: 15px;">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <img src="{{ asset('asset/icon_green/ai.png') }}"
                            style="align-items: center; width: 120px; height: 120px; margin-bottom: 40px;">
                        <button
                            class=" text-white font-bold py-2 px-4 rounded absolute bottom-4 left-1/2 transform -translate-x-1/2"
                            style="background-color: #62B5B1; border-radius: 42px;">→</button>
                    </div>
                </div>
                <div class="w-1/4 p-4 aspect-w-1 aspect-h-1 rounded ml-4 relative"
                    style="background-color: white; width: 228px; height: 215px; border-radius: 15px; margin-left: 40px; ">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <img src="{{ asset('asset/icon_green/blokch.png') }}"
                            style="align-items: center; width: 120px; height: 120px; margin-bottom: 40px;">
                        <button
                            class=" text-white font-bold py-2 px-4 rounded absolute bottom-4 left-1/2 transform -translate-x-1/2"
                            style="background-color: #62B5B1; border-radius: 42px;">→</button>
                    </div>
                </div>
                <div class="w-1/4 p-4 aspect-w-1 aspect-h-1 rounded ml-4 relative"
                    style="background-color: white; width: 228px; height: 215px; border-radius: 15px; margin-left: 40px; ">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <img src="{{ asset('asset/icon_green/cyber.png') }}"
                            style="align-items: center;  width: 120px; height: 120px; margin-bottom: 40px;">
                        <button
                            class=" text-white font-bold py-2 px-4 rounded absolute bottom-4 left-1/2 transform -translate-x-1/2"
                            style="background-color: #62B5B1; border-radius: 42px;">→</button>
                    </div>
                </div>
                <div class="w-1/4 p-4 aspect-w-1 aspect-h-1 rounded ml-4 relative"
                    style="background-color:white;width: 228px; height: 215px;  border-radius: 15px; margin-left: 40px;">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <img src="{{ asset('asset/icon_green/data sc.png') }}"
                            style="align-items: center;  width: 120px; height: 120px; margin-bottom: 40px;">
                        <button
                            class=" text-white font-bold py-2 px-4 rounded absolute bottom-4 left-1/2 transform -translate-x-1/2"
                            style="background-color: #62B5B1; border-radius: 42px;">→</button>
                    </div>
                </div>
            </div>
        </div><br><br>

        <form>
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search" style="background-color: #62B5B1; color: white;"
                    class="block w-full p-4 pl-10 " placeholder="Search by Topics" required>
                <button type="submit"
                    class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form><br><br>

        <div class="container mx-auto p-4 mt-10 mb-10">
            <div class="flex justify-center mx-auto ">
                <div class="w-1/4 p-4 aspect-w-1 aspect-h-1 rounded ml-4 relative"
                    style="background-color: white; width: 228px; height: 215px; border-radius: 15px; ">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <img src="{{ asset('asset/icon_green/game.png') }}"
                            style="align-items: center; width: 120px; height: 120px; margin-bottom: 40px;">
                        <button
                            class=" text-white font-bold py-2 px-4 rounded absolute bottom-4 left-1/2 transform -translate-x-1/2"
                            style="background-color: #62B5B1; border-radius: 42px;">→</button>
                    </div>
                </div>
                <div class="w-1/4 p-4 aspect-w-1 aspect-h-1 rounded ml-4 relative"
                    style="background-color: white; width: 228px; height: 215px; border-radius: 15px; margin-left: 40px; ">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <img src="{{ asset('asset/icon_green/iot.png') }}"
                            style="align-items: center; width: 120px; height: 120px; margin-bottom: 40px;">
                        <button
                            class=" text-white font-bold py-2 px-4 rounded absolute bottom-4 left-1/2 transform -translate-x-1/2"
                            style="background-color: #62B5B1; border-radius: 42px;">→</button>
                    </div>
                </div>
                <div class="w-1/4 p-4 aspect-w-1 aspect-h-1 rounded ml-4 relative"
                    style="background-color: white; width: 228px; height: 215px; border-radius: 15px; margin-left: 40px;">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <img src="{{ asset('asset/icon_green/mobile.png') }}"
                            style="align-items: center;  width: 120px; height: 120px; margin-bottom: 40px;">
                        <button
                            class=" text-white font-bold py-2 px-4 rounded absolute bottom-4 left-1/2 transform -translate-x-1/2"
                            style="background-color: #62B5B1; border-radius: 42px;">→</button>
                    </div>
                </div>
                <div class="w-1/4 p-4 aspect-w-1 aspect-h-1 rounded ml-4 relative"
                    style="background-color:white;width: 228px; height: 215px;  border-radius: 15px;  margin-left: 40px;">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <img src="{{ asset('asset/icon_green/softw.png') }}"
                            style="align-items: center;  width: 120px; height: 120px; margin-bottom: 40px;">
                        <button
                            class=" text-white font-bold py-2 px-4 rounded absolute bottom-4 left-1/2 transform -translate-x-1/2"
                            style="background-color: #62B5B1; border-radius: 42px;">→</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
@endsection
