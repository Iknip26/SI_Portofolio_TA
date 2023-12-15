@extends('admin.dashboard.layouts')

@section('content')

    @if ($errors->any())
        <div class="alert text-red-500 ms-12">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.porto.saveupdate', $content->id) }}" method="POST" class="flex"
        enctype="multipart/form-data">
        @csrf
        <div class="w-full flex flex-col">
            <!-- Flex Container 1 -->
            <div class="mt-12 mb-8 w-full flex flex-row">
                <!-- Card 1 -->
                <div class="ms-12 card relative justify-center basis-1/3 drop-shadow rounded-md shadow-md shadow-slate-600 items-end p-4"
                    style="background-color: #FFFFFF;">
                    <label class="py-4 ps-4 mb-4" for="image-container">Input Preview</label>
                    <div class="image-container px-4 py-4 w-fit h-fit flex items-center justify-center space-x-12"
                        id="image_profile-container">
                        {{-- <embed class="" src="" type=""> --}}
                        <!-- Preview Thumbnail atau Gambar akan muncul disini -->
                    </div>
                    <div class="flex flex-col h-fit items-center justify-center">
                        <div id="dropzone_profile" class="icon_profile flex-col w-fit items-center justify-center mt-32">
                            <svg class="mb-6 ms-24" xmlns="http://www.w3.org/2000/svg" width="56" height="56"
                                viewBox="0 0 56 56" fill="none">
                                <path
                                    d="M44.3327 23.3337C43.7138 23.3337 43.1203 23.5795 42.6828 24.0171C42.2452 24.4547 41.9993 25.0482 41.9993 25.667V33.5537L38.546 30.1003C37.3267 28.8906 35.6786 28.2118 33.961 28.2118C32.2434 28.2118 30.5954 28.8906 29.376 30.1003L27.7427 31.757L21.956 25.947C20.7367 24.7373 19.0886 24.0585 17.371 24.0585C15.6534 24.0585 14.0054 24.7373 12.786 25.947L9.33268 29.4237V16.3337C9.33268 15.7148 9.57852 15.1213 10.0161 14.6837C10.4537 14.2462 11.0472 14.0003 11.666 14.0003H30.3327C30.9515 14.0003 31.545 13.7545 31.9826 13.3169C32.4202 12.8793 32.666 12.2858 32.666 11.667C32.666 11.0482 32.4202 10.4547 31.9826 10.0171C31.545 9.57949 30.9515 9.33366 30.3327 9.33366H11.666C9.8095 9.33366 8.02902 10.0712 6.71627 11.3839C5.40351 12.6967 4.66602 14.4771 4.66602 16.3337V44.847C4.67216 46.5655 5.35755 48.2118 6.57271 49.427C7.78786 50.6421 9.4342 51.3275 11.1527 51.3337H40.1793C40.8116 51.3286 41.4401 51.2343 42.046 51.0537C43.3934 50.6757 44.5795 49.8662 45.4225 48.7493C46.2655 47.6323 46.7187 46.2697 46.7127 44.8703V25.667C46.7127 25.3566 46.6509 25.0493 46.5307 24.7632C46.4105 24.477 46.2345 24.2176 46.0128 24.0004C45.7912 23.7831 45.5285 23.6122 45.2399 23.4977C44.9514 23.3832 44.643 23.3274 44.3327 23.3337ZM11.666 46.667C11.0472 46.667 10.4537 46.4212 10.0161 45.9836C9.57852 45.546 9.33268 44.9525 9.33268 44.3337V36.0037L16.076 29.2603C16.417 28.9212 16.8784 28.7309 17.3593 28.7309C17.8403 28.7309 18.3017 28.9212 18.6427 29.2603L36.0727 46.667H11.666ZM41.9993 44.3337C41.9844 44.7855 41.8384 45.2232 41.5793 45.5937L31.0327 35.0003L32.6893 33.367C32.8566 33.1963 33.0563 33.0606 33.2767 32.968C33.497 32.8754 33.7337 32.8277 33.9727 32.8277C34.2117 32.8277 34.4483 32.8754 34.6687 32.968C34.8891 33.0606 35.0887 33.1963 35.256 33.367L41.9993 40.157V44.3337ZM48.9993 9.33366H46.666V7.00033C46.666 6.38149 46.4202 5.78799 45.9826 5.35041C45.545 4.91282 44.9515 4.66699 44.3327 4.66699C43.7138 4.66699 43.1203 4.91282 42.6828 5.35041C42.2452 5.78799 41.9993 6.38149 41.9993 7.00033V9.33366H39.666C39.0472 9.33366 38.4537 9.57949 38.0161 10.0171C37.5785 10.4547 37.3327 11.0482 37.3327 11.667C37.3327 12.2858 37.5785 12.8793 38.0161 13.3169C38.4537 13.7545 39.0472 14.0003 39.666 14.0003H41.9993V16.3337C41.9993 16.9525 42.2452 17.546 42.6828 17.9836C43.1203 18.4212 43.7138 18.667 44.3327 18.667C44.9515 18.667 45.545 18.4212 45.9826 17.9836C46.4202 17.546 46.666 16.9525 46.666 16.3337V14.0003H48.9993C49.6182 14.0003 50.2117 13.7545 50.6493 13.3169C51.0868 12.8793 51.3327 12.2858 51.3327 11.667C51.3327 11.0482 51.0868 10.4547 50.6493 10.0171C50.2117 9.57949 49.6182 9.33366 48.9993 9.33366Z"
                                    fill="#132B2A" fill-opacity="0.55" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 text-center"><span
                                    class="font-semibold">Add
                                    Portfolio Image <br> leave blank if you didnt want to edit</span></p>
                        </div>
                        <input id="thumbnail_image_url" type="file"
                            class="file-input absolute bottom-0 mb-6 justify-center" name="thumbnail_image_url"
                            onchange="getImageProfileContents(event)"
                            value="{{ old('owner_name') ? old('owner_name') : 'default value' }}">
                        {{-- <button class="bg-slate-200 w-fit h-fit px-4 py-2">Choose a file</button> --}}
                        @error('image_profile')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                </div>


                {{-- <div class="w-full md:w-1/2 p-4">
                    <div class="max-w-sm">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 bg-white shadows-md shadow-lg rounded-xl">
                            <div class="flex flex-col items-center justify-center h-100">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Add
                                        Portfolio Image</span></p>
                            </div>
                            <input id="thumbnail_image_url" type="file" class="file-input" name="thumbnail_image_url"
                                value="{{ old('owner_name') ? old('owner_name') : 'default value' }}" />
                        </label>
                    </div>
                </div> --}}

                <!-- Card 2 -->
                <div class="me-12 ms-12 card basis-2/3 h-auto flex justify-center drop-shadow px-20 bg-white rounded-md shadow-md shadow-slate-600"
                    style=" width: 100%; align-items:center;">
                    <div class="card w-full auto-height p-2 py-8 rounded-md mt-2">
                        <div id="container_owner" class="mb-6 flex items-center">
                            <h2 class="font-bold text-1xl mr-3">Creator</h2>
                            <input type="text" id="owner_name" name="owner_name" placeholder="Input content creator"
                                value="{{ old('owner_name') ? old('owner_name') : $content->owner }}"
                                class="w-full p-2 ms-16 border-b-2 border-gray-400">
                        </div>
                        <div class="mb-6 flex flex-row items-center">
                            <h2 class="font-bold text-1xl mr-3">Owner contact</h2>
                            <input type="text" id="owner_contact" name="owner_contact"
                                class="border-b-2 ms-10 w-full border-gray-400 rounded p-2"
                                placeholder="Input owner contact"
                                value="{{ old('owner_contact') ? old('owner_contact') : $content->owner_contact }}">
                        </div>

                        <div class="mb-6 flex items-center">
                            <h2 class="font-bold text-1xl mr-3">Tittle</h2>
                            <input type="text" id="tittle" name="tittle"
                                class="border-b-2 ms-10 w-full border-gray-400 rounded p-2"
                                placeholder="Input content tittle"
                                value="{{ old('tittle') ? old('tittle') : $content->tittle }}">
                        </div>

                        <div class="mb-8 flex">
                            <h2 class="font-bold text-1xl mr-3">Content type</h2>
                            <select id="tipe_konten" name="tipe_konten"
                                class="border-b-2 ms-10 w-full border-gray-400 rounded p-2">
                                <option value="jurnal">jurnal</option>
                                <option value="tugas akhir">tugas akhir</option>
                            </select>
                        </div>

                        <div class="mb-6 flex">
                            <label class="font-bold text-1xl" for="tag">Category</label>
                            <div id="container_tags" class="flex flex-row space-x-4">
                                <select id="tag" name="tag[]"
                                    class="border rounded p-2 w-32 overflow-hidden bg-white ml-4">
                                    <option value="Software Engineering">Software Engineering</option>
                                    <option value="Intelligent Gaming">Intelligent Gaming</option>
                                    <option value="Data Science">Data Science</option>
                                    <option value="System Security and Cybersecurity">System Security and Cybersecurity
                                    </option>
                                    <option value="Mobile and Responsive App Development">Mobile and Responsive App
                                        Development
                                    </option>
                                    <option value="Blockchain Technology and Digital Finance">Blockchain Technology and
                                        Digital
                                        Finance</option>
                                    <option value="Artificial Intelligence and Natural Language Processing">Artificial
                                        Intelligence
                                        and Natural Language Processing</option>
                                    <option value="IoT">IoT</option>

                                </select>
                            </div>

                            <button type="button" onclick="removeDropdown()"
                                class="w-10 ms-6 me-2 h-10 bg-[#344948] hover:bg-teal-900 text-white font-bold rounded items-center justify-center">-</button>
                            <button type="button" onclick="addDropdown()"
                                class="w-10 mr-2 h-10 bg-[#344948] hover:bg-teal-900 text-white font-bold rounded items-center justify-center">+</button>

                        </div>

                        <p class="mb-4 ms-24 text-red-500" id="warning_tags" style="display: none">
                            * you can only add up to 3 items
                        </p>

                        <div class="mb-6 flex items-center">
                            <h2 class="font-bold text-1xl mr-3">Source Code Link (Jika ada)</h2>
                            <input type="text" id="github_url" name="github_url"
                                class="w-full border-b-2 ms-10 border-gray-400 rounded p-2"
                                placeholder="Input content source code"
                                value="{{ old('owner_name') ? old('owner_name') : $content->github_url }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="ms-8 me-8 p-4 flex flex-col">
                <h2 class="text-1xl font-bold mb-4"> Add Description</h2>
                <div class="mb-4">
                    <textarea id="description" name="description" rows="8"
                        class="mt-1 p-4 shadow-md w-full border rounded-md focus:outline-none focus:border-blue-500 text-sm">{{ old('description') ? old('description') : $content->description }}</textarea>
                </div>
            </div>

            <!-- inputimg -->

            {{-- <div class="ms-8 me-8 p-4 mb-8">
                <h2 class="text-1xl font-bold mb-4"> Add pictures related to portfolio</h2>
                <div class="card p-4 w-full  bg-white shadow-md rounded-sm mb-6">
                    <div id="imagePreview" class="flex flex-wrap justify-center">
                        <div id="container_image"
                            class="card w-full flex flex-row items-center justify-center space-x-14">
                            <label id="image_url" for="dropzone-file" style="width: 350px; height: 300px;"
                                class="flex flex-col items-center justify-center w-full rounded-lg cursor-pointer bg-white hover:bg-slate-100">
                                <div id="imagePreview">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                </div>
                                <input type="file" class="file-input" name="image_url[]"
                                    onchange="getImageContents(event)" multiple />
                            </label>
                        </div>
                    </div>
                </div>
                <p class="mb-4 text-red-500" id="warning_images" style="display: none">
                    * Kamu hanya bisa menambah sampai 3 item saja
                </p>
                <button type="button" onclick="addImage()"
                    class="w-10 mr-2 h-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">+</button>
                <button type="button" onclick="removeImage()"
                    class="w-10 h-10 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">-</button>
            </div> --}}

            <div class="ms-8 me-8 mb-8 p-4">
                <h2 class="text-1xl font-bold mb-4 h-auto">Add pictures related to portfolio</h2>
                <div class="card w-full bg-white rounded-sm shadow-md flex flex-col">
                    <div class="flex flex-col">
                        <h1 class="ms-4 my-4">Input Preview</h1>
                        <div class="image-container w-full px-4 flex justify-center space-x-12" id="image-container">
                            {{-- <embed src="{{ asset('asset/tesdokumen.pdf') }}" type=""> --}}
                            <!-- Preview Thumbnail atau Gambar akan muncul disini -->
                        </div>
                    </div>
                    <label id="dropzone_img" for="dropzone-file"
                        class="flex flex-col py-8 items-center justify-center w-full rounded-lg cursor-pointer bg-white hover:bg-slate-100 h-auto">
                        <svg class="mb-2" xmlns="http://www.w3.org/2000/svg" width="56" height="56"
                            viewBox="0 0 56 56" fill="none">
                            <path
                                d="M44.3327 23.3337C43.7138 23.3337 43.1203 23.5795 42.6828 24.0171C42.2452 24.4547 41.9993 25.0482 41.9993 25.667V33.5537L38.546 30.1003C37.3267 28.8906 35.6786 28.2118 33.961 28.2118C32.2434 28.2118 30.5954 28.8906 29.376 30.1003L27.7427 31.757L21.956 25.947C20.7367 24.7373 19.0886 24.0585 17.371 24.0585C15.6534 24.0585 14.0054 24.7373 12.786 25.947L9.33268 29.4237V16.3337C9.33268 15.7148 9.57852 15.1213 10.0161 14.6837C10.4537 14.2462 11.0472 14.0003 11.666 14.0003H30.3327C30.9515 14.0003 31.545 13.7545 31.9826 13.3169C32.4202 12.8793 32.666 12.2858 32.666 11.667C32.666 11.0482 32.4202 10.4547 31.9826 10.0171C31.545 9.57949 30.9515 9.33366 30.3327 9.33366H11.666C9.8095 9.33366 8.02902 10.0712 6.71627 11.3839C5.40351 12.6967 4.66602 14.4771 4.66602 16.3337V44.847C4.67216 46.5655 5.35755 48.2118 6.57271 49.427C7.78786 50.6421 9.4342 51.3275 11.1527 51.3337H40.1793C40.8116 51.3286 41.4401 51.2343 42.046 51.0537C43.3934 50.6757 44.5795 49.8662 45.4225 48.7493C46.2655 47.6323 46.7187 46.2697 46.7127 44.8703V25.667C46.7127 25.3566 46.6509 25.0493 46.5307 24.7632C46.4105 24.477 46.2345 24.2176 46.0128 24.0004C45.7912 23.7831 45.5285 23.6122 45.2399 23.4977C44.9514 23.3832 44.643 23.3274 44.3327 23.3337ZM11.666 46.667C11.0472 46.667 10.4537 46.4212 10.0161 45.9836C9.57852 45.546 9.33268 44.9525 9.33268 44.3337V36.0037L16.076 29.2603C16.417 28.9212 16.8784 28.7309 17.3593 28.7309C17.8403 28.7309 18.3017 28.9212 18.6427 29.2603L36.0727 46.667H11.666ZM41.9993 44.3337C41.9844 44.7855 41.8384 45.2232 41.5793 45.5937L31.0327 35.0003L32.6893 33.367C32.8566 33.1963 33.0563 33.0606 33.2767 32.968C33.497 32.8754 33.7337 32.8277 33.9727 32.8277C34.2117 32.8277 34.4483 32.8754 34.6687 32.968C34.8891 33.0606 35.0887 33.1963 35.256 33.367L41.9993 40.157V44.3337ZM48.9993 9.33366H46.666V7.00033C46.666 6.38149 46.4202 5.78799 45.9826 5.35041C45.545 4.91282 44.9515 4.66699 44.3327 4.66699C43.7138 4.66699 43.1203 4.91282 42.6828 5.35041C42.2452 5.78799 41.9993 6.38149 41.9993 7.00033V9.33366H39.666C39.0472 9.33366 38.4537 9.57949 38.0161 10.0171C37.5785 10.4547 37.3327 11.0482 37.3327 11.667C37.3327 12.2858 37.5785 12.8793 38.0161 13.3169C38.4537 13.7545 39.0472 14.0003 39.666 14.0003H41.9993V16.3337C41.9993 16.9525 42.2452 17.546 42.6828 17.9836C43.1203 18.4212 43.7138 18.667 44.3327 18.667C44.9515 18.667 45.545 18.4212 45.9826 17.9836C46.4202 17.546 46.666 16.9525 46.666 16.3337V14.0003H48.9993C49.6182 14.0003 50.2117 13.7545 50.6493 13.3169C51.0868 12.8793 51.3327 12.2858 51.3327 11.667C51.3327 11.0482 51.0868 10.4547 50.6493 10.0171C50.2117 9.57949 49.6182 9.33366 48.9993 9.33366Z"
                                fill="#132B2A" fill-opacity="0.55" />
                        </svg>
                        <p class="text-sm text-gray-500 mb-2 dark:text-gray-400 text-center"><span
                                class="font-semibold">Add
                                add up to 3 images <br> leave blank if you didnt want to edit</span></p>
                    </label>
                    <input id="image_url" type="file" name="image_url[]"
                        class="file py-6 justify-self-center self-center" multiple onchange="getImageContents(event)">
                </div>
            </div>

            <!-- Add paper portfolio -->
            <div class="ms-8 me-8 mb-8 p-4 ">
                <h2 class="text-1xl font-bold mb-4 h-auto">Add paper portfolio</h2>
                <div class="card w-full bg-white rounded-sm shadow-md flex flex-col">
                    <div class="flex flex-col">
                        <h1 class="ms-4 my-4">Input Preview</h1>
                        <div class="preview-container px-4" id="preview-container">
                            {{-- <embed src="{{ asset('asset/tesdokumen.pdf') }}" type=""> --}}
                            <!-- Preview Thumbnail atau Gambar akan muncul disini -->
                        </div>
                    </div>
                    <label for="dropzone-file"
                        class="flex flex-col py-8 items-center justify-center w-full rounded-lg cursor-pointer bg-white hover:bg-slate-100 h-auto">
                        <svg class="mb-6" xmlns="http://www.w3.org/2000/svg" width="36" height="44"
                            viewBox="0 0 36 44" fill="none">
                            <path
                                d="M19.5377 20.4613C19.3316 20.2641 19.0886 20.1095 18.8227 20.0063C18.2952 19.7896 17.7035 19.7896 17.176 20.0063C16.9101 20.1095 16.6671 20.2641 16.461 20.4613L12.1277 24.7947C11.7197 25.2027 11.4905 25.756 11.4905 26.333C11.4905 26.91 11.7197 27.4634 12.1277 27.8713C12.5357 28.2793 13.089 28.5085 13.666 28.5085C14.243 28.5085 14.7964 28.2793 15.2043 27.8713L15.8327 27.2213V32.833C15.8327 33.4076 16.061 33.9587 16.4673 34.3651C16.8736 34.7714 17.4247 34.9997 17.9993 34.9997C18.574 34.9997 19.1251 34.7714 19.5314 34.3651C19.9377 33.9587 20.166 33.4076 20.166 32.833V27.2213L20.7943 27.8713C20.9958 28.0744 21.2354 28.2356 21.4994 28.3456C21.7635 28.4556 22.0467 28.5122 22.3327 28.5122C22.6187 28.5122 22.9019 28.4556 23.1659 28.3456C23.43 28.2356 23.6696 28.0744 23.871 27.8713C24.0741 27.6699 24.2353 27.4303 24.3453 27.1663C24.4553 26.9022 24.5119 26.619 24.5119 26.333C24.5119 26.047 24.4553 25.7638 24.3453 25.4998C24.2353 25.2357 24.0741 24.9961 23.871 24.7947L19.5377 20.4613ZM35.3327 15.3697C35.3101 15.1706 35.2665 14.9745 35.2027 14.7847V14.5897C35.0985 14.3669 34.9595 14.1621 34.791 13.983V13.983L21.791 0.983008C21.6119 0.814476 21.4071 0.675517 21.1843 0.571341H20.9677C20.757 0.458681 20.5306 0.378339 20.296 0.333008H7.16602C5.44211 0.333008 3.78881 1.01783 2.56982 2.23681C1.35084 3.4558 0.666016 5.1091 0.666016 6.83301V37.1663C0.666016 38.8902 1.35084 40.5436 2.56982 41.7625C3.78881 42.9815 5.44211 43.6663 7.16602 43.6663H28.8327C30.5566 43.6663 32.2099 42.9815 33.4289 41.7625C34.6479 40.5436 35.3327 38.8902 35.3327 37.1663V15.4997C35.3327 15.4997 35.3327 15.4997 35.3327 15.3697ZM22.3327 7.72134L27.9443 13.333H24.4993C23.9247 13.333 23.3736 13.1047 22.9673 12.6984C22.561 12.2921 22.3327 11.741 22.3327 11.1663V7.72134ZM30.9993 37.1663C30.9993 37.741 30.7711 38.2921 30.3647 38.6984C29.9584 39.1047 29.4073 39.333 28.8327 39.333H7.16602C6.59138 39.333 6.04028 39.1047 5.63395 38.6984C5.22762 38.2921 4.99935 37.741 4.99935 37.1663V6.83301C4.99935 6.25837 5.22762 5.70727 5.63395 5.30094C6.04028 4.89461 6.59138 4.66634 7.16602 4.66634H17.9993V11.1663C17.9993 12.8902 18.6842 14.5436 19.9032 15.7625C21.1221 16.9815 22.7754 17.6663 24.4993 17.6663H30.9993V37.1663Z"
                                fill="#132B2A" fill-opacity="0.56" />
                        </svg>
                        <p class="text-sm text-gray-500 mb-2 dark:text-gray-400 text-center"><span
                                class="font-semibold">Add
                                add portofolio file here <br> leave blank if you didnt want to edit</span></p>
                        {{-- <button class="bg-slate-200 w-fit h-fit px-4 py-2">Choose a file</button> --}}
                    </label>
                    <input id="content_url" type="file" name="content_url" class="file-input self-center py-6"
                        onchange="getDocPreview(event)">
                </div>
            </div>

            {{-- <div class="ms-8 me-8 mb-8 p-4 ">
                <h2 class="text-1xl font-bold mb-4">Add paper portfolio</h2>
                <div class="card w-full bg-white rounded-sm shadow-md">
                    <div class="flex flex-col">
                        <h1 class="ms-4 my-4">Input Preview</h1>
                        <div class="preview-container px-4" id="preview-container">
                        </div>
                    </div>
                    <label for="dropzone-file" style="height: 300px;"
                        class="flex flex-col items-center justify-center w-full rounded-lg cursor-pointer bg-white hover:bg-slate-100">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <input id="content_url" type="file" name="content_url" class="file-input"
                            onchange="getDocPreview(event)" />
                    </label>
                </div>
            </div> --}}

            <!-- Add Demo portfolio -->
            <div class="ms-8 me-8 mb-8 p-4 ">
                <h2 class="text-1xl font-bold mb-4 h-auto">Add Demo or Video Portfolio ( URL ) </h2>
                <div class="card w-full bg-white rounded-sm shadow-md flex flex-col">
                    <iframe id="video_container" class="w-fit h-fit p-4 hidden self-center" src=""
                        frameborder="0" allowfullscreen></iframe>

                    {{-- <iframe id="video_container"
                        class="w-full h-auto p-4"src="https://youtu.be/KjidMRspNDU?si=mBVIjZPEZK-Srnpd" type=""> --}}
                    <button id="btn_video" type="button" class="flex" onclick="linkPopup()">
                        <label for="dropzone-file"
                            class="flex flex-col py-20 items-center justify-center w-full rounded-lg cursor-pointer bg-white hover:bg-slate-100 h-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="52" height="52" viewBox="0 0 52 52"
                                fill="none">
                                <path
                                    d="M41.1673 4.33301H10.834C9.11008 4.33301 7.45678 5.01783 6.23779 6.23681C5.0188 7.4558 4.33398 9.1091 4.33398 10.833V41.1663C4.33398 42.8903 5.0188 44.5436 6.23779 45.7625C7.45678 46.9815 9.11008 47.6663 10.834 47.6663H41.1673C42.8912 47.6663 44.5445 46.9815 45.7635 45.7625C46.9825 44.5436 47.6673 42.8903 47.6673 41.1663V10.833C47.6673 9.1091 46.9825 7.4558 45.7635 6.23681C44.5445 5.01783 42.8912 4.33301 41.1673 4.33301ZM34.8623 8.66634L26.1957 17.333H17.139L25.8057 8.66634H34.8623ZM8.66732 10.833C8.66732 10.2584 8.89559 9.70727 9.30192 9.30094C9.70825 8.89461 10.2593 8.66634 10.834 8.66634H19.6957L11.029 17.333H8.66732V10.833ZM43.334 41.1663C43.334 41.741 43.1057 42.2921 42.6994 42.6984C42.2931 43.1047 41.742 43.333 41.1673 43.333H10.834C10.2593 43.333 9.70825 43.1047 9.30192 42.6984C8.89559 42.2921 8.66732 41.741 8.66732 41.1663V21.6663H43.334V41.1663ZM43.334 17.333H32.3057L40.9723 8.66634H41.1673C41.742 8.66634 42.2931 8.89461 42.6994 9.30094C43.1057 9.70727 43.334 10.2584 43.334 10.833V17.333Z"
                                    fill="#132B2A" fill-opacity="0.55" />
                            </svg>
                            <p class="text-sm text-gray-500 mb-2 mt-6 dark:text-gray-400 text-center"><span
                                    class="font-semibold">Add
                                    add demo video url here <br> leave blank if you didnt want to edit</span></p>

                            <input id="video_url" name="video_url" type="text" hidden>
                            <input id="video_tittle" name="video_tittle" type="text" hidden>
                        </label>
                    </button>

                </div>
            </div>

            <button type="submit"
                class="w-fit self-end me-12 mb-6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save
                Changes</button>
        </div>
    </form>


    <div id="addLinkModal" class="modal">
        <div class="relative w-[600px] h-fit px-12 py-4 bg-white rounded-xl">
            <button type="submit" onclick="closeLink()">
                <div class="absolute top-0 end-0 me-6 mt-6 text-lg font-bold">
                    x
                </div>
            </button>
            <div class="flex-col pt-12 w-full h-fit">
                <p class="text-md font-bold mb-4">
                    Enter URL Link
                </p>
                <input id="vid_url" class="w-full h-fit ps-2 bg-stone-200 border border-black text-md text-black py-2"
                    type="text">
            </div>

            <div class="flex-col pt-6 w-full h-fit mb-20">
                <p class="text-md font-bold mb-4">
                    Enter Link Tittle
                </p>
                <input id="vid_tittle" class="w-full h-fit ps-2 bg-stone-200 border border-black text-md text-black py-2"
                    type="text">
            </div>

            <button
                class="rounded absolute bg-green-500 bottom-0 end-0 me-12 mb-6 px-4 py-2 hover:green-red-700 text-white self-end justify-self-end"
                type="button" class="cancel-button" onclick="saveLink()">Save Changes </button>

        </div>
    </div>


    @stack('scripts')

