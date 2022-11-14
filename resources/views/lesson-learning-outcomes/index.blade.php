<script src="https://kit.fontawesome.com/b79c47ea42.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/61cc44f0a1.js" crossorigin="anonymous"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lesson Learning Outcome') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-20">
                    <div class="flex justify-between border-b-2 pb-4 ">
                        <div class="judul  ">
                            <h1 class="text-2xl font-extrabold" style="font-weight: 900;">Lesson Learning Outcome</h1>
                        </div>
                    </div>
            
                    <nav class="">
                        <ul class="flex space-x-2 font-extrabold">
                            <li class="text-[#2E65F3]">Syllabi <span class="mx-2">/</span> </li>
                            <li class="text-[#2E65F3]"> ILO <span class="mx-2">/</span> </li>
                            <li class="text-[#2E65F3]"> CLO <span class="mx-2">/</span> </li>
                            <li class=""> LLO </li>
                        </ul>
                    </nav>
            
                    <div class="flex  mt-5 space-x-5 relative">
                        <div class="">
                            <input type="text" class="bg-[#F7F7F9] w-52 px-5 py-2 rounded-md text-black placeholder:text-black" placeholder="MASUKKAN KODE">
                        </div>
                        <div class="">
                            <select name="" id="" class="bg-[#F7F7F9] w-52 px-5 py-2 rounded-md text-black">
                                
                                    <option value="books">PILIHAN KODE LLO</option>
                                    <option value="html">L1</option>
                                    <option value="css">L2</option>
                                    <option value="php">L3</option>
                                    <option value="js">L4</option>
                                  
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
                                <th class="w-44">KODE LLO</th>
                                <th class="w-[45rem]">DESKRIPSI</th>
                                <th>AKSI</th>
                              </tr>
                            </thead>
                            <tbody class="text-center border-2 border-black text-black">
                              <tr class="border-2 h-14">
                                <td>1</td>
                                <td>L1</td>
                                <td>Mampu memahami konsep dasar pemrograman database dan struktur stored procedur [M1]</td>
                                <td class="flex space-x-8 justify-center ">
            
                                    
                                    <div class="mt-3"><i class="fa-solid fa-pen-to-square text-blue-800"></i></div>
                                    <div class="mt-3"><i class="fa-solid fa-trash-can text-red-600"></i></div>
            
                                </td>
                              </tr>
                              <tr class="border-2 h-14">
                                <td>2</td>
                                <td>L2</td>
                                <td>Mampu mengimplementasikan logika pemrograman dalam stored procedure [M2] </td>
                                <td class="flex space-x-8  justify-center">
            
                                    
                                    <div class="mt-3"><i class="fa-solid fa-pen-to-square text-blue-800"></i></div>
                                    <div class="mt-3"><i class="fa-solid fa-trash-can text-red-600"></i></div>
            
                                </td>
                              </tr>
                              <tr class="border-2 h-14">
                                <td>3</td>
                                <td>L3</td>
                                <td>Mampu mengimplementasikan cursor, function dan trigger [M3]</td>
                                <td class="flex space-x-8 justify-center ">
            
                                    
                                    <div class="mt-3"><i class="fa-solid fa-pen-to-square text-blue-800"></i></div>
                                    <div class="mt-3"><i class="fa-solid fa-trash-can text-red-600"></i></div>
            
                                </td>
                              </tr>
                              <tr class="border-2 h-14">
                                <td>4</td>
                                <td>L4</td>
                                <td>Mampu merancang dan mengimplementasikan dynamic sql dan mengintegrasikannya dalam aplikasi [M4]</td>
                                <td class="flex space-x-8 justify-center ">
            
                                    
                                    <div class="mt-3"><i class="fa-solid fa-pen-to-square text-blue-800"></i></div>
                                    <div class="mt-3"><i class="fa-solid fa-trash-can text-red-600"></i></div>
            
                                </td>
                              </tr>
                              <tr class="border-2 h-14">
                                <td>5</td>
                                <td>L5</td>
                                <td>Mampu menyampaikan hasil progres rancangan dan implementasi projek [M5]</td>
                                <td class="flex space-x-8 mx-auto justify-center ">
            
                                    
                                    <div class="mt-3"><i class="fa-solid fa-pen-to-square text-blue-800"></i></div>
                                    <div class="mt-3"><i class="fa-solid fa-trash-can text-red-600"></i></div>
            
                                </td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                    
    </div>
</x-app-layout>