@extends('admin.dashboard.layouts')

@section('content')
    {{-- <div class=" flex justify-center ">
        <div class="p-8 rounded-lg">
            <div class="mt-1 flex items-center">
                <!-- Input Foto -->
                <input type="file" id="profile-picture" name="profile-picture" class="sr-only">
                <label for="profile-picture" class="cursor-pointer">
                    <div class="relative">
                        <!-- Gambar Tampilan Awal -->
                        <img id="preview" src="https://via.placeholder.com/150" alt="Preview"
                            class="h-50 w-50 rounded-full object-cover">

                        <!-- Tanda Icon Ganti Foto -->
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 rounded-full hidden"
                            id="icon">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                                </path>
                            </svg>
                        </div>
                    </div>
                </label>
            </div>
        </div>
    </div>
 --}}

    <div class="p-8">
        <form action="{{ route('admin.account.store') }}" method="POST" class="flex" enctype="multipart/form-data">
            @csrf
            <div class="w-full card bg-slate-100 p-4">
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="Username"
                            class="block mb-2 text-1xl text-black dark:text-black font-bold">Username</label>
                        <input type="text" id="Username" class=" text-sm w-full p-2.5 rounded"
                            name="username" placeholder="Administrator" required>
                        @error('username')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="firstname"
                            class="block mb-2 text-1xl text-black dark:text-black font-bold">First
                            Name</label>
                        <input type="text" id="firstname" class=" text-sm w-full p-2.5 rounded"
                            name="first_name" placeholder="Henry" required>
                        @error('first_name')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="email"
                            class="block mb-2 text-1xl text-black dark:text-black font-bold">Email</label>
                        <input type="email" id="Username" class=" text-sm w-full p-2.5 rounded"
                            name="email" placeholder="henrycavill@gmail.com" required>
                        @error('email')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="lastname"
                            class="block mb-2 text-1xl text-black dark:text-black font-bold">Last
                            Name</label>
                        <input type="text" id="lastname" class=" text-sm w-full p-2.5 rounded"
                            name="last_name" placeholder="Cavill" required>
                        @error('last_name')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-1xl text-black dark:text-black font-bold">Password</label>
                        <input type="password" id="password" class=" text-sm w-full p-2.5 rounded"
                            name="password" placeholder="********" required>
                        @error('password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="Username"
                            class="block mb-2 text-1xl text-black dark:text-black font-bold">Role</label>
                        <select id="role" name="role" class="w-full border rounded p-2">
                            <option value="Admin">Admin</option>
                            <option value="Dosen">Dosen</option>
                        </select>

                    </div>
                    <div>

                        <label for="Username"
                            class="block mb-2 text-1xl text-black dark:text-black font-bold">Confirm
                            Password</label>
                        <input type="password" name="confirm_password" id="confirm_password"
                            class=" text-sm w-full p-2.5 rounded bg-gray-300" placeholder="********" required>
                        @error('confirm_password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit"
                    class="mr-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save
                    Changes</button>
            </div>
    </div>
    </form>
@endsection
