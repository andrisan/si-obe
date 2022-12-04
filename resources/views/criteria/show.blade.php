<script src="https://kit.fontawesome.com/b79c47ea42.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/61cc44f0a1.js" crossorigin="anonymous"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criteria') }}
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
                            <li class="">Criterias <span class="mx-2"></span> </li>
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

                    <div class="mt-10">
                        <table class="table-fixed w-full">
                            <thead>
                                <tr class="bg-[#F7F7F9] border-2 h-10">
                                    <th class="w-16">No</th>
                                    <th class="w-64">Title</th>
                                    <th class="w-32">Max Point</th>
                                    <th class="w-128">Description</th>
                                    <th class="w-32">AKSI</th>
                                </tr>
                            </thead>
                            <tbody class="text-center border-2 border-black text-black">
                                <tr class="border-2 h-14">
                                    <td>1</td>
                                    <td>Mampu melaksanakan konsep Pemrograman Basis Data dalam pengembangan aplikasi</td>
                                    
                                    <td>N01-1</td><td>2.5</td>
                                    <td>
                                        <div>
                                            <button class="px-4 m-1 bg-blue-600 rounded-xl text-white text-sm font-bold">Show</button>
                                        </div>
                                        <div>
                                            <button class="px-4 m-1 bg-yellow-600 rounded-xl text-white text-sm font-bold">Edit</button>
                                           </div>
                                           <div>
                                            <button class="px-4 m-1 bg-red-600 rounded-xl text-white text-sm font-bold">Delete</button>
                                        </div>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
</x-app-layout>
