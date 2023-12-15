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

    @if (session('success'))
        <div class="ms-6 text-gray-500 font-bold mt-8 text-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mx-auto py-4 px-6">
        <div class="overflow-x-auto shadow-md shadow-slate-500 rounded-xl">
            <table class="table-auto w-full bg-white border border-gray-300">
                <thead class="bg-white rounded-2xl">
                    <tr>
                        <th class="px-4 py-4" style="color: #025E5A;">Student</th>
                        <th class="px-4 py-4" style="color: #025E5A;">Project</th>
                        <th class="px-4 py-4" style="color: #025E5A;">Category</th>
                        <th class="px-8 py-4" style="color: #025E5A;">Lecturer</th>
                        <th class="px-4 py-4" style="color: #025E5A;">Action</th>
                    </tr>
                </thead>

                <tbody class="">
                    <?php $counter = 0; ?>
                    @if ($contents->isNotEmpty())
                        @foreach ($contents as $content)
                            <tr class="py-4">
                                <td class="px-4 py-2 border">
                                    <p>{{ $content->owner }}</p>
                                </td>
                                <td class="px-4 py-2 border">{{ $content->tittle }}</td>
                                <td class="px-12 py-4 border">
                                    <div class="flex justify-center space-x-8">
                                        @foreach ($arrayCategories[$counter] as $dataTags)
                                            <?php
                                            $url_image = '';
                                            if ($dataTags == 'Intelligent Gaming') {
                                                $url_image = 'asset/icon_green/game.png';
                                            } elseif ($dataTags == 'Software Engineering') {
                                                $url_image = 'asset/icon_green/softw.png';
                                            } elseif ($dataTags == 'Data Science') {
                                                $url_image = 'asset/icon_green/data sc.png';
                                            } elseif ($dataTags == 'System Security and Cybersecurity') {
                                                $url_image = 'asset/icon_green/cyber.png';
                                            } elseif ($dataTags == 'Mobile and Responsive App Development') {
                                                $url_image = 'asset/icon_green/mobile.png';
                                            } elseif ($dataTags == 'Blockchain Technology and Digital Finance') {
                                                $url_image = 'asset/icon_green/blokch.png';
                                            } elseif ($dataTags == 'Artificial Intelligence and Natural Language Processing') {
                                                $url_image = 'asset/icon_green/ai.png';
                                            } elseif ($dataTags == 'IoT') {
                                                $url_image = 'asset/icon_green/iot.png';
                                            }
                                            ?>
                                            <img src="{{ asset($url_image) }}" alt=""
                                                style="width: 50px; height: 50px; display: inline;">
                                        @endforeach
                                    </div>
                                </td>
                                <?php $counter += 1; ?>
                                <td class="w-fit p-12 py-2 border">{{ $content->name }}</td>
                                <td class="px-12 py-4">

                                    <div class="flex justify-center">
                                        <button type="button"
                                            onclick="window.location.href='{{ route('admin.porto.update', $content->id) }}'"
                                            class="mr-6 bg-yellow-500 px-4 py-2 hover:bg-yellow-700 rounded-lg flex items-center space-x-4 text-white font-bold shadow-md shadow-slate-500">
                                            <img class="mr-4" src="{{ asset('asset/button/edit.png') }}" alt="">
                                            edit
                                        </button>

                                        <button type="button"
                                            class=" bg-red-500 px-4 py-2 hover:bg-red-700 rounded-lg flex items-center space-x-4 text-white font-bold shadow-md shadow-slate-500"
                                            onclick="openModal()">
                                            <img class="mr-4" src="{{ asset('asset/button/delete.png') }}" alt="">
                                            Delete
                                        </button>
                                    </div>

                                </td>
                            </tr>
                            <div id="deleteModal" class="modal transition-all">
                                <div class="modal-content">
                                    <h5 class="font-bold text-xl mb-4">Delete Project</h5>
                                    <hr class="border-1 border-slate-950 mb-12">
                                    <p class="mb-10 font-bold">Are you sure want to delete this project ?</p>
                                    <div class="flex col">
                                        <button class="mr-8 rounded flex bg-red-500 px-4 py-2 hover:bg-red-700 text-white "
                                            type="button"
                                            onclick="window.location.href='{{ route('admin.porto.delete', $content->id) }}'"
                                            class="confirm-button"><img class="mr-4"
                                                src="{{ asset('asset/button/delete.png') }}" alt="">Yes,
                                            delete project</button>
                                        <button class="rounded flex bg-green-500 px-4 py-2 hover:green-red-700 text-white "
                                            type="button" class="cancel-button" onclick="closeModal()">No, keep project
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <tr class="py-4">
                            <td class="px-8 py-4 border">
                                <p> Theres no portofolio data now</p>
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>


        <div class="flex justify-center mt-4">
            {{ $contents->links() }}
        </div>

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
