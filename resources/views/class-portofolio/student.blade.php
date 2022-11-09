<x-app-layout>
    <x-slot name="header">
        
    </x-slot>

    <div class="py-5 px-20">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  shadow-sm sm:rounded-lg">
                <div class="p-10     bg-white border-b border-gray-200">

                    <div class="text-center">
                        <h1 class="text-black text-3xl text-center mx-auto justify-center font-extrabold">LEMBAR PENILAIAN PORTOFOLIO
                        </h1>
                    </div>
                    <div class="ml-10 mt-14">
                        <div class="flex text-black">
                            <h1>Nama <span class="ml-40">:</span></h1>
                            <p class="ml-2">{{ Auth::user()->name }}</p>
                        </div>
                        <div class="flex text-black">
                            <h1>NIM <span class="pl-[10.8rem]">:</span></h1>
                            <p class="ml-2">215150700111001</p>
                        </div>
                        <div class="flex text-black">
                            <h1>Mata Kuliah <span class="pl-[7.4rem]">:</span></h1>
                            <p class="ml-2">Pengembangan Aplikasi Web</p>
                        </div>
                        <div class="flex text-black justify-between">
                            <h1 class="flex">Alokasi Waktu <span class="pl-[6.5rem]">:</span>
                                <p class="ml-2">1 (Satu) Semester</p>
                            </h1>
                            <h1 class="mr-10">Kelas: TI-C</h1>
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
