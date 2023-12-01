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

    <div class="container mx-auto p-4">
        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white border border-gray-300 md:rounded-lg">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2" style="color: #025E5A;">Student</th>
                        <th class="px-4 py-2" style="color: #025E5A;">Project</th>
                        <th class="px-4 py-2" style="color: #025E5A;">Category</th>
                        <th class="px-4 py-2" style="color: #025E5A;">Lecturer</th>
                        <th class="px-4 py-2" style="color: #025E5A;">Action</th>
                    </tr>
                </thead>

                <tbody class="">
                    <?php $counter = 0; ?>
                    @foreach ($contents as $content)
                        <tr>
                            <td class="px-4 py-2 border">
                                <p>{{ $content->owner }}</p>
                            </td>
                            <td class="px-4 py-2 border">{{ $content->tittle }}</td>
                            <td class="px-4 py-2 border">
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
                            <td class="px-4 py-2 border">{{ $content->name }}</td>
                            <td>
                                <form action="{{ route('proyek.hapus_projek', $content->id) }}" method="GET">
                                    @csrf
                                    <div class="flex justify-center">
                                        <button type="button"
                                            onclick="window.location.href='{{ route('admin.porto.update', $content->id) }}'"
                                            class="mr-6 border-2 bg-yellow-500 px-4 py-2 hover:bg-yellow-700 rounded flex items-center space-x-4 text-white font-bold">
                                            <img class="mr-4" src="{{ asset('asset/button/edit.png') }}" alt="">
                                            edit
                                        </button>

                                        <button type="submit"
                                            class="border-2 bg-red-500 px-4 py-2 hover:bg-red-700 rounded flex items-center space-x-4 text-white font-bold">
                                            <img class="mr-4" src="{{ asset('asset/button/delete.png') }}" alt="">
                                            Delete
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
