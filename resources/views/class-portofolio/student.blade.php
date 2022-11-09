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
                        <div class="mt-2    py-20 ">
                            <style>
                                .border-{
                                    background: black;
                                }
                                table , th, td{
                                    border: black 2px solid;
                                } 
                            </style>

                            <table class="w-full border-colapse border-2 border-black" border="1"  cellpadding="15">
                                <tr >
                                    <th  rowspan="2" bgcolor="#AFC7F5">NO</th>
                                    <th  rowspan="2" bgcolor="#AFC7F5">KOMPETENSI DASAR
                                    </th>
                                    <th  rowspan="2" bgcolor="#AFC7F5">PERIODE TANGGAL
                                    </th>
                                    <th  colspan="3" bgcolor="#AFC7F5">KETERCAPAIAN</th>
                                    <th  rowspan="2" bgcolor="#AFC7F5">SKOR</th>

                                </tr>
                                <tr >
                                    <th  bgcolor="#AFC7F5">CUKUP</th>
                                    <th  bgcolor="#AFC7F5">BAIK</th>
                                    <th  bgcolor="#AFC7F5">SANGAT BAIK</th>

                                </tr>
                                <tr >
                                    <td class="text-center">1</td>
                                    <td class="text-center">Presentasi Blade Template</td>
                                    <td class="text-center">25/10/2022</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><img class="mx-auto text-center" src="{{ asset('img/dashicons_yes.png') }}"
                                            alt=""></td>
                                    <td class="text-center"></td>
                                    <td class="text-center">81</td>
                                </tr>
                                <tr >
                                    <td class="text-center">2</td>
                                    <td class="text-center">Ringkasan Blade Template</td>
                                    <td class="text-center">25/10/2022</td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center"><img class="mx-auto"
                                            src="{{ asset('img/dashicons_yes.png') }}" alt=""></td>
                                    <td class="text-center">92</td>
                                </tr>
                    </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
