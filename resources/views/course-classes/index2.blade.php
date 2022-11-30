<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kelas Mahasiswa') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <div class="mb-5 "><a class="text-blue-700" href="">Course Classes</a>  <span class="mx-4">/</span>   <a href="">  Pengembangan Aplikasi Web </a></div>
                  <div class="flex ">
                    <form action="">
                      <input type="text"placeholder="Kode MK" class="shadow-lg rounded-md h-10 ml-16 mb-2">
                  </form>
                  <div class="">
                      <select name="" id="" class="shadow-lg  w-52 px-2 py-2 rounded-md text-black ml-16 mb-2 h-10">
                              <option value="books">PILIHAN MATA KULIAH</option>
                              <option value="html">Pengembangan Aplikasi Web</option>
                              <option value="css">Algoritma Dan Struktur Data</option>
                              <option value="php">Sistem Basis Data</option>
                              <option value="js">Pemrograman Dasar</option>
                
                      </select>
                  </div>
          
                  </div>
                
                    <button class="ml-16 my-4 btn btn-success rounded-md hover:bg-green-200 hover:text-slate-400 ">Tambah</button>
              
                  <div class="flex px-16 mt-2 ">
                    <table class="table-fixed w-full">
  
                      <thead>
                        <tr>
                          <th  class="">No</th>
                          <th  class="">Prodi</th>
                          <th  class="">Kode MK</th>
                          <th  class="">Mata Kuliah</th>
                          <th  class="">Kelas</th>
                          <th  class="">Pengajar</th>
                          <th  class="">Action</th>
                        </tr>
                      </thead>
                  
                      <tbody class=" border-2 border-black text-center">
                        <tr class="border-2 h-14">
                          <td width="100px">1</td>
                            <td width="100px">Teknologi Informasi</td>
                            <td width="400px">CIT62012</td>
                            <td width="400px">Pengembangan Aplikasi Web</td>
                            <td width="400px">B</td>
                            <td width="400px">Andri Santoso, S.kom., M.Sc.,</td>
                            <td >
                              <button class="btn  btn-warning hover:bg-red-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md w-16 mr-1 ">Edit</button>
                              <button class="btn  btn-error hover:bg-red-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md w-16 ">Delete</button>
                            </td>
                        </tr>
                        <tr class="border-2 h-14">
                          <td width="100px">2</td>
                            <td width="100px">Teknologi Informasi</td>
                            <td width="400px">CIT62012</td>
                            <td width="400px">Pengembangan Aplikasi Web</td>
                            <td width="400px">A</td>
                            <td width="400px">Andri Santoso, S.kom., M.Sc.,</td>
                            <td >
                              <button class="btn  btn-warning hover:bg-red-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md w-16 mr-1 ">Edit</button>
                              <button class="btn  btn-error hover:bg-red-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md w-16 ">Delete</button>
                            </td>
                          </tr>
                          <tr class="border-2 h-14">
                            <td width="100px">3</td>
                              <td width="100px">Sistem Informasi</td>
                              <td width="400px">CIT62013</td>
                              <td width="400px">Pengembangan Aplikasi Web</td>
                              <td width="400px">C</td>
                              <td width="400px">Andri Santoso, S.kom., M.Sc.,</td>
                              <td >
                                <button class="btn  btn-warning hover:bg-red-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md w-16 mr-1 ">Edit</button>
                                <button class="btn  btn-error hover:bg-red-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md w-16 ">Delete</button>
                              </td>
                            </tr>  
                            <tr class="border-2 h-14">
                              <td width="100px">4</td>
                                <td width="100px">Sistem Informasi</td>
                                <td width="400px">CIT62013</td>
                                <td width="400px">Pengembangan Aplikasi Web</td>
                                <td width="400px">B</td>
                                <td width="400px">Andri Santoso, S.kom., M.Sc.,</td>
                                <td >
                                  <button class="btn  btn-warning hover:bg-red-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md w-16 mr-1 ">Edit</button>
                                  <button class="btn  btn-error hover:bg-red-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md w-16 ">Delete</button>
                                </td>
                              </tr>  
                              <tr class="border-2 h-14">
                                <td width="100px">5</td>
                                  <td width="100px">Teknik Informatika</td>
                                  <td width="400px">CIT62015</td>
                                  <td width="400px">Pengembangan Aplikasi Web</td>
                                  <td width="400px">D</td>
                                  <td width="400px">Andri Santoso, S.kom., M.Sc.,</td>
                                  <td >
                                    <button class="btn  btn-warning hover:bg-red-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md w-16 mr-1 ">Edit</button>
                                    <button class="btn  btn-error hover:bg-red-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md w-16 ">Delete</button>
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
  