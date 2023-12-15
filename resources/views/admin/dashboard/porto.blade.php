@extends('admin.dashboard.layouts')

@section('content')
    <div class="container mx-auto p-4 px-8">

        <div class="overflow-x-auto shadow-md shadow-slate-500 rounded-xl">
            <table class="table-auto w-full bg-white border md:rounded-lg">
                <thead class="bg-white">
                    <tr>
                        <th class="px-4 py-4 text-sm md:text-base" style="color: #025E5A;">Project Name</th>
                        <th class="px-12 py-4 text-sm md:text-base" style="color: #025E5A;">Category</th>
                        <th class="px-4 py-4 text-sm md:text-base" style="color: #025E5A;">Lecturer</th>
                        <th class="px-4 py-4 text-sm md:text-base" style="color: #025E5A;">Upload Date</th>
                        <th class="px-4 py-4 text-sm md:text-base" style="color: #025E5A;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $counter = 0;
                    ?>
                    @if ($datas->isNotEmpty())
                        @foreach ($datas as $data)
                            <tr>
                                <td class="px-4 py-2 border text-sm md:text-base">{{ $data->tittle }}</td>
                                <td class="flex px-4 py-2 border text-sm md:text-base justify-center items-center">
                                    <div class="px-6 flex justify-center space-x-5">
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
                                                style="width: 50px; height: 50px;">
                                        @endforeach
                                        <?php
                                        $counter += 1;
                                        ?>
                                    </div>
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
                                                <img class="mr-4" src="{{ asset('asset/button/like.png') }}"
                                                    alt="">
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
                                                <img class="mr-4" src="{{ asset('asset/button/share.png') }}"
                                                    alt="">
                                                Share
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
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
    </div>
    <div class="flex justify-center mt-4 mb-6">
        {{ $datas->links() }}
    </div>
@endsection
