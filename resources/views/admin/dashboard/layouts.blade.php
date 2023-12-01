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
    <div class="fixed left-0 top-0 w-64 h-full  p-4 z-50 sidebar-menu transition-transform "
        style="background-color: #132B2A; text-align: center;">
        <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
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
                    <li class="mb-4">
                        <a href="{{ route('admin.account.create') }}"
                            class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">
                            Add New Acount</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="w-full md:w-[calc(100%-250px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">

        <div class="py-2 px-4 md:px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30 md:mx-4 md:my-4 md:rounded-md md:h-20"
            style="border-radius: 15px; margin-top: 40px;">
            <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            <ul class="flex items-center text-sm ml-4">
                <div class="flex items-center">
                    <div class="flex items-center">
                        <form action="{{ route('admin.porto.searchPorto') }}" method="GET" class="flex">
                            <button type="submit" class="bg-gray-300 p-2 rounded-l-md">
                                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-4.5-4.5">
                                    </path>
                                    <circle cx="10" cy="10" r="8"></circle>
                                </svg>
                            </button>
                            <input type="text" placeholder="Search here" name="query"
                                class="border-2 border-gray-300 p-2 rounded-r-md focus:outline-none ml-4">
                            <select id="dropdown" name="query_type" class="border rounded p-2 bg-gray-300 ml-4">
                                <option value="Judul Projek">Judul Projek</option>
                                <option value="Nama Dosen">Nama Dosen</option>
                            </select>
                        </form>
                    </div>
                </div>
            </ul>
            <ul class="ml-auto flex items-center">
                <li class="ml-4">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfvfTZYrCPwWiEABiG2gQa6SlCxpTyfinn6WQ6TBE&s"
                        alt="Profile Logo" class="w-8 h-8 rounded-full" style="border:3px solid #132B2A;">
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
</body>

</html>
