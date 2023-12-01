@extends('admin.dashboard.layouts')

@section('content')
    <div class="container mx-auto p-4">

        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white border border-gray-300 md:rounded-lg">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-sm md:text-base" style="color: #025E5A;">Project Name</th>
                        <th class="px-4 py-2 text-sm md:text-base" style="color: #025E5A;">Category</th>
                        <th class="px-4 py-2 text-sm md:text-base" style="color: #025E5A;">Lecturer</th>
                        <th class="px-4 py-2 text-sm md:text-base" style="color: #025E5A;">Upload Date</th>
                        <th class="px-4 py-2 text-sm md:text-base" style="color: #025E5A;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $counter = 0;
                    ?>
                    @foreach ($datas as $data)
                        <tr>
                            <td class="px-4 py-2 border text-sm md:text-base">{{ $data->tittle }}</td>
                            <td class="px-4 py-2 border text-sm md:text-base">
                                @foreach ($arrayTags[$counter] as $item)
                                    <?php
                                    $url_image = '';
                                    if ($item['tag'] == 'Intelligent Gaming') {
                                        $url_image = 'asset/icon_green/game.png';
                                    } elseif ($item['tag'] == 'Software Engineering') {
                                        $url_image = 'asset/icon_green/softw.png';
                                    } elseif ($item['tag'] == 'Data Science') {
                                        $url_image = 'asset/icon_green/data sc.png';
                                    } elseif ($item['tag'] == 'System Security and Cybersecurity') {
                                        $url_image = 'asset/icon_green/cyber.png';
                                    } elseif ($item['tag'] == 'Mobile and Responsive App Development') {
                                        $url_image = 'asset/icon_green/mobile.png';
                                    } elseif ($item['tag'] == 'Blockchain Technology and Digital Finance') {
                                        $url_image = 'asset/icon_green/blokch.png';
                                    } elseif ($item['tag'] == 'Artificial Intelligence and Natural Language Processing') {
                                        $url_image = 'asset/icon_green/ai.png';
                                    } elseif ($item['tag'] == 'IoT') {
                                        $url_image = 'asset/icon_green/iot.png';
                                    }
                                    ?>
                                    <img src="{{ asset($url_image) }}" alt=""
                                        style="width: 50px; height: 50px; display: inline; margin-right: 30px;">
                                @endforeach
                                <?php
                                $counter += 1;
                                ?>
                            </td>
                            <td class="px-4 py-2 border text-sm md:text-base">{{ $data->name }}</td>
                            <td class="px-4 py-2 border text-sm md:text-base">{{ $data->created_at }}</< /td>
                            <td class="px-4 py-2 border text-sm md:text-base">
                                <form action="{{ route('proyek.hapus_projek', $data->id) }}" method="post">
                                    @csrf
                                    @method('GET')
                                    <div class="flex flex-row justify-center space-x-4">

                                        <button
                                            class="border-2 border-black px-4 py-2 hover:border-gray-700 rounded flex items-center space-x-4">
                                            <img class="mr-4" src="{{ asset('asset/button/like.png') }}" alt="">
                                            Like
                                        </button>

                                        <button
                                            class="border-2 border-black px-4 py-2 hover:border-gray-700 rounded flex items-center space-x-4">
                                            <img class="mr-4" src="{{ asset('asset/button/comment.png') }}"
                                                alt="">
                                            Comment
                                        </button>

                                        <button
                                            class="border-2 border-black px-4 py-2 hover:border-gray-700 rounded flex items-center space-x-4">
                                            <img class="mr-4" src="{{ asset('asset/button/share.png') }}" alt="">
                                            Share
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
