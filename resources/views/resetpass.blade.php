<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Reset Password</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-poppins">
    <div class="bg-cover bg-center h-screen" style="background-image: url('{{ asset('assets/Forgot Password.png') }}');">
    <div class="h-screen w-screen">
        <div class="flex flex-row p-8">
            <div class="flex justify-center items-center w-1/2">
                <img src="{{asset('assets/resetpass 1.svg')}}" class="scale-[80%]">
            </div>
            <div class="flex flex-col justify-start mt-20 w-1/2">
                <div class="flex flex-col justify-start space-y-4">
                    <h1 class="flex font-bold text-5xl text-[#025E5A]">Reset Password</h1>
                </div>
                <div class="flex flex-col justify-start mt-12">
                    <p class="font-semibold text-lg">Enter your new password</p>
                    <div class="mt-4">
                        <input type="password" name="password" id="password" placeholder="Enter new password" class="w-1/2 p-2 border border-gray-300 rounded" required>
                    </div> 
                </div>
                <div class="flex flex-col justify-start mt-6">
                    <p class="font-semibold text-lg">Confirm new password</p>
                    <div class="mt-4">
                        <input type="password" name="password" id="password" placeholder="Confirm new password" class="w-1/2 p-2 border border-gray-300 rounded" required>
                    </div> 
                </div>
                <div class="flex flex-col justify-start mt-10">
                    <p class="font-semibold text-lg">To continue, type the characters you see in the picture</p>
                    <div class="w-3/5">
                        <div class="bg-white rounded-md shadow-md p-4">
                           <div class="flex items-center justify-between mb-4">
                                <div class="bg-gray-100 p-2 rounded-md w-4/5">
                                    <img src="{{asset('assets/captcha.png')}}">
                                </div>
                                <div class="flex group items-center bg-gray-100 mr-2">
                                    <button class="p-4 rounded-md group-hover:bg-gray-200">
                                        <img src="{{asset('assets/Reload.svg')}}" class="scale-[120%]">
                                    </button>
                                </div>
                           </div>
                           <div class="flex items-center justify-between">
                             <input type="text" name="captcha" id="captcha" placeholder="Enter the text you see on the image" class="border-2 border-gray-200 p-2 rounded-md w-full">
                             <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md ml-4">Submit</button>
                           </div>
                        </div>
                       </div>
                </div>
                <div class="flex group justify-start mt-8">
                    <button type="submit" class="w-fit bg-[#025E5A] text-white font-semibold py-2 px-6 rounded-full group-hover:bg-[#2D918C]">Next</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
