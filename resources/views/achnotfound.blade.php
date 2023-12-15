<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="styles.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
        {{-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> --}}
        <script src="https://cdn.tailwindcss.com"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <title>Login</title>
        <style>
            body{
                font-family: 'Poppins', sans-serif;
            }
            .primary_green{

            }

            .custom-shape-divider-top-1701515711 {
                position: absolute;
                top: 0;
                left: 0;
                width: 30%;
                rotate: ;
                overflow: hidden;
                line-height: 0;
            }

            .CONTAINER_BACKGROUND{
                position: absolute;
                z-index: 1;
            }

            .CONTAINER_CONTENT_ALL{
                position: absolute;
                width: 100%;
                z-index: 3;
            }

            .wave_1{
                position: absolute;
                z-index: 2;
            }

            .wave_2{
                position: absolute;
                z-index: 2;
            }

            .custom-shape-divider-top-1701515711 svg {
                position: relative;
                display: block;
                width: calc(100% + 1.3px);
                height: 90px;
            }

            .custom-shape-divider-top-1701515711 .shape-fill {
                fill: #065f46;
            }
        </style>

        <div class="CONTAINER_BACKGROUND">
                <!-- <div class="custom-shape-divider-top-1701515711">
                    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                        <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
                    </svg>
                </div> -->
                <svg class="wave_1" xmlns="http://www.w3.org/2000/svg" width="580" height="415" viewBox="0 0 789 562" fill="none">
                    <g filter="url(#filter0_d_1051_3512)">
                    <path d="M0 0.307474H776.943C776.943 0.307474 782.001 -10.7374 696.828 99.567C611.654 209.872 512.882 156.089 410.382 225.543C310.121 293.48 285.706 391.736 186.802 462.427C91.497 530.544 0 550 0 550V0.307474Z" fill="#2D918C" fill-opacity="0.67" shape-rendering="crispEdges"/>
                    </g>
                    <defs>
                    <filter id="filter0_d_1051_3512" x="-4" y="-4" width="793" height="566" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dx="4" dy="4"/>
                    <feGaussianBlur stdDeviation="4"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.47 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1051_3512"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1051_3512" result="shape"/>
                    </filter>
                    </defs>
                    </svg>

                <svg class="wave_2" xmlns="http://www.w3.org/2000/svg" width="500" height="380" viewBox="0 0 676 518" fill="none">
                    <g filter="url(#filter0_d_1051_3513)">
                    <path d="M-9.61029 0H662C662 0 635.71 81.996 553.918 170.785C472.127 259.573 377.276 216.282 278.846 272.188C182.566 326.873 159.121 405.964 64.1433 462.865C-27.3773 517.696 -9.61029 501.885 -9.61029 501.885V0Z" fill="#025E5A" fill-opacity="0.89" shape-rendering="crispEdges"/>
                    </g>
                    <defs>
                    <filter id="filter0_d_1051_3513" x="-17" y="-6" width="693" height="524" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dx="4" dy="4"/>
                    <feGaussianBlur stdDeviation="5"/>
                    <feComposite in2="hardAlpha" operator="out"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.37 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1051_3513"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1051_3513" result="shape"/>
                    </filter>
                    </defs>
                </svg>
        </div>

        <div class="CONTAINER_CONTENT_ALL">
            <!-- NAVBARR -->
            <div id="header" class="grid grid-cols-2 py-8 w-full">
                <div id="header_kiri" class="flex items-center justify-items-start ms-8">
                    <img class="w-20 h-auto" src="ugm.png" alt="">
                    <div class="flex flex-col ms-6">
                        <p class="text-white  text-sm">Sarjana Terapan</p>
                        <p class="text-white  text-sm">Teknologi Rekayasa Perangkat Lunak</p>
                        <p class="text-white  text-sm">Universitas Gadjah Mada</p>
                    </div>
                </div>

                <div id="header_kanan" class="flex justify-end items-center me-20 ">

                    <button type="button"
                        onclick="window.location.href=''"
                        class="h-10 px-12 py-2 rounded flex items-center space-x-4 font-bold bg-white hover:bg-teal-800 shadow-none hover:drop-shadow-lg text-teal-800 hover:text-white">
                        Home
                    </button>

                        <button type="button"
                        onclick="window.location.href=''"
                        class="h-10 px-12 py-2 rounded flex items-center space-x-4 font-bold bg-white hover:bg-teal-800 text-teal-800 hover:text-white">
                        Showcase
                    </button>

                        <button type="button"
                        onclick="window.location.href=''"
                        class="me-4 h-10 px-12 py-2 rounded flex items-center space-x-4 font-bold bg-white hover:bg-teal-800 text-teal-800 hover:text-white">
                        Login
                    </button>

                    <img class="w-20 h-auto" src="Ellipse 66.png" alt="">
                </div>
            </div>
        </div>

        {{-- CONTENT SECTION --}}
            <div class="font-poppins">
                <div class="flex flex-col space-y-3">
                    <h3 class="flex justify-items-center text-[#62B5B1] text-2xl">Belum Ada Prestasi</h3>
                    <h3 class="flex justify-items-center text-[#025E5A] text-5xl">Ukir Prestasimu Sekarang Juga!</h3>
                    <div class="flex group justify-center mt-8">
                        <button type="submit" class="w-fit bg-[#025E5A] text-white font-semibold py-2 px-6 rounded group-hover:bg-[#2D918C]">Kembali</button>
                    </div>
                </div>
            </div>

            <footer class="w-full bg-teal-800 h-auto grid grid-cols-3 py-10 pb-16">
                <div id="footer_kiri" class="flex flex-col ms-16 ">
                    <img class="w-20 h-auto" src="ugm.png" alt="">
                    <p class="text-white text-sm mt-6">Universitas Gadjah Mada</p>
                    <p class="text-white text-sm mt-1">Sekolah Vokasi</p>
                    <p class="text-white text-sm mt-1">Gedung TILC, Belimbingsari, Caturtunggal</p>
                    <p class="text-white text-sm mt-1 mb-6">Depok, Sleman, Yogyakarta, Indonesia, 55281</p>
                    <div class="flex flex-row items-center">
                        <img class="w-6 h-auto" src="email.png" alt="">
                        <a href="" class="text-white text-sm ms-4">sv@ugm.ac.id</a>
                    </div>
                    <div class="flex flex-row items-center mt-3">
                        <img class="w-5 h-auto" src="telephone.png" alt="">
                        <p class="text-white text-sm ms-4">+62 (274) 541020</p>
                    </div>
                </div>

                <div id="footer_kanan" class="flex justify-center col-span-2 space-x-6">
                    <div class="flex flex-col">
                        <p class="text-white text-base font-bold">PRANALA PENTING</p>
                        <p class="text-white text-sm mt-6">Pendaftaran Mahasiswa Baru</p>
                        <p class="text-white text-sm mt-5">Informasi Beasiswa</p>
                        <p class="text-white text-sm mt-5">Carrer Center ( VDC )</p>
                        <p class="text-white text-sm mt-5">Buku Elektronik</p>
                        <p class="text-white text-sm mt-5">Unduhan</p>
                    </div>

                    <div class="flex flex-col">
                        <p class="text-white text-base font-bold">SOCIAL MEDIA</p>
                        <p class="text-white text-sm mt-6">Facebook</p>
                        <p class="text-white text-sm mt-5">Twitter</p>
                        <p class="text-white text-sm mt-5">Instagram</p>
                        <p class="text-white text-sm mt-5">Youtube</p>
                        <p class="text-white text-sm mt-5">RSS Feed</p>
                        <p class="text-white text-sm mt-5">Aplikasi Vokasi UGM</p>
                    </div>

                    <div class="flex flex-col">
                        <p class="text-white text-base font-bold">INFORMASI PUBLIK</p>
                        <p class="text-white text-sm mt-6">Daftar Informasi Tersedia Setiap Saat</p>
                        <p class="text-white text-sm mt-5">Daftar Informasi Wajib Berkala</p>
                        <p class="text-white text-sm mt-5">Permohonan Informasi</p>
                    </div>
                </div>
            </footer>
            <div class="flex justify-center font-bold text-teal-800 py-6"> Copyright © 2017 Sekolah Vokasi Universitas Gadjah Mada </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </body>
</html>
