@section('pageTitle', "Intended Learning Outcome")
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{('Capaian Pembelajaran Lulusan')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button class="px-8 mx-14 p-3 bg-green-400 rounded-md"><a href="{{route('syllabi.ilos.create',[$syllabus])}}">Tambah</a></button>
                  <div class="flex px-16 mt-2">
                    <table class="table-fixed w-full">
                        <thead>
                          <tr class="border-2 h-10">
                            <th class="w-10">No</th>
                            <th class="w-44">Position</th>
                            <th class="w-[35rem]">Description</th>
                            <th class=" w-60">Aksi</th>
                          </tr>
                        </thead>
                        <tbody class=" border-2 border-black text-center">
                          @foreach ($ilos as $ilo)
                          <tr class="border-2 h-14">
                            <td>{{$ilo['id']}}</td>
                            <td>{{$ilo['position']}}</td>
                            <td class="text-justify">{{$ilo['description']}}</td>
                            <td class="flex space-x-8 justify-center mt-5">
                              <form action="/syllabi/{{$ilo->id}}/ilos/{{$ilo->id}}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn  btn-warning hover:bg-yellow-200 hover:text-slate-400  btn-xs sm:btn-sm md:btn-sm rounded-md mb-5"><a href="{{route ('syllabi.ilos.edit',[$syllabus, $ilo['id']])}}">Edit</a></button>
                                <button class="btn btn-error hover:bg-red-200 hover:text-slate-400 btn-xs sm:btn-sm md:btn-sm rounded-md " onclick="return confirm('Are you sure?')" value="{{$ilo->id}}" >Delete</button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </div>
                  <div class="mt-10 px-14">
                   {{$ilos->links() }}
                </div>
                </div>
            </div>
        </div>
    </div>
  </x-app-layout>
