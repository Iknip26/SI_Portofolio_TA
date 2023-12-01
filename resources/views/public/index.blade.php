<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chonburi&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/gaya.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Landing Page</title>
</head>


<body class="mx-auto"style="background-color: white;">
    <div class="card mx-auto p-2 "
        style="border-radius: 15px; max-width: 1434px; max-height: 160px; align-content: center; margin-top: 20px;">
        <nav
            style="background-color: #2D918C; border-radius: 15px; width: 1434px; height: 160px; padding: 20px; margin-top: 20px;">
            <div class="container mx-auto flex justify-center items-center" style="vertical-align: middle; ">
                <div class="flex items-center ">
                    <img src="{{ asset('asset/ugm_logo.png') }}" alt="Logo" style="width: 119px; height: 119px;">
                    <span class="text-white mx-2 text-1xl">SARJANA TERAPAN <BR>TEKNOLOGI REKAYASA PERANGKAT
                        LUNAK<BR>UNIVERSITAS GADJAH MADA</span>
                </div>
                <div class="container mx-auto p-4 inline-block"
                    style="background-color: #62B5B1; width: 620px; height: 80px;  border-radius: 15px;">
                    <div class="flex justify-center items-center h-full">
                        <a href="index.html" class="text-white mx-4 text-1xl"
                            style="font-size: 20px; margin-right: 80px;">Home</a>
                        <a href="{{ route('public.showcase') }}" class="text-white mx-4 text-1xl"
                            style="font-size: 20px;">Showcase</a>
                        <a href="#" class="text-white mx-4" style="font-size: 20px; margin-left: 80px; ">Login</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>


    <div class="card mx-auto p-2 "
        style="border-radius: 30px; max-width: 1225px; max-height: fit-content; margin-top: 20px;">
        <div class="carousel" style="border-radius: 30px; width: 1225px; height: 581px;">
            <div class="carousel-inner" style="border-radius: 30px;">
                <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true"
                    hidden="" checked="checked">
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
                <a href="showcase.html">
                    <h1 class="absolute bottom-0 left-0 mb-4 ml-4 text-white text-3xl">TEAM</h1>
                </a>
            </div>
            <div class="w-1/2 mr-4 text-center flex justify-center items-center relative"
                style="border-radius: 15px; background-color: #62B5B1; width: 543px; height: 445px; margin-left: 40px;">
                <a href="Portofolio.html">
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

    <footer class="flex flex-col items-center bg-neutral-100 text-center dark:bg-neutral-600 lg:text-left"
        style="background-color: #2D918C; height: fit-content;">
        <div class="container p-6 text-neutral-800 dark:text-neutral-200">
            <div class="flex justify-between"> <!-- Mengubah grid menjadi flex dan justify-between -->
                <div class="w-1/4"> <!-- Setiap bagian sekarang mendapatkan 1/4 dari lebar parent -->
                    <img src="{{ asset('asset/ugm_logo.png') }}" style="width: 100px; height: 100px;">
                    <p class="mb- text-1xl" style="font-size: 15px;">
                        Universitas Gadjah Mada <br>
                        Sekolah Vokasi<br>
                        Gedung TILC, Blimbingsari, Caturtunggal<br>
                        Depok, Sleman, Yogyakarta, Indonesia. 55281
                    <div style="display: flex; align-items: center; margin-top: 1px;">
                        <img src="{{ asset('asset/email.png') }}" style="width: 31px; height: 27px;">
                        <span style="margin-left: 10px;">sv@ugm.ac.id</span>
                    </div>

                    <div style="display: flex; align-items: center;">
                        <img src="{{ asset('asset/telephone.png') }}" style="width: 31px; height: 27px;">
                        <span style="margin-left: 10px;">+62 (274) 541020</span>
                    </div>


                    </p>
                </div>

                <div class="w-1/4" style="margin-left: 40PX;">
                    <!-- Setiap bagian sekarang mendapatkan 1/4 dari lebar parent -->
                    <h5 class="mb-2 font-medium ">PRANALA PENTING</h5><BR>
                    <a class="text-1xl" href="index.html">
                        Pendaftaran Mahasiswa Baru</a><br>
                    <a class="text-1xl">
                        Informasi Beasiswa</a><br>
                    <a class="text-1xl">
                        Career Center (VDC)</a><br>
                    <a class="text-1xl">
                        Buku Elektronik</a><br>
                    <a class="text-1xl">
                        Unduhan</a><br>

                </div>

                <div class="w-1/4" style="margin-left: 40px;">
                    <!-- Setiap bagian sekarang mendapatkan 1/4 dari lebar parent -->
                    <h5 class="mb-2 font-medium ">SOSIAL MEDIA</h5><BR>
                    <a class="text-1xl" href="index.html">
                        Facebook</a><br>
                    <a class="text-1xl">
                        Twitter</a><br>
                    <a class="text-1xl">
                        Instagram</a><br>
                    <a class="text-1xl">
                        YouTube</a><br>
                    <a class="text-1xl">
                        RSS Feed</a><br>
                    <a class="text-1xl">
                        Aplikasi Vokasi UGM</a>

                </div>

                <div class="w-1/4"> <!-- Setiap bagian sekarang mendapatkan 1/4 dari lebar parent -->
                    <h5 class="mb-2 font-medium ">INFORMASI PUBLIK</h5><BR>
                    <a class="text-1xl" href="index.html">
                        Daftar Informasi Tersedia Setiap Saat</a><br>
                    <a class="text-1xl">
                        Daftar Informasi Wajib Berkala</a><br>
                    <a class="text-1xl">
                        Permohonan Informasi</a><br>

                </div>
            </div>
        </div>



        <!--Copyright section-->
        <div class="w-full bg-neutral-200 p-4 text-center text-neutral-700 dark:bg-neutral-700 dark:text-neutral-200"
            style="background-color: white; color: black;">
            Copyright © 2017
            <a class="text-neutral-800 dark:text-neutral-400" style="color: black;">Sekolah Vokasi Universitas Gadjah
                Mada</a>
        </div>
    </footer>
</body>

</html>
