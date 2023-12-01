@extends('admin.dashboard.layouts')

@section('content')
    <div class="container" style="padding: 4rem;">
        <!-- Container untuk dua card -->
        <div class="flex lg:flex-row sm:flex-col sm:justify-center ">
            <!-- img -->
            <div class="card drop-shadow p-2 rounded-xl shadow-md" style=" background-color: #FBFFFC;">
                <img style=" width:350px; height: 350px;"
                    src="{{ asset('storage/photos/profile_view/' . $dosens->image_profile) }}" alt="Cat Image">
            </div>

            <!-- Card-->
            <div class="card w-1/2 flex p-6 drop-shadow shadow-md px-20"
                style="margin-left: 50px; width: 100%; height: 100%; border-radius: 15px; background-color: #FBFFFC;">

                <div class="" style="font-size: 20px;">
                    <h1 class="text-1xl font-bold mb-6">Name</h1>
                    <h1 class="text-1xl font-bold mb-6">Major</h1>
                    <h1 class="text-1xl font-bold mb-6">Specialities</h1>
                    <h1 class="text-1xl font-bold mb-6">Number of Projects</h1>
                    <h1 class="text-1xl font-bold mb-6">Email</h1>
                    <h1 class="text-1xl font-bold mb-6">Contact</h1>
                    <a class="flex align-self-end" href="{{ route('admin.dashboard.member.edit', $dosens->id) }}"><button
                            class="border-2 border-green-900 hover:bg-green-900 text-green-900 hover:text-white py-2 px-4 hover:border-transparent rounded"
                            style="font-size: 15px;">
                            Edit Profiles
                        </button>
                    </a>
                </div>

                <div class="" style="margin-left: 100px; font-size: 20px;">
                    <h1 class=" mb-6 border-b-2 w-full">{{ $dosens->name }}</h1>
                    <h1 class=" mb-6 border-b-2 w-full">{{ $dosens->major }}</h1>
                    <h1 class=" mb-6 border-b-2 w-full">
                        <?php $counter = 0; ?>
                        @foreach ($specialities as $speciality)
                            {{ $speciality->speciality }}
                            <?php $counter += 1;
                            if ($counter < count($specialities)) {
                                echo ', ';
                            } ?>
                        @endforeach
                    </h1>

                    <h1 class=" mb-6 border-b-2 w-full"> {{ $projectCount }}</h1>
                    <h1 class=" mb-6 border-b-2 w-full">{{ $emails->email }} </h1>
                    <h1 class=" mb-6 border-b-2 w-full">{{ $dosens->contact }} </h1>
                </div>

            </div>
        </div>


        <div class="flex mt-6 items-center">
            <h1 class="text-1xl font-bold" style="color: #025E5A;">Students And Projects</h1>
        </div>
        <div class="flex flex-row justify-center overflow-x-auto space-x-5" style="padding: 10px;">

            <a href=""><button
                    class="border-4 border-green-900 hover:bg-green-900 text-green-900 hover:text-white py-2 px-4 hover:border-transparent rounded font-bold"
                    style="font-size: 15px;">
                    2019
                </button>
            </a>

            <a href=""><button
                    class="border-4 border-green-900 hover:bg-green-900 text-green-900 hover:text-white py-2 px-4 hover:border-transparent rounded font-bold"
                    style="font-size: 15px;">
                    2020
                </button>
            </a>

            <a href=""><button
                    class="border-4 border-green-900 hover:bg-green-900 text-green-900 hover:text-white py-2 px-4 hover:border-transparent rounded font-bold"
                    style="font-size: 15px;">
                    2021
                </button>
            </a>

            <a href=""><button
                    class="border-4 border-green-900 hover:bg-green-900 text-green-900 hover:text-white py-2 px-4 hover:border-transparent rounded font-bold"
                    style="font-size: 15px;">
                    2022
                </button>
            </a>

            <a href=""><button
                    class="border-4 border-green-900 hover:bg-green-900 text-green-900 hover:text-white py-2 px-4 hover:border-transparent rounded font-bold"
                    style="font-size: 15px;">
                    2023
                </button>
            </a>

            {{-- <button
                class="year-button bg-transparent hover:bg-blue-500 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mr-3"
                data-year="2020" style="border: 4px solid #025E5A; color: #025E5A; border-radius: 5px;">
                2020
            </button>
            <button
                class="year-button bg-transparent hover:bg-blue-500 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mr-3"
                data-year="2019" style="border: 4px solid #025E5A; color: #025E5A; border-radius: 5px;">
                2021
            </button>

            <button
                class="year-button bg-transparent hover:bg-blue-500 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mr-3"
                data-year="2020" style="border: 4px solid #025E5A; color: #025E5A; border-radius: 5px;">
                2022
            </button>
            <button
                class="year-button bg-transparent hover:bg-blue-500 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mr-3"
                data-year="2020" style="border: 4px solid #025E5A; color: #025E5A; border-radius: 5px;">
                2023
            </button> --}}

        </div>


        <div class="container mx-auto p-4">

            <div class="overflow-x-auto">
                <table class="table-auto w-full bg-white border border-gray-300 md:rounded-lg">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-4 py-2" style="color: #025E5A;">Student</th>
                            <th class="px-4 py-2" style="color: #025E5A;">Project</th>
                            <th class="px-4 py-2" style="color: #025E5A;">Category</th>
                            <th class="px-4 py-2" style="color: #025E5A;">Upload Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $counter = 0; ?>
                        @foreach ($contents as $content)
                            <tr>
                                <td class="px-4 py-2 border">
                                    <p>{{ $content->owner }}</p>
                                </td>
                                <td class="px-4 py-2 border">{{ $content->tittle }}</td>
                                <td class=" py-2 border">
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
                                <td class="px-4 py-2 border">{{ $content->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endsection
