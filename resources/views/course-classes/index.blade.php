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
                    <div class="grid flex-grow mx-16 my-4 mb-10">
                        <div class="flex flex-col lg:flex-row">
                            <div class="grid flex-grow place-items-start">
                                <form action="">
                                    <input type="text" placeholder="Kode MK" class="rounded-md h-12 text-sm">
                                </form>
                            </div>
                            <div class="grid flex-grow place-items-start">
                                <select name="" id=""
                                    class="w-52 px-2 py-2 rounded-md text-blac h-12 text-sm">
                                    <option value="books">PILIHAN MATA KULIAH</option>
                                    @foreach ($courses->pluck('name') as $course)
                                        <option value="books">{{ $course }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="grid flex-grow place-items-end">
                                <a href="{{route('classes.create')}}">
                                    <button class="btn bg-gray-700 hover:bg-white hover:text-gray-700 text-white font-bold rounded border-gray-700 border-2 hover:border-gray-700 btn-md">
                                        Tambah
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="flex px-16 mt-2 ">
                        <table class="table-fixed w-full">

                            <thead>
                                <tr>
                                    <th width="80px">No</th>
                                    <th width="150">Kelas</th>
                                    <th width="100">Kode Kelas</th>
                                    <th class="">Mata Kuliah</th>
                                    <th class="">Kode Mata Kuliah</th>
                                    <th class="">Jenis</th>
                                    <th class="">Action</th>
                                </tr>
                            </thead>

                            <tbody class=" border-2 border-black text-center">
                                <?php $i = 1; ?>
                                @foreach ($classes as $class)
                                    <tr class="border-2 h-14">
                                        <td width="80px">{{ $i }}</td>
                                        <td width="150px">{{ $class->name }}</td>
                                        <td width="100px">{{ $class->class_code }}</td>
                                        {{-- <td width="400px">{{ $class->name }}</td> --}}
                                        {{-- <td width="400px">{{ $class->class_code }}</td> --}}
                                        <td width="400px">{{ $class->course->name }}</td>
                                        <td width="400px">{{ $class->course->code }}</td>
                                        <td width="400px">{{ $class->course->type }}</td>
                                        <td>
                                                <div class="">
                                                    <a href="{{route('classes.edit', [$class->id])}}">
                                                        <button class="btn btn-warning hover:bg-white hover:text-warning btn-xs sm:btn-sm md:btn-sm rounded-full text-white">
                                                            <img class="w-5 h-5" src="{{ asset('img/icon-edit.png') }}" alt="">
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="mt-2">
                                                    <form action="{{ route('classes.destroy', [$class]) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-error hover:bg-white hover:text-error btn-xs sm:btn-sm md:btn-sm rounded-full text-white" value="{{ $class->id }}"
                                                            onclick="return confirm('Yakin ingin menghapus data ?');"><img class="w-5 h-5" src="{{ asset('img/icon-delete.png') }}" alt=""></button>
                                                    </form>
                                                </div>
                                            {{-- <button class="btn btn-error hover:bg-white hover:text-error btn-xs sm:btn-sm md:btn-sm rounded-md w-16 text-white">
                                                Delete
                                            </button> --}}
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
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
