<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kelas Dosen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex">
                        <form action="">
                            <input type="text" placeholder="Kode MK" class="rounded-md h-10 ml-16 mb-2 text-sm">
                        </form>
                        <div class="">
                            <select name="" id=""
                                class="w-52 px-2 py-2 rounded-md text-black ml-16 mb-2 h-10 text-sm">
                                <option value="books">PILIHAN MATA KULIAH</option>
                                @foreach ($courses->pluck('name') as $course)
                                    <option value="books">{{ $course }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="place-items-end">
                            <a href="{{route('classes.create')}}">
                                <button
                                    class="btn btn-success rounded-md hover:bg-green-200 hover:text-slate-400 ">
                                    Tambah
                                </button>
                            </a>
                        </div>
                    </div>

                  <button
                      class="ml-16 my-4 btn btn-success rounded-md hover:bg-green-200 hover:text-slate-400 ">Tambah</button>

                  <div class="flex px-16 mt-2 ">
                      <table class="table-fixed w-full">

                          <thead>
                              <tr>
                                  <th class="">No</th>
                                  <th class="">Thumbnail Image</th>
                                  <th class="">Kelas</th>
                                  <th class="">Kode Kelas</th>
                                  <th class="">Mata Kuliah</th>
                                  <th class="">Kode Mata Kuliah</th>
                                  <th class="">Jenis</th>
                                  <th class="">Action</th>
                              </tr>
                          </thead>

                          <tbody class=" border-2 border-black text-center">
                              <?php $i=1 ?>
                              @foreach ($classes as $class)
                              <tr class="border-2 h-14">
                                  <td width="100px">{{ $i }}</td>
                                  <td width="100px">
                                      <img src="{{ $class->thumbnail_img }}" alt=" ">
                                  </td>
                                  <td width="400px">{{ $class->name }}</td>
                                  <td width="400px">{{ $class->class_code }}</td>
                                  <td width="400px">{{ $class->course->name }}</td>
                                  <td width="400px">{{ $class->course->code }}</td>
                                  <td width="400px">{{ $class->course->type }}</td>
                                  <td>
                                      <button
                                          class="btn  btn-warning hover:bg-red-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md w-16 mr-1 ">Edit</button>
                                      <button
                                          class="btn  btn-error hover:bg-red-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md w-16 ">Delete</button>
                                  </td>
                              </tr>
                              <?php $i++ ?>
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
