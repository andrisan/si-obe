<script src="https://kit.fontawesome.com/b79c47ea42.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/61cc44f0a1.js" crossorigin="anonymous"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criteria-Levels') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-20">
                    <div class="flex justify-between border-b-2 pb-4 ">
                        <div class="judul  ">
                            <h1 class="text-2xl font-extrabold" style="font-weight: 900;">Criterias</h1>
                        </div>
                    </div>
            
                    <nav class="">
                        <ul class="flex space-x-2 font-extrabold">
                            <li class="text-[#2E65F3]">Rubrics <span class="mx-2">/</span> </li>
                            <li class="text-[#2E65F3]">Criterias <span class="mx-2">/</span> </li>
                            <li class="">Criteria-Levels <span class="mx-2"></span> </li>
                        </ul>
                    </nav>
            
                    <div class="flex  mt-5 space-x-5 relative">
                        <div class="">
                            <input type="text" class="bg-[#F7F7F9] w-52 px-5 py-2 rounded-md text-black placeholder:text-black" placeholder="MASUKKAN INDIKATOR">
                        </div>
                        
                        <div class="">
                            <select name="" id="" class="bg-[#F7F7F9] w-52 px-5 py-2 rounded-md text-black">
                                
                                    <option value="books">PILIHAN INDIKATOR</option>
                                    <option value="html">N01-1</option>
                                    <option value="css">N01-2</option>
                                    <option value="php">N02-1</option>
                                    <option value="js">N0-2</option>
                                  
                            </select>
                        </div>
                        
                    </div>
            
                    <div class="mt-10 ">
                        <table class="table-fixed w-full ">
                            <thead class="font-extrabold">
                              <tr class="bg-[#F7F7F9] border-2 h-10">
                                <th class="w-10">No</th>
                                <th class="w-44">INDIKATOR</th>
                                <th class="w-44">POIN(%)</th>
                                <th class="w-44">LEVEL</th>
                                <th class="w-[30rem]">DESKRIPSI</th>
                              </tr>
                            </thead>
                            <tbody class="text-center border-2 border-black text-black">
                              <tr class="border-2 h-14">
                                <td class="border-b-2 border-white"></td>
                                <td class="border-b-2 border-white"></td>
                                <td class="border-l-2">
                                    2.5
                                </td>
                                <td >Baik</td>
                                <td>Mampu menguasai dan mempresentasikan</td>
                              </tr>

                              <tr class="border-2 h-14">
                                <td class="border-b-2 border-white">1</td>
                                <td class="border-b-2 border-white">N01-1</td>
                                <td class="border-l-2 ">
                                    2
                                </td>
                                <td >Cukup</td>
                                <td>Mampu menguasai saja</td>
                              </tr>

                              <tr class="border-2 h-14">
                                <td class=""></td>
                                <td class=""></td>
                                <td class="border-l-2">
                                    1
                                </td>
                                <td >Kurang</td>
                                <td>Kurang menguasai</td>
                              </tr>
                            
                              
                            </tbody>
                          </table>
                    </div>
            </div>
        </div>
                    
    </div>
</x-app-layout>