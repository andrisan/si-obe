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
                              @foreach ($classes as $class)
                              <option value="books">{{ $class->course->name }}</option>
                              @endforeach
                      </select>
                  </div>
          
                  </div>
                
                    <button class="ml-16 my-4 btn btn-success rounded-md hover:bg-green-200 hover:text-slate-400 ">Join</button>
              
                  <div class="flex px-16 mt-2 ">
                    <table class="table-fixed w-full">
  
                      <thead>
                        <tr>
                          <th  class="">No</th>
                          {{-- <th  class="">Thumbnail Image</th> --}}
                          <th  class="">Kelas</th>
                          <th  class="">Mata Kuliah</th>
                          <th  class="">Kode Mata Kuliah</th>
                          <th  class="">Pengajar</th>
                          <th  class="">Jenis</th>
                          <th  class="">Action</th>
                        </tr>
                      </thead>
                  
                      <tbody class=" border-2 border-black text-center">
                        @foreach ($classes as $class)
                        <tr class="border-2 h-14">
                          <td width="400px">{{ $loop->index + $classes->firstItem() }}</td>
                            {{-- <td width="400px">
                              <img src="{{ $class->thumbnail_img }}" alt="">
                            </td> --}}
                            <td width="400px">{{ $class->name }}</td>
                            <td width="400px">{{ $class->course->name }}</td>
                            <td width="400px">{{ $class->course->code }}</td>
                            <td width="400px">{{ $class->creator->name }}</td>
                            <td width="400px">{{ $class->course->type }}</td>
                            <td >
                              <button class="btn  btn-warning hover:bg-red-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md w-16 mr-1 ">Edit</button>
                              <button class="btn  btn-error hover:bg-red-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md w-16 ">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="mt-5">
                      {{ $classes->links() }}
                  </div>
                </div>
            </div>
        </div>
    </div>
  </x-app-layout>
  