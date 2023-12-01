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

    <form action="{{ route('admin.porto.storePorto') }}" method="POST" class="flex" enctype="multipart/form-data">
        @csrf
        <div class="w-full flex flex-col">
            <!-- Flex Container 1 -->
            <div class="mt-12 mb-8 w-full flex flex-row">
                <!-- Card 1 -->
                <div class="ms-12 card drop-shadow p-2 rounded-xl shadow-md items-end p-4" style="background-color: #FFFFFF;">
                    <label class="py-4 ps-4 mb-4" for="image-container">Input Preview</label>
                    <div class="image-container px-4 py-4 flex justify-center space-x-12" id="image_profile-container">
                        {{-- <embed class="" src="" type=""> --}}
                        <!-- Preview Thumbnail atau Gambar akan muncul disini -->
                    </div>
                    <div class="flex flex-col items-center">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Add
                                Portfolio Image</span></p>
                    </div>
                    <input id="thumbnail_image_url" type="file" class="file-input" name="thumbnail_image_url"
                        onchange="getImageProfileContents(event)"
                        value="{{ old('owner_name') ? old('owner_name') : 'default value' }}" /> @error('image_profile')
                        <span>{{ $message }}</span>
                    @enderror
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
                <div class="me-12 ms-12 card w-1/2 h-auto flex justify-center drop-shadow shadow-md px-20 bg-white rounded-md"
                    style=" width: 100%; align-items:center;">
                    <div class="card w-full auto-height p-2 py-8 rounded-md">
                        <div id="container_owner" class="mb-6 flex">
                            <h2 class="font-bold text-1xl mr-3">Creator</h2>
                            <input type="text" id="owner_name" name="owner_name"
                                value="{{ old('owner_name') ? old('owner_name') : 'default value' }}"
                                class="w-full border rounded p-2 mr-4">
                        </div>
                        <div class="mb-6 flex">
                            <h2 class="font-bold text-1xl mr-3">Owner contact</h2>
                            <input type="text" id="owner_contact" name="owner_contact" class="w-full border rounded p-2"
                                value="{{ old('owner_contact') ? old('owner_contact') : 'default value' }}">
                        </div>

                        <div class="mb-6 flex">
                            <h2 class="font-bold text-1xl mr-3">Tittle</h2>
                            <input type="text" id="tittle" name="tittle" class="w-full border rounded p-2"
                                value="{{ old('tittle') ? old('tittle') : 'default value' }}">
                        </div>

                        <div class="mb-6 flex">
                            <h2 class="font-bold text-1xl mr-3">Content type</h2>
                            <select id="tipe_konten" name="tipe_konten" class="border rounded p-2 bg-white ml-4 mr-4">
                                <option value="jurnal">jurnal</option>
                                <option value="tugas akhir">tugas akhir</option>
                            </select>
                        </div>

                        <div class="mb-6 flex">
                            <label class="font-bold text-1xl" for="tag">Category</label>
                            <div id="container_tags" class="flex flex-col">
                                <select id="tag" name="tag[]" class="border rounded p-2 bg-white ml-4 mr-4">
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

                            <button type="button" onclick="addDropdown()"
                                class="w-10 mr-2 h-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">+</button>
                            <button type="button" onclick="removeDropdown()"
                                class="w-10 h-10 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">-</button>
                        </div>

                        <p class="mb-4 ms-24 text-red-500" id="warning_tags" style="display: none">
                            * Kamu hanya bisa menambah sampai 3 item saja
                        </p>

                        <div class="mb-6 flex">
                            <h2 class="font-bold text-1xl mr-3">Lecturer</h2>
                            <select id="tag" name="name" class="border rounded p-2 bg-white ml-4 mr-4">
                                @foreach ($dropdownDosen as $data)
                                    <option value="{{ $data->name }}">{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6 flex">
                            <h2 class="font-bold text-1xl mr-3">Source Code Link (Jika ada)</h2>
                            <input type="text" id="github_url" name="github_url" class="w-full border rounded p-2"
                                value="{{ old('owner_name') ? old('owner_name') : 'default value' }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="ms-8 me-8 p-4 flex flex-col">
                <h2 class="text-1xl font-bold mb-4"> Add Description</h2>
                <div class="mb-4">
                    <textarea id="description" name="description" rows="8"
                        class="mt-1 p-4 shadow-md w-full border rounded-md focus:outline-none focus:border-blue-500 text-sm">{{ old('description') ? old('description') : 'default value' }}"</textarea>
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

            <div class="ms-8 me-8 mb-8 p-4 ">
                <h2 class="text-1xl font-bold mb-4 h-auto">Add pictures related to portfolio</h2>
                <div class="card w-full bg-white rounded-sm shadow-md flex flex-col">
                    <div class="flex flex-col">
                        <h1 class="ms-4 my-4">Input Preview</h1>
                        <div class="image-container px-4 flex justify-center space-x-12" id="image-container">
                            {{-- <embed src="{{ asset('asset/tesdokumen.pdf') }}" type=""> --}}
                            <!-- Preview Thumbnail atau Gambar akan muncul disini -->
                        </div>
                    </div>
                    <label for="dropzone-file"
                        class="flex flex-col py-8 items-center justify-center w-full rounded-lg cursor-pointer bg-white hover:bg-slate-100 h-auto">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <input id="image_url" type="file" name="image_url[]" class="file-input" multiple
                            onchange="getImageContents(event)" />
                    </label>
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
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <input id="content_url" type="file" name="content_url" class="file-input"
                            onchange="getDocPreview(event)" />
                    </label>
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
                    <div class="flex flex-col">
                        <h1 class="ms-4 my-4">Input Preview</h1>
                        <div class="video-container px-4" id="video-container">
                            {{-- <embed src="{{ asset('asset/tesdokumen.pdf') }}" type=""> --}}
                            <!-- Preview Thumbnail atau Gambar akan muncul disini -->
                        </div>
                    </div>
                    <label for="dropzone-file"
                        class="flex flex-col py-8 items-center justify-center w-full rounded-lg cursor-pointer bg-white hover:bg-slate-100 h-auto">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <input id="content_url" type="file" name="content_url" class="file-input"
                            onchange="getVideoPreview(event)" />
                    </label>
                </div>
            </div>

            <button type="submit" class="mx-12 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save
                Changes</button>
        </div>
    </form>
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

    function addImage() {
        var dropdowns = document.querySelectorAll("#container_image label");
        if (dropdowns.length < 3) {
            document.getElementById("warning_images").style.display = "none";
            var originalDropdown = document.getElementById("image_url");
            var clonedDropdown = originalDropdown.cloneNode(true);
            document.querySelector("#container_image").appendChild(clonedDropdown);
        } else {
            document.getElementById("warning_images").style.display = "flex";
        }
    }

    function removeImage() {
        var dropdowns = document.querySelectorAll("#container_image label");
        if (dropdowns.length > 1) {
            document.getElementById("warning_images").style.display = "none";
            var lastDropdown = dropdowns[dropdowns.length - 1];
            lastDropdown.parentNode.removeChild(lastDropdown);
        }
    }

    function getDocPreview(event) {
        console.log(counter);
        var documents = URL.createObjectURL(event.target.files[0]);
        var docdiv = document.getElementById('preview-container');
        var newdoc = document.createElement('embed');
        newdoc.src = documents;
        newdoc.width = "100%";
        newdoc.height = "500";
        docdiv.appendChild(newdoc);
    }

    function getVideoPreview(event) {
        var documents = URL.createObjectURL(event.target.files[0]);
        var docdiv = document.getElementById('video-container');
        var newdoc = document.createElement('embed');
        newdoc.src = documents;
        newdoc.width = "100%";
        newdoc.height = "500";
        docdiv.appendChild(newdoc);
    }

    function getImageContents(event) {
        var i = 0;
        while (i < event.target.files.length) {
            var documents = URL.createObjectURL(event.target.files[i]);
            var docdiv = document.getElementById('image-container');
            var newdoc = document.createElement('embed');
            newdoc.src = documents;
            newdoc.width = "300";
            newdoc.height = "200";
            docdiv.appendChild(newdoc);
            i++;
        }
    }

    function getImageProfileContents(event) {
        var documents = URL.createObjectURL(event.target.files[0]);
        var docdiv = document.getElementById('image_profile-container');
        var newdoc = document.createElement('embed');
        newdoc.src = documents;
        newdoc.width = "100%";
        newdoc.height = "400px ";
        newdoc.margin_top = "10px";
        docdiv.appendChild(newdoc);
        i++;
    }
</script>
