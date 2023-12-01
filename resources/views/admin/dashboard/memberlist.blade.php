@extends('admin.dashboard.layouts')

@section('content')
    <div class="container mx-auto p-4">

        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white border border-gray-300 md:rounded-lg">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2" style="color: #025E5A;">Lecturer</th>
                        <th class="px-4 py-2" style="color: #025E5A;">Specialities</th>
                        <th class="px-4 py-2" style="color: #025E5A;">Number of Projects</th>
                        <th class="px-4 py-2" style="color: #025E5A;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 0;
                    ?>
                    @foreach ($dosens as $data)
                        <tr>
                            <td class="px-4 py-2 border align-middle">
                                <img class="mb-3 align-middle"
                                    src="{{ asset('storage/photos/icon/' . $data->image_profile) }}" alt="">
                                <p class="align-middle"> {{ $data->name }}</p>
                            </td>
                            <td class="px-4 py-2 border">
                                @foreach ($arraySpecialities[$counter] as $speciality)
                                    <?php
                                    $url_image = '';
                                    if ($speciality == 'Intelligent Gaming') {
                                        $url_image = 'asset/icon_green/gaming.png';
                                    } elseif ($speciality == 'Software Engineering') {
                                        $url_image = 'asset/icon_green/softw.png';
                                    } elseif ($speciality == 'Data Science') {
                                        $url_image = 'asset/icon_green/data sc.png';
                                    } elseif ($speciality == 'System Security and Cybersecurity') {
                                        $url_image = 'asset/icon_green/cyber.png';
                                    } elseif ($speciality == 'Mobile and Responsive App Development') {
                                        $url_image = 'asset/icon_green/mobile.png';
                                    } elseif ($speciality == 'Blockchain Technology and Digital Finance') {
                                        $url_image = 'asset/icon_green/blokch.png';
                                    } elseif ($speciality == 'Artificial Intelligence and Natural Language Processing') {
                                        $url_image = 'asset/icon_green/ai.png';
                                    } elseif ($speciality == 'IoT') {
                                        $url_image = 'asset/icon_green/iot.png';
                                    }
                                    ?>
                                    <img src="{{ asset($url_image) }}" alt=""
                                        style="width: 50px; height: 50px; display: inline; margin-right: 30px;">
                                @endforeach
                            </td>
                            <td class="px-4 py-2 border">{{ $projectCount[$counter] }}</td>
                            <?php $counter++;
                            ?>
                            <td class="px-4 py-2 border text-center">
                                <div class="flex items-center justify-center">
                                    <a href="{{ route('admin.dashboard.member.detail', $data->id) }}"><button
                                            class="border-2 border-green-900 hover:bg-green-900 text-black hover:text-white py-2 px-4 hover:border-transparent rounded"
                                            style="font-size: 15px;">
                                            View Details
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
