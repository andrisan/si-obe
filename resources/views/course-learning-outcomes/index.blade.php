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
                        <div class="judul">
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
                        <div class="right-0 float-right absolute">
                            <a href="{{ route('syllabi.ilos.clos.create', [$syllabus, $ilo]) }}"><button class="bg-[#2E65F3] px-5 py-2 rounded-md text-white" placeholder="Tambah"> <span class="font-bold  text-white rounded-full border-white">+</span> Tambah</button></a>
                        </div>
                    </div>
            
                    <div class="mt-10">
                    <table class="table-fixed w-full">
                        <thead>
                            <tr class="border-2 h-10">
                            <th class="w-10">No</th>
                            <th class="w-[35rem]">Description</th>
                            <th class=" w-60">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class=" border-2 border-black text-center">
                            @foreach ($clos as $clo)
                            <tr class="border-2 h-14">
                            <td>{{$clo['position']}}</td>    
                            <td class="text-justify-center">{{$clo['description']}}</td>
                            <td class="flex space-x-8 justify-center mt-3">
                                <button class="px-2 mt-1 text-blue-800 border-blue-800 rounded-2xl border-2">LLO</button>
                                <a href="{{ route('syllabi.ilos.clos.edit', [$syllabus, $ilo, $clo['id']]) }}" class="mt-1"><i class="fa-solid fa-pen-to-square text-blue-800"></i></a>
                                <form method="POST" action="{{ route('syllabi.ilos.clos.destroy', [$syllabus, $ilo, $clo['id']]) }}">
                                    @csrf
                                    @method('delete')

                                    <button class="mt-1"
                                            onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                                            <i class="fa-solid fa-trash-can text-red-600"></i>
                                    </button>
                                </form>
                            
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>