<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Page Under Maintenance</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-poppins">
    <div class="bg-cover bg-center h-screen" style="background-image: url('{{ asset('img/Maintenance.png') }}');">
        <div class="h-screen w-screen">
            <div class="flex flex-row p-8">
                <div class="flex justify-center items-center w-1/2">
                    <img src="{{asset('assets/maintenance.svg')}}" class="scale-[80%]">
                </div>
                <div class="flex flex-col justify-start w-1/2 mt-56 space-y-8">
                    <h1 class="font-bold text-8xl ml-28 text-[#025E5A]">Oops!</h1>
                    <div class="flex flex-col justify-start w-1/2 ml-28 space-y-2">
                        <h3 class="font-bold text-3xl text-[#025E5A]">This Page is Still</h3>
                        <h3 class="font-bold text-3xl text-[#025E5A]">Under Maintenance</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>