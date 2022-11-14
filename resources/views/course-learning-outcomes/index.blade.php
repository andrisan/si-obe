<script src="https://kit.fontawesome.com/b79c47ea42.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/61cc44f0a1.js" crossorigin="anonymous"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course Learning Outcome') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-20 text-black">
                    <div class="flex justify-between border-b-2 pb-4 ">
                        <div class="judul  ">
                            <h1 class="text-2xl font-extrabold" style="font-weight: 900;">Course Learning Outcome</h1>
                        </div>
                       
                    </div>
            
                    <nav class="">
                        <ul class="flex space-x-2 font-extrabold">
                            <li class="text-[#2E65F3]">Syllabi <span class="mx-2">/</span> </li>
                            <li class="text-[#2E65F3]"> ILO <span class="mx-2">/</span> </li>
                            <li class=""> CLO </li>
                        </ul>
                    </nav>
            
                    <div class="flex  mt-5 space-x-5 relative">
                        <div class="">
                            <input type="text" class="bg-[#F7F7F9] w-52 px-5 py-2 rounded-md text-black placeholder:text-black" placeholder="MASUKKAN KODE">
                        </div>
                        <div class="">
                            <select name="" id="" class="bg-[#F7F7F9] w-52 px-5 py-2 rounded-md text-black">
                                
                                    <option value="books">PILIHAN KODE CLO</option>
                                    <option value="html">M1</option>
                                    <option value="css">M2</option>
                                    <option value="php">M3</option>
                                    <option value="js">M4</option>
                                  
                            </select>
                        </div>
                        <div class="right-0 float-right absolute">
                            <button class="bg-[#2E65F3] px-5 py-2 rounded-md text-white" placeholder="Tambah"> <span class="font-bold  text-white rounded-full border-white">+</span> Tambah</button>
                        </div>
                    </div>
            
                    <div class="mt-10">
                        <table class="table-fixed w-full">
                            <thead>
                              <tr class="bg-[#F7F7F9] border-2 h-10">
                                <th class="w-10">No</th>
                                <th class="w-44">KODE CLO</th>
                                <th class="w-[40rem]">DESKRIPSI</th>
                                <th>AKSI</th>
                              </tr>
                            </thead>
                            <tbody class="text-center border-2 border-black text-black">
                              <tr class="border-2 h-14">
                                <td>1</td>
                                <td>M1</td>
                                <td>Mampu memahami konsep pemrograman basis data untuk menunjang integrasi data dalam pengembangan aplikasi</td>
                                <td class="flex space-x-8 ">
            
                                    <button class="px-2 mt-2 text-blue-800 border-blue-800 rounded-2xl border-2">CEK LLO</button>
                                    <div class="mt-3"><i class="fa-solid fa-pen-to-square text-blue-800"></i></div>
                                    <div class="mt-3"><i class="fa-solid fa-trash-can text-red-600"></i></div>
            
                                </td>
                              </tr>
                              <tr class="border-2 h-14">
                                <td>2</td>
                                <td>M2</td>
                                <td>Mampu merancang dan mengimplementasikan logika pemrograman dalam stored procedure, store function, cursor, trigger</td>
                                <td class="flex space-x-8 ">
            
                                    <button class="px-2 mt-2 text-blue-800 border-blue-800 rounded-2xl border-2">CEK LLO</button>
                                    <div class="mt-3"><i class="fa-solid fa-pen-to-square text-blue-800"></i></div>
                                    <div class="mt-3"><i class="fa-solid fa-trash-can text-red-600"></i></div>
            
                                </td>
                              </tr>
                              <tr class="border-2 h-14">
                                <td>3</td>
                                <td>M3</td>
                                <td>Mampu mengintegrasikan pemrograman basis data dalam aplikasi</td>
                                <td class="flex space-x-8 ">
            
                                    <button class="px-2 mt-2 text-blue-800 border-blue-800 rounded-2xl border-2">CEK LLO</button>
                                    <div class="mt-3"><i class="fa-solid fa-pen-to-square text-blue-800"></i></div>
                                    <div class="mt-3"><i class="fa-solid fa-trash-can text-red-600"></i></div>
            
                                </td>
                              </tr>
                              <tr class="border-2 h-14">
                                <td>4</td>
                                <td>M4</td>
                                <td>Mampu menyampaikan hasil rancangan dan implementasi projek secara ilmiah</td>
                                <td class="flex space-x-8 ">
            
                                    <button class="px-2 mt-2 text-blue-800 border-blue-800 rounded-2xl border-2">CEK LLO</button>
                                    <div class="mt-3"><i class="fa-solid fa-pen-to-square text-blue-800"></i></div>
                                    <div class="mt-3"><i class="fa-solid fa-trash-can text-red-600"></i></div>
            
                                </td>
                              </tr>
                              <tr class="border-2 h-14">
                                <td>5</td>
                                <td>M5</td>
                                <td>Mampu memahami konsep pemrograman basis data untuk menunjang integrasi data dalam pengembangan database</td>
                                <td class="flex space-x-8 ">
            
                                    <button class="px-2 mt-2 text-blue-800 border-blue-800 rounded-2xl border-2">CEK LLO</button>
                                    <div class="mt-3"><i class="fa-solid fa-pen-to-square text-blue-800"></i></div>
                                    <div class="mt-3"><i class="fa-solid fa-trash-can text-red-600"></i></div>
            
                                </td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>