@extends('admin.dashboard.layouts')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif

    <div class="flex-row flex p-4">
        {{-- <button
            class="bg-transparent hover:bg-green-600 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mr-3"
            style="border: 4px solid#025E5A; color: #025E5A; border-radius: 5px;">Admin</button>
        <button
            class="bg-transparent hover:bg-green-600 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mr-3"
            style="border: 4px solid#025E5A; color: #025E5A; border-radius: 5px;">Lecturer</button> --}}
        <button type="button" onclick="window.location.href='{{ route('admin.account.create') }}'"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-auto">+ Add New
            Account</button>

    </div>

    <div class="container mx-auto p-4">

        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white border border-gray-300 md:rounded-lg">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-sm md:text-base" style="color: #025E5A;">Role</th>
                        <th class="px-4 py-2 text-sm md:text-base" style="color: #025E5A;">Email</th>
                        <th class="px-4 py-2 text-sm md:text-base" style="color: #025E5A;">Status</th>
                        <th class="px-4 py-2 text-sm md:text-base" style="color: #025E5A;">Last Login</th>
                        <th class="px-4 py-2 text-sm md:text-base" style="color: #025E5A;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($users) && count($users) > 0)
                        @foreach ($users as $data)
                            <tr>
                                <td class="px-4 py-2 border text-sm md:text-base">{{ $data->role }}
                                </td>
                                <td class="px-4 py-2 border text-sm md:text-base">{{ $data->email }}</td>
                                <td class="px-4 py-2 border text-sm md:text-base">-</td>
                                <td class="px-4 py-2 border text-sm md:text-base">last login</td>
                                <td class="py-2 border text-sm md:text-base">
                                    <div class="flex col justify-center">
                                        <button
                                            onclick="window.location.href='{{ route('admin.account.update', $data->id) }}'"
                                            class="mr-4 border-2 bg-yellow-500 px-4 py-2 hover:bg-yellow-700 rounded flex items-center space-x-4 text-white font-bold">
                                            <img class="mr-2" src="{{ asset('asset/button/edit.png') }}" alt="">
                                            edit
                                        </button>

                                        <button
                                            class="border-2 bg-red-500 px-4 py-2 hover:bg-red-700 rounded flex items-center space-x-4 text-white font-bold"
                                            onclick="openModal()">
                                            <img class="mr-2" src="{{ asset('asset/button/delete.png') }}" alt="">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <h5 class="font-bold text-xl mb-4">Delete Project</h5>
            <hr class="border-1 border-slate-950 mb-12">
            <p class="mb-10 font-bold">Are you sure want to delete this project ?</p>
            <div class="flex col">
                <button class="mr-8 rounded flex bg-red-500 px-4 py-2 hover:bg-red-700 text-white " type="button"
                    onclick="window.location.href='{{ route('admin.account.delete', $data->id) }}'"
                    class="confirm-button"><img class="mr-4" src="{{ asset('asset/button/delete.png') }}"
                        alt="">Yes,
                    delete project</button>
                <button class="rounded flex bg-green-500 px-4 py-2 hover:green-red-700 text-white " type="button"
                    class="cancel-button" onclick="closeModal()">No, keep project </button>
            </div>
        </div>
    </div>
@else
    <tr>
        <td colspan="5" class="text-center px-4 py-2 border text-sm md:text-base">There's no user registered now.</td>
    </tr>
    @endif

    @stack('script')
@endsection

<script>
    // Fungsi untuk membuka modal
    function openModal() {
        var modal = document.getElementById('deleteModal');
        modal.style.display = 'flex';
        console.log("berhasil");
    }

    // Fungsi untuk menutup modal
    function closeModal() {
        var modal = document.getElementById('deleteModal');
        modal.style.display = 'none';
    }

    // Fungsi untuk menghapus data (gantilah dengan logika penghapusan data yang sesuai)
    function deleteData() {
        alert('Data berhasil dihapus!');
        closeModal();
    }
</script>
