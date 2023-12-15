@extends('admin.dashboard.layouts')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.dashboard.member.saveedit', $dosens->id) }}" method="POST" class="flex"
        enctype="multipart/form-data">
        <div class="container px-8">
            <!-- Container untuk dua card -->
            @csrf
            <div class="flex col">
                <div class="mt-2 mb-8 w-full flex flex-row justify-end items-end">
                    <!-- Card 1 -->
                    <div class="ms-2 card relative justify-center basis-1/3 drop-shadow rounded-md shadow-md shadow-slate-600 items-end p-4"
                        style="background-color: #FFFFFF;">
                        <label class="py-4 ps-4 mb-4" for="image-container">Input Preview</label>
                        <div class="image-container ms-6 mb-12 px-4 py-4 w-fit h-fit flex items-center justify-center self-center justify-self-center space-x-12"
                            id="image_profile-container">
                            {{-- <embed class="" src="" type=""> --}}
                            <!-- Preview Thumbnail atau Gambar akan muncul disini -->
                        </div>
                        <div class="flex flex-col h-fit items-center justify-center">
                            <div id="dropzone_profile"
                                class="icon_profile flex-col w-fit items-center justify-center mt-32">
                                <svg class="mb-6 ms-24" xmlns="http://www.w3.org/2000/svg" width="56" height="56"
                                    viewBox="0 0 56 56" fill="none">
                                    <path
                                        d="M44.3327 23.3337C43.7138 23.3337 43.1203 23.5795 42.6828 24.0171C42.2452 24.4547 41.9993 25.0482 41.9993 25.667V33.5537L38.546 30.1003C37.3267 28.8906 35.6786 28.2118 33.961 28.2118C32.2434 28.2118 30.5954 28.8906 29.376 30.1003L27.7427 31.757L21.956 25.947C20.7367 24.7373 19.0886 24.0585 17.371 24.0585C15.6534 24.0585 14.0054 24.7373 12.786 25.947L9.33268 29.4237V16.3337C9.33268 15.7148 9.57852 15.1213 10.0161 14.6837C10.4537 14.2462 11.0472 14.0003 11.666 14.0003H30.3327C30.9515 14.0003 31.545 13.7545 31.9826 13.3169C32.4202 12.8793 32.666 12.2858 32.666 11.667C32.666 11.0482 32.4202 10.4547 31.9826 10.0171C31.545 9.57949 30.9515 9.33366 30.3327 9.33366H11.666C9.8095 9.33366 8.02902 10.0712 6.71627 11.3839C5.40351 12.6967 4.66602 14.4771 4.66602 16.3337V44.847C4.67216 46.5655 5.35755 48.2118 6.57271 49.427C7.78786 50.6421 9.4342 51.3275 11.1527 51.3337H40.1793C40.8116 51.3286 41.4401 51.2343 42.046 51.0537C43.3934 50.6757 44.5795 49.8662 45.4225 48.7493C46.2655 47.6323 46.7187 46.2697 46.7127 44.8703V25.667C46.7127 25.3566 46.6509 25.0493 46.5307 24.7632C46.4105 24.477 46.2345 24.2176 46.0128 24.0004C45.7912 23.7831 45.5285 23.6122 45.2399 23.4977C44.9514 23.3832 44.643 23.3274 44.3327 23.3337ZM11.666 46.667C11.0472 46.667 10.4537 46.4212 10.0161 45.9836C9.57852 45.546 9.33268 44.9525 9.33268 44.3337V36.0037L16.076 29.2603C16.417 28.9212 16.8784 28.7309 17.3593 28.7309C17.8403 28.7309 18.3017 28.9212 18.6427 29.2603L36.0727 46.667H11.666ZM41.9993 44.3337C41.9844 44.7855 41.8384 45.2232 41.5793 45.5937L31.0327 35.0003L32.6893 33.367C32.8566 33.1963 33.0563 33.0606 33.2767 32.968C33.497 32.8754 33.7337 32.8277 33.9727 32.8277C34.2117 32.8277 34.4483 32.8754 34.6687 32.968C34.8891 33.0606 35.0887 33.1963 35.256 33.367L41.9993 40.157V44.3337ZM48.9993 9.33366H46.666V7.00033C46.666 6.38149 46.4202 5.78799 45.9826 5.35041C45.545 4.91282 44.9515 4.66699 44.3327 4.66699C43.7138 4.66699 43.1203 4.91282 42.6828 5.35041C42.2452 5.78799 41.9993 6.38149 41.9993 7.00033V9.33366H39.666C39.0472 9.33366 38.4537 9.57949 38.0161 10.0171C37.5785 10.4547 37.3327 11.0482 37.3327 11.667C37.3327 12.2858 37.5785 12.8793 38.0161 13.3169C38.4537 13.7545 39.0472 14.0003 39.666 14.0003H41.9993V16.3337C41.9993 16.9525 42.2452 17.546 42.6828 17.9836C43.1203 18.4212 43.7138 18.667 44.3327 18.667C44.9515 18.667 45.545 18.4212 45.9826 17.9836C46.4202 17.546 46.666 16.9525 46.666 16.3337V14.0003H48.9993C49.6182 14.0003 50.2117 13.7545 50.6493 13.3169C51.0868 12.8793 51.3327 12.2858 51.3327 11.667C51.3327 11.0482 51.0868 10.4547 50.6493 10.0171C50.2117 9.57949 49.6182 9.33366 48.9993 9.33366Z"
                                        fill="#132B2A" fill-opacity="0.55" />
                                </svg>
                                <p class="mb-20 text-sm text-gray-500 dark:text-gray-400 text-center"><span
                                        class="font-semibold">Add
                                        Portfolio Image <br> leave blank if you didnt want to edit</span></p>
                            </div>
                            <input id="image_profile" type="file"
                                class="file-input absolute bottom-0 mt-6 mb-6 justify-center" name="image_profile"
                                onchange="getImageProfileContents(event)"
                                value="{{ old('image_profile') ? old('image_profile') : '' }}">
                            {{-- <button class="bg-slate-200 w-fit h-fit px-4 py-2">Choose a file</button> --}}
                        </div>

                    </div>

                    <!-- Card 2 -->
                    <div class="me-12 ms-12 card basis-2/3 h-full flex justify-center items-start drop-shadow px-20 bg-white rounded-md shadow-md shadow-slate-600"
                        style=" width: 100%;">

                        <div class="card w-full flex-col justify-center self-center items-center auto-height p-2 py-8 rounded-md mt-2">
                            <div id="container_owner" class="mb-6 flex items-center">
                                <h2 class="font-bold text-xl mr-3">Name</h2>
                                <input type="text" id="name" name="name" placeholder="Input lecturer name"
                                    value="{{ old('name') ? old('name') : $dosens->name }}"
                                    class="w-full p-2 ms-16 border-b-2 border-gray-400 text-xl">
                            </div>

                            <div class="mb-6 flex flex-row items-center">
                                <h2 class="font-bold text-xl mr-3">Major</h2>
                                <input type="text" id="major" name="major"
                                    class="border-b-2 ms-10 w-full border-gray-400 rounded p-2 text-xl"
                                    placeholder="Input lecturer major"
                                    value="{{ old('major') ? old('major') : $dosens->major }}">
                            </div>

                            <div class="mb-6 flex">
                                <label class="font-bold text-xl" for="tag">Specialization</label>
                                <div id="container_tags" class="flex flex-row space-x-4">
                                    <select id="specialities" name="specialities[]"
                                        class="border rounded p-2 w-32 overflow-hidden bg-white ml-4">
                                        <option value="Software Engineering">Software Engineering</option>
                                        <option value="Intelligent Gaming">Intelligent Gaming</option>
                                        <option value="Data Science">Data Science</option>
                                        <option value="System Security and Cybersecurity">System Security and
                                            Cybersecurity
                                        </option>
                                        <option value="Mobile and Responsive App Development">Mobile and Responsive App
                                            Development
                                        </option>
                                        <option value="Blockchain Technology and Digital Finance">Blockchain Technology
                                            and
                                            Digital
                                            Finance</option>
                                        <option value="Artificial Intelligence and Natural Language Processing">
                                            Artificial
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

                            <div class="mb-6 flex flex-row items-center">
                                <h2 class="font-bold text-xl mr-3">Contact</h2>
                                <input type="text" id="contact" name="contact"
                                    class="border-b-2 ms-10 w-full border-gray-400 rounded p-2 text-xl"
                                    placeholder="Input lecturer contact"
                                    value="{{ old('contact') ? old('contact') : $dosens->contact }}">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="full flex justify-end me-12 items-center">
                <button type="submit"
                    class="mt-6 w-auto auto-width border-2 self-end justify-self-end bg-green-500 hover:bg-green-600 text-white py-2 px-4 hover:border-transparent rounded-lg"
                    style="font-size: 15px;">Save Changes
                </button>
            </div>
        </div>
    </form>
    @stack('script')
@endsection
<script>
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

    function addDropdown() {
        var dropdowns = document.querySelectorAll("#container_tags select");
        if (dropdowns.length < 3) {
            document.getElementById("warning_tags").style.display = "none";
            var originalDropdown = document.getElementById("specialities");
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
</script>
