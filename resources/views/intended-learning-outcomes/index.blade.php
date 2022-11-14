<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Capaian Pembelajaran Lulusan') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <div class="flex px-16 mt-2">
                    <table class="table-fixed w-full">
                        <thead>
                          <tr class="border-2 h-10">
                            <th class="w-10">No</th>
                            <th class="w-44">NAMA</th>
                            <th class="w-[35rem]">Keterangan</th>
                            <th class=" w-60">Aksi</th>
                          </tr>
                        </thead>
                        <tbody class=" border-2 border-black text-center">
                          <tr class="border-2 h-14">
                            <td>1</td>
                            <td>ILO02-P</td>
                            <td class="text-justify">Lulusan mampu menentukan dan menggunakan berbagai produk sistem atau teknologi informasi
                                untuk mendukung atau mentransformasi proses literasi teknologi informasi dan perbaikan kualitas
                                data, informasi, maupun pengetahuan yang dibutuhkan.</td>
                            <td class="flex space-x-8 justify-center mt-5">
                                <button class="btn  btn-warning hover:bg-yellow-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md  ">Update</button>
                                <button class="btn btn-error hover:bg-red-200 hover:text-slate-400 btn-xs sm:btn-sm md:btn-sm rounded-md flex mx-auto ">Delete</button>
                            </td>
                          </tr>
                          <tr class="border-2 h-14">
                            <td>2</td>
                            <td>ILO01-KK</td>
                            <td class="text-justify">Lulusan mampu mengetahui bagaimana cara menggunakan prinsip-prinsip rekayasa, integrasi, dan pengolahan data atau informasi menggunakan sistem atau teknologi informasi untuk menyolusikan</td>
                            <td class="flex space-x-8 ">
                                <td class="flex space-x-8 justify-center mt-2">
                                <button class="btn  btn-warning hover:bg-yellow-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md  ">Update</button>
                                <button class="btn btn-error hover:bg-red-200 hover:text-slate-400 btn-xs sm:btn-sm md:btn-sm rounded-md flex mx-auto ">Delete</button>
                            </td>
                          </tr>
                          <tr class="border-2 h-14">
                            <td>3</td>
                            <td>ILO01-KU</td>
                            <td class="text-justify">Lulusan memiliki kemampuan untuk berpikir komputasi, berpikir desain, melakukan
                                pengkajian dan penulisan ilmiah serta mampu menerapkan nilai-nilai technopreneurship
                                dalam menciptakan inovasi produk sistem atau teknologi informasi.</td>
                            <td class="flex space-x-8 ">
                                <td class="flex space-x-8 justify-center mt-4">
                                <button class="btn  btn-warning hover:bg-yellow-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md  "><a href="">Update</a></button>
                                <button class="btn btn-error hover:bg-red-200 hover:text-slate-400 btn-xs sm:btn-sm md:btn-sm rounded-md flex mx-auto ">Delete</button>
                            </td>
                          </tr>
                          <tr class="border-2 h-14">
                            <td>4</td>
                            <td>ILO03-KK</td>
                            <td class="text-justify">Mampu menyampaikan hasil rancangan dan implementasi projek secara ilmiah</td>
                            <td class="flex space-x-8 ">
                                <td class="flex space-x-8 justify-center mt-2">
                                 <button class="btn  btn-warning hover:bg-yellow-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md  ">Update</button>
                                <button class="btn btn-error hover:bg-red-200 hover:text-slate-400 btn-xs sm:btn-sm md:btn-sm rounded-md flex mx-auto ">Delete</button>
                            </td>
                          </tr>
                          <tr class="border-2 h-14">
                            <td>5</td>
                            <td>ILO02-UU</td>
                            <td class="text-justify">Mampu memahami konsep pemrograman basis data untuk menunjang integrasi data dalam pengembangan database</td>
                            <td class="flex space-x-8 ">
                                <td class="flex space-x-8 justify-center mt-2">
                                <button class="btn  btn-warning hover:bg-yellow-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md  ">Update</button>
                                <button class="btn btn-error hover:bg-red-200 hover:text-slate-400 btn-xs sm:btn-sm md:btn-sm rounded-md flex mx-auto ">Delete</button>
            
                            </td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </x-app-layout>
  