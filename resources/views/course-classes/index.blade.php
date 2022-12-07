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

                    <div class="flex flex-wrap data">
                        <?php $i = 1; ?>
                        @foreach ($classes as $class)
                          <!-- Konten1 -->
                        <div class="card w-80 bg-img bg-blend-overlay shadow-xl my-8 mx-8">
                            <img class="w-full" src="{{ asset('img/GambarCourse 1.png')}}">
                            <div class="card-body p-6">
                                <div class="card-title text-neutral font-extrabold">
                                    <p>{{$class->course->name}}</p>
                                </div>
                                <a>{{$class->course->code}} ({{$class->course->type}})<a>
                                <a class="font-bold">Kelas {{$class->name}}</a>
                                {{-- <p>{{$class->class_code}}</p> --}}

                                <div class="card-actions grid flex-grow">
                                    <div class="grid flex-grow justify-start">
                                        <a>
                                            <button class="btn btn-warning hover:bg-amber-500 btn-xs hover:border-amber-500 sm:btn-sm md:btn-sm rounded-full">
                                                {{$class->class_code}}
                                            </button>
                                        </a> 
                                    </div>
                                    <div class="grid flex-grow justify-end">
                                        <a href="{{route('classes.edit', [$class->id])}}">
                                            <button class="btn btn-warning hover:bg-amber-500 btn-xs hover:border-amber-500 sm:btn-sm md:btn-sm rounded-full">
                                                <img class="w-5 h-5" src="{{ asset('img/icon-edit.png') }}" alt="">
                                            </button>
                                        </a>
                                        <form action="{{ route('classes.destroy', [$class]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-error hover:bg-red-500 hover:border-red-500 btn-xs sm:btn-sm md:btn-sm rounded-full" value="{{ $class->id }}"
                                                onclick="return confirm('Yakin ingin menghapus data ?');"><img class="w-5 h-5" src="{{ asset('img/icon-delete.png') }}" alt=""></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-5">
                        {{ $classes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
