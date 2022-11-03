<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200">
                    <div class="flex space-x-6">
                        <div class="md:ml-16">
                            <div class="rounded-md h-16 p-2 w-72 bg-[#AFC7F5]  ">
                                <div class="flex text-center items-center  ">
                                    <div class="gb ">
                                        <img class="" src="{{ asset('img/Gambar Fakultas.png') }}" alt="">
                                    </div>
                                    <h2 class="ml-3 text-xl text-black">All Faculties</h2>
                                </div>
                            </div>
                            <div class="mt-5 rounded-md h-16 p-2 w-72 bg-[#AFC7F5]  ">
                                <div class="flex text-center items-center  ">
                                    <div class="gb ">
                                        <img class="ml-2 w-10" src="{{ asset('img/Gambar Department.png') }}"
                                            alt="">
                                    </div>
                                    <h2 class="ml-6 text-xl text-black">All Departements</h2>
                                </div>
                            </div>
                            <div class="mt-5 rounded-md h-16 p-2 w-72 bg-[#AFC7F5]  ">
                                <div class="flex text-center items-center  ">
                                    <div class="gb ">
                                        <img class="" src="{{ asset('img/Gambar Program Studi.png') }}" alt="">
                                    </div>
                                    <h2 class="ml-3 text-xl text-black">All Study program</h2>
                                </div>
                            </div>
                        </div>
                        <div class="relative border-2 border-blue-400">
                            <div class=" w-[72] px-10 rounded-sm bg-[#AFC7F5]">
                                <div class="flex py-2 ">
                                    <img src="{{ asset('img/Vector.png') }}" alt="">
                                    <h1 class="text-xl text-left ml-2 text-black ">Course Classes</h1>
                                </div>

                            </div>
                            <div class="   ">
                                <div class="flex p-5">

                                    <div class="w-72 h-60  bg-[#6F727A] shadow-xl">
                                        <figure><img class="h-full" src="{{ asset('img/GambarCourse 1.png') }}"
                                                alt="Shoes" /></figure>
                                        <div class="card-body">
                                            <div class="text-white">
                                                <div class="flex">
                                                    <h2 class="text-md  pr-5">Pemrograman Basis Data</h2>
                                                    <h1 class="text-2xl">...</h1>
                                                </div>
                                                <p class="text-sm">Teknologi Informasi - B</p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="w-72 h-60 ml-5 bg-[#6F727A] shadow-xl">
                                        <figure><img class="h-full" src="{{ asset('img/GambarCourse 1.png') }}"
                                                alt="Shoes" /></figure>
                                        <div class="card-body">
                                            <div class="text-white">
                                                <div class="flex">
                                                    <h2 class="text-md  pr-5">Pemrograman Basis Data</h2>
                                                    <h1 class="text-2xl">...</h1>
                                                </div>
                                                <p class="text-sm">Teknologi Informasi - B</p>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="flex p-5">

                                    <div class="w-72 h-60  bg-[#6F727A] shadow-xl">
                                        <figure><img class="h-full" src="{{ asset('img/GambarCourse 1.png') }}"
                                                alt="Shoes" /></figure>
                                        <div class="card-body">
                                            <div class="text-white">
                                                <div class="flex">
                                                    <h2 class="text-md  pr-5">Pemrograman Basis Data</h2>
                                                    <h1 class="text-2xl">...</h1>
                                                </div>
                                                <p class="text-sm">Teknologi Informasi - B</p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="w-72 h-60 ml-5 bg-[#6F727A] shadow-xl">
                                        <figure><img class="h-full" src="{{ asset('img/GambarCourse 1.png') }}"
                                                alt="Shoes" /></figure>
                                        <div class="card-body">
                                            <div class="text-white">
                                                <div class="flex">
                                                    <h2 class="text-md  pr-5">Pemrograman Basis Data</h2>
                                                    <h1 class="text-2xl">...</h1>
                                                </div>
                                                <p class="text-sm">Teknologi Informasi - B</p>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="text-right justify-end items-end flex mr-5 pb-5 mt-10 ">
                                    <div class="flex ">
                                        <h1 class="text-black py-1">Show</h1>
                                        <select class="ml-5 py-1" name="" id="1">

                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="md:ml-">
                            <div class="rounded-md p-2 w-72 bg-[#AFC7F5]  ">
                                <div class="flex">
                                    <img class="h-full" src="{{ asset('img/Assign.png') }}" alt="" />
                                    <h1 class="ml-2 text-black">My Courses</h1>
                                </div>

                            </div>
                            <div class="p-5 rounded-md mt-3  w-72 bg-[#AFC7F5] space-y-3  ">
                                <div class="flex">
                                    <img class="" src="{{ asset('img/frames.png') }}" alt="">
                                   <h1 class="ml-5 text-black">Matkul 1</h1>
                                </div>
                                <div class="flex">
                                    <img class="" src="{{ asset('img/frames.png') }}" alt="">
                                   <h1 class="ml-5 text-black">Matkul 2</h1>
                                </div>
                                <div class="flex">
                                    <img class="" src="{{ asset('img/frames.png') }}" alt="">
                                   <h1 class="ml-5 text-black">Matkul 3</h1>
                                </div>
                                <div class="flex">
                                    <img class="" src="{{ asset('img/frames.png') }}" alt="">
                                   <h1 class="ml-5 text-black">Matkul 4</h1>
                                </div>
                                <div class="flex">
                                    <img class="" src="{{ asset('img/frames.png') }}" alt="">
                                   <h1 class="ml-5 text-black">Matkul 5</h1>
                                </div>
                                <div class="flex">
                                    <img class="" src="{{ asset('img/frames.png') }}" alt="">
                                   <h1 class="ml-5 text-black">Matkul 6</h1>
                                </div>
                                <div class="flex">
                                    <img class="" src="{{ asset('img/frames.png') }}" alt="">
                                   <h1 class="ml-5 text-black">Matkul 7</h1>
                                </div>
                                <div class="flex">
                                   <img class="" src="{{ asset('img/frames.png') }}" alt="">
                                   <h1 class="ml-5 text-black">Matkul 8</h1>
                                </div>
                                <h1 class="pt-4">All Courses...</h1>

                            </div>
                            <div class="rounded-md mt-10 p-2 w-72 bg-[#AFC7F5]  ">
                                <div class="flex">
                                    <img class="h-full" src="{{ asset('img/Assign.png') }}" alt="" />
                                    <h1 class="ml-2 text-black">My Courses</h1>
                                </div>

                            </div>
                            <div class="p-3 rounded-md mt-3  w-72 border-2 border-blue-400 space-y-3  ">
                                <div class="flex">
                                   <img src="{{ asset('img/Vector(1).png') }}" alt="">
                                   <h1 class="ml-5 text-black">Tugas 1 - Matkul 1</h1>
                                </div>
                                <div class="flex">
                                   <img src="{{ asset('img/Vector(1).png') }}" alt="">
                                   <h1 class="ml-5 text-black">Tugas 2 - Matkul 2</h1>
                                </div>
                                <div class="flex">
                                   <img src="{{ asset('img/Vector(1).png') }}" alt="">
                                   <h1 class="ml-5 text-black">Tugas 3 - Matkul 3</h1>
                                </div>
                                <div class="flex">
                                   <img src="{{ asset('img/Vector(1).png') }}" alt="">
                                   <h1 class="ml-5 text-black">Tugas 4 - Matkul 4</h1>
                                </div>
                                <div class="flex">
                                   <img src="{{ asset('img/Vector(1).png') }}" alt="">
                                   <h1 class="ml-5 text-black">Tugas 5 - Matkul 5</h1>
                                </div>
                                <div class="flex">
                                   <img src="{{ asset('img/Vector(1).png') }}" alt="">
                                   <h1 class="ml-5 text-black">Tugas 6 - Matkul 6</h1>
                                </div>
                                <div class="flex">
                                   <img src="{{ asset('img/Vector(1).png') }}" alt="">
                                   <h1 class="ml-5 text-black">Tugas 7 - Matkul 7</h1>
                                </div>
                                <div class="flex">
                                   <img src="{{ asset('img/Vector(1).png') }}" alt="">
                                   <h1 class="ml-5 text-black">Tugas 8 - Matkul 8</h1>
                                </div>
                               
                                <h1 class="pt-4">All Courses...</h1>

                            </div>

                        </div>














                        
                    </div>
                </div>
            </div>
        </div>

</x-app-layout>