@endsection
<script>
    var counter = 1;

    function addInput() {
        var dropdowns = document.querySelectorAll("#container_owner input");
        if (dropdowns.length < 3) {
            document.getElementById("warning_owners").style.display = "none";
            var originalDropdown = document.getElementById("name");
            var clonedDropdown = originalDropdown.cloneNode(true);
            document.querySelector("#container_owner").appendChild(clonedDropdown);
        } else {
            document.getElementById("warning_owners").style.display = "flex";
        }
    }

    function removeInput() {
        var dropdowns = document.querySelectorAll("#container_owner input");
        if (dropdowns.length > 1) {
            document.getElementById("warning_owners").style.display = "none";
            var lastDropdown = dropdowns[dropdowns.length - 1];
            lastDropdown.parentNode.removeChild(lastDropdown);
        }
    }

    function addDropdown() {
        var dropdowns = document.querySelectorAll("#container_tags select");
        if (dropdowns.length < 3) {
            document.getElementById("warning_tags").style.display = "none";
            var originalDropdown = document.getElementById("tag");
            var clonedDropdown = originalDropdown.cloneNode(true);
            document.querySelector("#container_tags").appendChild(clonedDropdown);
        } else {
            document.getElementById("warning_tags").style.display = "flex";
        }
    }

    function removeDropdown() {
        var dropdowns = document.querySelectorAll("#container_tags select");
        if (dropdowns.length > 1) {
            document.getElementById("warning_tags").style.display = "none";
            var lastDropdown = dropdowns[dropdowns.length - 1];
            lastDropdown.parentNode.removeChild(lastDropdown);
        }
    }

    function getDocPreview(event) {
        console.log(counter);
        var documents = URL.createObjectURL(event.target.files[0]);
        var docdiv = document.getElementById('preview-container');
        var dropzoneDocs = document.getElementById('dropzone_docs');
        var newdoc = document.createElement('embed');
        while (docdiv.firstChild) {
            docdiv.removeChild(docdiv.firstChild);
        }
        newdoc.src = documents;
        newdoc.width = "100%";
        newdoc.height = "500";
        docdiv.appendChild(newdoc);
        if (docdiv.childElementCount > 0) {
            dropzoneDocs.style.display = "none";
        } else {
            dropzoneDocs.style.display = "flex";

        }
    }

    // function getVideoPreview(event) {
    //     var documents = URL.createObjectURL(event.target.files[0]);
    //     var docdiv = document.getElementById('video-container');
    //     var newdoc = document.createElement('embed');
    //     newdoc.src = documents;
    //     newdoc.width = "100%";
    //     newdoc.height = "500";
    //     docdiv.appendChild(newdoc);
    // }

    function getImageContents(event) {
        var docdiv = document.getElementById('image-container');
        var dropzoneImg = document.getElementById('dropzone_img');
        var i = 0;
        // console.log(docdiv.childElementCount);
        while (docdiv.firstChild) {
            docdiv.removeChild(docdiv.firstChild);
        }
        while (i < event.target.files.length) {
            var documents = URL.createObjectURL(event.target.files[i]);
            var newdoc = document.createElement('embed');
            newdoc.src = documents;
            newdoc.width = "300";
            newdoc.height = "200";
            // newdoc.style.objectFit = "cover"; // Atau "contain" tergantung kebutuhan
            // newdoc.style.objectPosition = "center"; // Atau atur sesuai kebutuhan
            docdiv.appendChild(newdoc);
            i++;
        }
        if (docdiv.childElementCount > 0) {
            dropzoneImg.style.display = "none";
        } else {
            dropzoneImg.style.display = "flex";

        }
    }

    function getImageProfileContents(event) {
        var documents = URL.createObjectURL(event.target.files[0]);
        var docdiv = document.getElementById('image_profile-container');
        var dropzoneProfile = document.getElementById('dropzone_profile');
        var newdoc = document.createElement('embed');
        while (docdiv.firstChild) {
            docdiv.removeChild(docdiv.firstChild);
        }
        newdoc.src = documents;
        newdoc.width = "300px";
        newdoc.height = "400px ";
        newdoc.margin_top = "10px";
        newdoc.overflow = "hidden";
        docdiv.appendChild(newdoc);
        if (docdiv.childElementCount > 0) {
            dropzoneProfile.style.display = "none";
        } else {
            dropzoneProflie.style.display = "flex";

        }
    }


    function linkPopup() {
        var modal = document.getElementById('addLinkModal');
        modal.style.display = 'flex';
        console.log("berhasil");
    }

    // Fungsi untuk menutup modal
    function closeLink() {
        var modal = document.getElementById('addLinkModal');
        modal.style.display = 'none';
    }

    // Fungsi untuk menghapus data (gantilah dengan logika penghapusan data yang sesuai)
    function saveLink() {
        var videoUrl = document.getElementById('video_url');
        var videoTittle = document.getElementById('video_tittle');
        var vidUrl = document.getElementById('vid_url');
        var vidTittle = document.getElementById('vid_tittle');
        var btnVideo = document.getElementById('btn_video');

        videoUrl.value = vidUrl.value;
        videoTittle.value = vidTittle.value;
        var video_container = document.getElementById('video_container');
        video_container.src = videoUrl.value;
        console.log(video_container.src);

        if (video_container.src != "") {
            video_container.style.display = 'flex';

        } else {
            video_container.style.display = 'none';
        }

        closeLink();
    }
</script>
