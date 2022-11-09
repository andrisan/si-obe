<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelas Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <div class="mb-5 "><a class="text-blue-700" href="">Student Grades</a>  <span class="mx-4">/</span>   <a href="">  Pengembangan Aplikasi Web </a></div>
                  <div class="flex ">
                    <form class="my-4" action="">
                      <input type="text"placeholder="ID Tugas" class="shadow-lg rounded-md h-10 ml-16 mb-2">
                        <select name="" id="" class="shadow-lg  w-52 px-2 py-2 rounded-md text-black ml-16 mb-2 h-10">
                                <option value="books">PILIHAN MATA KULIAH</option>
                                <option value="html">Pengembangan Aplikasi Web</option>
                                <option value="css">Algoritma Dan Struktur Data</option>
                                <option value="php">Sistem Basis Data</option>
                                <option value="js">Pemrograman Dasar</option>

                        </select>
                  </form>
                  </div>
                  <div class="flex px-16 mt-2 ">
                    <table class="table-fixed w-full">
  
                      <thead>
                        <tr>
                          <th  class="">No</th>
                          <th  class="">Nama Mahasiswa</th>
                          <th  class="">NIM</th>
                          <th  class="">Kelas</th>
                          <th  class="">Program Studi</th>
                          <th  class="">Nilai</th>
                          <th  class="">Action</th>
                        </tr>
                      </thead>
                  
                      <tbody class=" border-2 border-black text-center">
                        <tr class="border-2 h-14">
                          <td width="100px">1</td>
                            <td width="100px">Gunawan Dwi Irawan</td>
                            <td width="400px">215150701111009</td>
                            <td width="400px">B</td>
                            <td width="400px">Teknologi Informasi</td>
                            <td width="100px"><input type="text" class="w-24 h-6 rounded-lg border-blue-600"></td>
                            <td >
                              <button class="btn  btn-error bg-red-600 text-slate-100 hover:bg-red-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md w-16 mr-1 ">Delete</button>
                              <button class="btn  btn-primary bg-blue-600 text-slate-100 hover:bg-blue-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md w-16 ">Save</button>
                            </td>
                        </tr>
