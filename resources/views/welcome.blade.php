<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>si-OBE | Outcome Based Education</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/61cc44f0a1.js" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="leading-normal tracking-normal text-indigo-400 m-6 bg-cover bg-fixed">
<div class="h-full">
    <!--Nav-->
    <div class="w-full container mx-auto">
        <div class="w-full flex items-center justify-between">
            <a class="flex items-center text-indigo-400 no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
               href="#">
                <x-application-logo class="block h-8 pr-2 w-auto fill-current" />
                si-<span class="bg-clip-text text-transparent bg-gradient-to-r from-green-400 via-pink-500 to-purple-500">OBE</span>
            </a>

            <div class="flex w-1/2 justify-end content-center">
                <a href="/login"
                   class="inline-block text-blue-300 no-underline hover:text-pink-500 hover:text-underline text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out">
                    Login <i class="fa-solid fa-arrow-right-to-bracket"></i>
                </a>
            </div>
        </div>
    </div>

    <!--Main-->
    <div class="container pt-24 md:pt-36 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
            <h1 class="my-4 text-3xl md:text-5xl text-white opacity-75 font-bold leading-tight text-center md:text-left">
                Selamat datang di si-OBE
            </h1>
            <p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left">
                Aplikasi manajemen nilai berbasis Outcome Based Education
            </p>

            <a href="/register" class="btn btn-accent space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Daftar Sekarang</span>
            </a>
        </div>

        <!--Right Col-->
        <div class="w-full xl:w-3/5 p-12 overflow-hidden">
            <img
                class="mx-auto w-full md:w-4/5 transform -rotate-6 transition hover:scale-105 duration-700 ease-in-out hover:rotate-6"
                src="{{ asset('img/blank_app.svg') }}">
        </div>

    </div>
</div>


</body>
</html>
