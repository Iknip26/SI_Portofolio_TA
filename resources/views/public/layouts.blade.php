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
                        <a href="{{ route('public.homescreen') }}" class="text-white mx-4 text-1xl"
                            style="font-size: 20px; margin-right: 80px;">Home</a>
                        <a href="{{ route('public.showcase') }}" class="text-white mx-4 text-1xl"
                            style="font-size: 20px;">Showcase</a>
                        <a href="#" class="text-white mx-4" style="font-size: 20px; margin-left: 80px; ">Login</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    @yield('content')


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
