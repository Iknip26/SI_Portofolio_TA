<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
    <style>
        /* CSS untuk modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 99;
        }

        .modal-content {
            background-color: #fff;
            padding: 50px;
            border-radius: 8px;
            text-align: center;
        }

        .confirm-button {
            background-color: #ff0000;
            color: #fff;
            padding: 50px 50px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 30px
        }

        .cancel-button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
        }
    </style>
</head>

<body id="body" class="text-gray-800 font-inter">

    <!-- start: Sidebar -->
    <div class="fixed left-0 top-0 w-72 h-full p-4 z-50 sidebar-menu transition-transform "
        style="background-color: #344948; text-align: center;">
        <a href="#" class="flex items-center pb-4">
            <span class="text-lg font-bold text-white ml-3">Sistem Informasi Portofolio Tugas Akhir</span>
        </a>
        <ul class="mt-4">
            <li class="mb-1 group">
                <a href="#"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class="ri-home-2-line mr-3 text-lg"></i>
                    <span class="text-sm">Dashboard</span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </a>
                <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                    <li class="mb-4">
                        <a href="{{ route('admin.dashboard.analytic') }}"
                            class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Analytics</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('admin.dashboard.porto') }}"
                            class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Portofolio
                            List</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('admin.dashboard.member') }}"
                            class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Member
                            List</a>
                    </li>
                </ul>
            </li>
            <li class="mb-1 group">
                <a href="#"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class="ri-instance-line mr-3 text-lg"></i>
                    <span class="text-sm">Portofolio</span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </a>
                <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                    <li class="mb-4">
                        <a href="{{ route('admin.porto.showAllPorto') }}"
                            class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">
                            Portofolio List</a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('admin.porto.addPorto') }}"
                            class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">
                            Add New Portofolio</a>
                    </li>
                </ul>
            </li>
            <li class="mb-1 group">
                <a href="#"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class="ri-flashlight-line mr-3 text-lg"></i>
                    <span class="text-sm">Account</span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </a>
                <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                    <li class="mb-4">
                        <a href="{{ route('admin.account.showAllAccount') }}"
                            class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">
                            All Acount</a>
                    </li>
                    @if (Auth::user()->role == 'Admin')
                        <li class="mb-4">
                            <a href="{{ route('admin.account.create') }}"
                                class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">
                                Add New Acount</a>
                        </li>
                    @endif
                </ul>
            </li>
        </ul>
    </div>
    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="w-full ps-12 pt-10 md:w-[calc(100%-257px)] md:ml-64 min-h-screen transition-all main"
        style="background-color: #EFEFEF">

        {{-- <p id="Judul" class="text-2xl ms-10 mb-4 text-slate-700 font-bold">Nama Page</p> --}}
        <div
            class="mx-8 md:px-8 bg-white flex items-cente shadow-md shadow-slate-500 sticky top-5 left-0 z-30 md:mx-10 md:mb-4 rounded-sm md:rounded-md md:h-20">
            <button type="button" class="text-lg text-gray-600 sidebar-toggle" hidden>
                <i class="ri-menu-line"></i>
            </button>
            <ul class="flex text-sm items-center self-center">

                <form action="{{ route('admin.porto.searchPorto') }}" method="GET" class="flex">
                    <button type="submit" class="p-2 rounded-l-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="38" viewBox="0 0 41 38"
                            fill="none">
                            <path
                                d="M36.2276 32.1258L30.0889 26.2992C32.4718 23.4562 33.6257 19.8476 33.3135 16.2154C33.0013 12.5832 31.2466 9.20357 28.4103 6.77135C25.574 4.33914 21.8717 3.03923 18.0645 3.13891C14.2574 3.2386 10.6348 4.73031 7.94178 7.30731C5.24872 9.88431 3.68983 13.3507 3.58566 16.9938C3.48148 20.6369 4.83993 24.1797 7.38169 26.8937C9.92345 29.6078 13.4553 31.2869 17.2511 31.5856C21.0468 31.8844 24.8179 30.7802 27.789 28.5L33.8781 34.3267C34.0319 34.4751 34.2149 34.5929 34.4165 34.6732C34.6181 34.7536 34.8344 34.795 35.0529 34.795C35.2713 34.795 35.4876 34.7536 35.6892 34.6732C35.8908 34.5929 36.0738 34.4751 36.2276 34.3267C36.5259 34.0314 36.6926 33.6369 36.6926 33.2263C36.6926 32.8156 36.5259 32.4211 36.2276 32.1258V32.1258ZM18.5064 28.5C16.2156 28.5 13.9763 27.85 12.0715 26.6321C10.1668 25.4143 8.68226 23.6833 7.80561 21.6581C6.92896 19.6329 6.69959 17.4044 7.1465 15.2544C7.59341 13.1045 8.69654 11.1296 10.3164 9.57957C11.9362 8.02954 14 6.97395 16.2468 6.5463C18.4936 6.11864 20.8224 6.33813 22.9389 7.177C25.0553 8.01587 26.8642 9.43645 28.1369 11.2591C29.4096 13.0817 30.0889 15.2246 30.0889 17.4167C30.0889 20.3562 28.8686 23.1752 26.6965 25.2538C24.5244 27.3323 21.5783 28.5 18.5064 28.5V28.5Z"
                                fill="#025E5A" />
                        </svg>
                    </button>
                    <input type="text" placeholder="Search here..." name="query"
                        class=" p-2 text-slate-800 rounded-r-md focus:outline-none ml-4 text-lg"
                        style=" input::placeholder {
                            color: #008080;
                        }">
                    <select id="dropdown" name="query_type" class="border rounded px-2 ml-4">
                        <option value="Judul Projek" class="py-2 w-fit block">Judul Projek</option>
                        <option value="Nama Dosen" class="py-2 w-fit block">Nama Dosen</option>
                    </select>
                    <select id="dropdown" name="query_type" class="border rounded px-2 ml-4">
                        <option value="Judul Projek" class="py-2 w-fit block">Judul Projek</option>
                        <option value="Nama Dosen" class="py-2 w-fit block">Nama Dosen</option>
                    </select>
                    <select id="dropdown" name="query_type" class="border rounded px-2 ml-4">
                        <option value="Judul Projek" class="py-2 w-fit block">Judul Projek</option>
                        <option value="Nama Dosen" class="py-2 w-fit block">Nama Dosen</option>
                    </select>
                </form>

            </ul>
            <ul class="ml-auto flex items-center">
                <li class="ml-4">
                    <div class="flex">
                        <p class="text-teal-800 font-bold text-lg me-6">Welcome, {{ Auth::user()->username }}</p>
                        <button id="profile" class="relative" type="button" onclick="openProfile()">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfvfTZYrCPwWiEABiG2gQa6SlCxpTyfinn6WQ6TBE&s"
                                alt="Profile Logo" class="w-8 h-8 rounded-full" style="border:3px solid #132B2A;">

                            <div id="profile_popup"
                                class="absolute bg-white w-40 top-0 end-[-2rem] mt-[2rem] h-fit px-8 py-4 shadow-md shadow-slate-500 rounded-xl hidden">
                                <div class="flex flex-col justify-start items-start">
                                    @if (Auth::user()->role == 'Dosen')
                                        <a type="button" class="z-20 text-teal-800 font-bold mb-2"
                                            onclick="window.location.href='{{ route('admin.dashboard.member.edit', Auth::user()->id) }}'">Edit
                                            profile</a>
                                    @endif

                                    <a type="button" class="z-20 text-teal-800 font-bold"
                                        onclick="window.location.href='{{ route('session.logout') }}'">Logout</a>
                                </div>
                            </div>
                        </button>
                    </div>
                </li>
            </ul>
        </div>

        @yield('content')
    </main>
    <!-- end: Main -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    {{-- <script src="{{ asset('js/dynamicDropdown.js') }}"></script> --}}
    <script src="{{ asset('js/imageInput.js') }}"></script>
    <script>
        function openProfile() {
            var popup = document.getElementById('profile_popup');
            popup.style.display = 'flex'
        }

        document.addEventListener('click', function(event) {
            var profilePopup = document.getElementById('profile_popup');
            var popup = document.getElementById('profile');
            var targetElement = event.target; // Element yang di-klik

            // Periksa apakah element yang di-klik berada di dalam atau sama dengan profilePopup
            if (profilePopup && !profilePopup.contains(targetElement) && !popup.contains(targetElement)) {
                // Klik di luar area profile, tutup profile
                profilePopup.style.display = 'none';
            }
        });
    </script>
</body>

</html>
