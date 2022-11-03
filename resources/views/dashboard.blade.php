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
                    <div class="flex">
                        <div class="md:ml-20">
                            <div class="rounded-md p-2 w-72 bg-[#AFC7F5]  ">
                                <div class="flex text-center items-center  ">
                                    <div class="gb ">
                                        <img src="{{ asset('img/Gambar Fakultas.png') }}" alt="">
                                    </div>
                                    <h2 class="ml-3 text-xl text-black">All Faculties</h2>
                                </div>
                            </div>
                            <div class="mt-5 rounded-md p-2 w-72 bg-[#AFC7F5]  ">
                                <div class="flex text-center items-center  ">
                                    <div class="gb ">
                                        <img class="ml-2 w-10" src="{{ asset('img/Gambar Department.png') }}"
                                            alt="">
                                    </div>
                                    <h2 class="ml-6 text-xl text-black">All Departements</h2>
                                </div>
                            </div>
                            <div class="mt-5 rounded-md p-2 w-72 bg-[#AFC7F5]  ">
                                <div class="flex text-center items-center  ">
                                    <div class="gb ">
                                        <img src="{{ asset('img/Gambar Program Studi.png') }}" alt="">
                                    </div>
                                    <h2 class="ml-3 text-xl text-black">All Study program</h2>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="ml-10 w-full bg-[#AFC7F5]">
                                <h1>Course Classes</h1>
                            </div>
                        </div>
                       

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
