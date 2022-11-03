<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl sm:px-6 lg:px-8">
            <div class="bg-white overflow- shadow-sm sm:rounded-lg">
                <div class="p-1 bg-white border-b border-gray-200">
                    <div class="md:flex pb-10 ">


                        <div class="navbar ml-28 mt-5  ">
                            <div class="bg-[#AFC7F5] w-72 h-14 ml-5 pt-2 rounded-md cursor-pointer">
                                <div class="flex ml-3">
                                    <img class="w-8 gb" src="{{ asset('img/Gambar Fakultas.png') }}">
                                    <h1 class="justify-center items-center text-center my-auto mt-1 ml-5 text-xl">All
                                        Faculties</h1>
                                </div>
                            </div>
                            <div class="bg-[#AFC7F5]  w-72 h-14 ml-5 pt-2 rounded-md mt-5 cursor-pointer">
                                <div class="flex ml-3">
                                    <img class="w-8 ml gb" src="{{ asset('img/Gambar Department.png') }}">
                                    <h1 class="justify-center items-center text-center my-auto ml-5 text-xl">All
                                        Departemens</h1>
                                </div>
                            </div>
                            <div class="bg-[#AFC7F5]  w-72 h-14 ml-5 pt-2 rounded-md mt-5 cursor-pointer">
                                <div class="flex ml-3">
                                    <img class="w-8 gb" src="{{ asset('img/Gambar Program Studi.png') }}">
                                    <h1 class="justify-center items-center text-center my-auto mt-1 ml-5 text-xl">All
                                        Study Program</h1>
                                </div>
                            </div>

                            <div class="w-72">
                                <div class="mt-5">
                                    <h1 class="text-xl pl-5">Academic Calender</h1>
                                </div>
                                <div class="bg-[#AFC7F5]  w-72 h-8 ml-5 pt-2 rounded-md mt-5 cursor-pointer">
                                    <div class="flex">
                                        <h1 class="ml-8 text-sm">Select date</h1>
                                        <i class="fa-solid fa-calendar-days  pl-36 "></i>
                                    </div>
                                    <div class="mt-1">
                                        @include('components.calender')
                                    </div>

                                </div>



                            </div>
                        </div>
                        <div class="md:w-[35rem] w-full bg-white mt-5 mx-5 ">
                            <div class="bg-[#AFC7F5] p-5 ">
                                <h1 class="mx-auto my-auto text-2xl font-bold">Course Classes</h1>
                            </div>
                            <div class="border-2 border-blue-300 h-[90vh]">
                                <div class="flex mt-5 pb-10 ">
                                    <div class="w-[50%] h-52 ml-5 mr-4  bg-[#D9D9D9]">
                                        <h1></h1>
                                    </div>
                                    <div class="w-[50%] h-52 mr-5 bg-[#D9D9D9]">
                                        <h1></h1>
                                    </div>

                                </div>
                                <div class="flex mt-5 pb-10 ">
                                    <div class="w-[50%] h-52 ml-5 mr-4  bg-[#D9D9D9]">
                                        <h1></h1>
                                    </div>
                                    <div class="w-[50%] h-52 mr-5 bg-[#D9D9D9]">
                                        <h1></h1>
                                    </div>

                                </div>
                                <div class="text-right mr-5">
                                    <button
                                        class="bg-[#678CD3] hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
                                        See All
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="w-72 h-10 bg-[#AFC7F5] mt-5  rounded-lg">
                            <div class="mt-2 ml-2 flex">
                                <img src="{{ asset('img/Assign.png') }}" alt="">
                                <h1 class="ml-5">My Courses</h1>
                                <i class="fa-solid fa-magnifying-glass ml-24  justify-end items-end mt-1"></i>
                            </div>
                            <div class="h-72 bg-[#AFC7F5] mt-5 rounded-lg ">
                                <div class="flex pt-10 pl-5">
                                    <img class="w-5 mr-2" src="{{ asset('img/frames.png') }}" alt="">
                                    <h1>Matkul 1</h1>
                                </div>
                                <div class="flex pt-3 pl-5">
                                    <img class="w-5 mr-2" src="{{ asset('img/frames.png') }}" alt="">
                                    <h1>Matkul 2</h1>
                                </div>
                                <div class="flex pt-3 pl-5">
                                    <img class="w-5 mr-2" src="{{ asset('img/frames.png') }}" alt="">
                                    <h1>Matkul 3</h1>
                                </div>
                                <div class="flex pt-3 pl-5">
                                    <img class="w-5 mr-2" src="{{ asset('img/frames.png') }}" alt="">
                                    <h1>Matkul 4</h1>
                                </div>
                                <div class="flex pt-3 pl-5">
                                    <img class="w-5 mr-2" src="{{ asset('img/frames.png') }}" alt="">
                                    <h1>Matkul 5</h1>
                                </div>
                                <h1 class="text-gray-600 ml-5 mt-6">All Course...</h1>
                            </div>

                            <div class="w-72 h-10 bg-[#AFC7F5] mt-5 rounded-lg">
                                <div class="pt-2 ml-2 flex">
                                    <img src="{{ asset('img/Assign.png') }}" alt="">
                                    <h1 class="ml-5">Assingment</h1>

                                </div>
                                <div class="h-72 bg-[#AFC7F5] mt-5 rounded-lg ">
                                    <div class="flex pt-10 pl-5">
                                        <img class="w-5 mr-2" src="{{ asset('img/frames.png') }}" alt="">
                                        <h1>Tugas 1-Matkul 1</h1>
                                    </div>
                                    <div class="flex pt-3 pl-5">
                                        <img class="w-5 mr-2" src="{{ asset('img/frames.png') }}" alt="">
                                        <h1>Tugas 2-Matkul 2</h1>
                                    </div>
                                    <div class="flex pt-3 pl-5">
                                        <img class="w-5 mr-2" src="{{ asset('img/frames.png') }}" alt="">
                                        <h1>Tugas 3-Matkul 3</h1>
                                    </div>
                                    <div class="flex pt-3 pl-5">
                                        <img class="w-5 mr-2" src="{{ asset('img/frames.png') }}" alt="">
                                        <h1>Tugas 4-Matkul 4</h1>
                                    </div>
                                    <div class="flex pt-3 pl-5">
                                        <img class="w-5 mr-2" src="{{ asset('img/frames.png') }}" alt="">
                                        <h1>Tugas 5-Matkul 5</h1>
                                    </div>
                                    <h1 class="text-gray-600 ml-5 mt-6">All Assingment...</h1>
                                </div>






                            </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
