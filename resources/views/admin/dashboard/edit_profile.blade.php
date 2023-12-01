@extends('admin.dashboard.layouts')

@section('content')
    <form action="{{ route('admin.dashboard.member.saveedit', $dosens->id) }}" method="POST" class="flex"
        enctype="multipart/form-data">
        <div class="container" style="padding: 4rem;">
            <!-- Container untuk dua card -->
            @csrf
            <div class="flex col">
                <div class="flex lg:flex-row sm:flex-col sm:justify-center">
                    <!-- img -->

                    <div class="card drop-shadow p-2 rounded-xl shadow-md justify-center content-center items-center"
                        style="background-color: #FBFFFC;">
                        <img class="mb-6" style="height: auto;"
                            src="{{ asset('storage/photos/profile_view/' . $dosens->image_profile) }}" alt="Cat Image">
                        <input id="image_profile" type="file" class="file-input w-auto" name="image_profile" />
                        @error('image_profile')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Card-->
                    <div class="card w-1/2 flex justify-center drop-shadow shadow-md px-20"
                        style="margin-left: 20px; width: 100%; height: auto; border-radius: 15px; background-color: #FBFFFC; align-items:center;">
                        {{--
                        <div class="" style="font-size: 20px;">
                            <h1 class="text-1xl font-bold mb-6">Name</h1>
                            <h1 class="text-1xl font-bold mb-6">Major</h1>
                            <h1 class="text-1xl font-bold mb-6">Specialization</h1>
                            <h1 class="text-1xl font-bold mb-6">Contact</h1>
                        </div> --}}


                        <div class="my-10 h-auto" style="margin-left: 0px; font-size: 20px;">
                            <div class="flex justify-center content-center items-center">
                                <label class="me-20" for="tag">Name </label>
                                <input type="text" id="firstname"
                                    class="text-xl w-full p-2.5 mb-4 rounded-none border-b border-black" name="name"
                                    value="{{ $dosens->name }}" required>
                                @error('name')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="flex justify-center content-center items-center mb-4">
                                <label class="me-20" for="major">Major</label>
                                <input type="text" id="major"
                                    class="mb-4 text-xl w-full p-2.5 rounded-none border-b border-black" name="major"
                                    value="{{ $dosens->major }}" required>
                                @error('major')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="mb-3 flex">
                                <label class="me-10" for="tag">Specialization</label>
                                <div id="container_tags" class="flex flex-col">
                                    <select id="specialities" name="specialities[]"
                                        class="border rounded p-2 bg-gray-300 mr-4 mb-4">
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

                            <div class="flex justify-center content-center items-center">
                                <label class="me-20" for="contact">Contact</label>
                                <input type="text" id="email"
                                    class="mb-4 text-xl w-full p-2.5 rounded-none border-b border-black" name="contact"
                                    value="{{ $dosens->contact }}" required>
                                @error('contact')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <button type="submit"
                class="mt-6 w-auto auto-width border-2 border-green-900 hover:bg-green-900 text-green-900 hover:text-white py-2 px-4 hover:border-transparent rounded"
                style="font-size: 15px;">Save Changes
            </button>
        </div>
    </form>
    @stack('script')
@endsection
<script>
    function addDropdown() {
        console.log("tes");
        var dropdowns = document.querySelectorAll("#container_tags select");
        if (dropdowns.length < 3) {
            // document.getElementById("warning_tags").style.display = "none";
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
            // document.getElementById("warning_tags").style.display = "none";
            var lastDropdown = dropdowns[dropdowns.length - 1];
            lastDropdown.parentNode.removeChild(lastDropdown);
        }
    }
</script>
