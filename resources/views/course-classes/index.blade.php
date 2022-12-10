@section('pageTitle', "Teacher's Classes")
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (Auth::user()->role == 'admin')
            {{ __('Daftar Seluruh Kelas') }}
            @else
            {{ __('Daftar Kelas Dosen') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid flex-grow mx-14 my-4 mb-10">
                        <div class="flex flex-col lg:flex-row">
                            <div class="grid flex-grow place-items-start">
                                <form class="flex items-center" action="/classes" method="get">   
                                    <label for="simple-search" class="sr-only">Search</label>
                                    <div class="relative w-full">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                        </div>
                                        <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" name="search" value="" required>
                                    </div>
                                    <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                        <span class="sr-only">Search</span>
                                    </button>
                                </form>
                            </div>
                            <div class="grid flex-grow place-items-end">
                                <a href="{{route('classes.create')}}">
                                    @if (Auth::user()->role != 'admin')
                                    <button class="btn bg-gray-700 hover:bg-white hover:text-gray-700 text-white font-bold rounded-lg border-gray-700 border-2 hover:border-gray-700 btn-md">
                                        Tambah
                                    </button>
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap data">
                        <?php $i = 1; ?>
                        @foreach ($classes as $class)
                          <!-- Konten1 -->
                        <div class="card w-80 bg-img bg-blend-overlay shadow-xl my-8 mx-8">
                            @if (substr($class->thumbnail_img, 0, 6) == 'public')
                            <img class="w-full" src="{{ url('storage/'.substr($class->thumbnail_img, 6))}}">
                            @else
                            <img class="w-full" src="{{ $class->thumbnail_img}}">
                            @endif
                            <div class="card-body p-6">
                                <div class="card-title text-neutral font-extrabold">
                                    <a class="mb-1 relative group text-blue-400" href="{{route('classes.show',[$class['id']])}}">
                                        <span>{{$class->course->name}}</span>
                                        <span class="absolute -bottom-1 left-1/2 w-0 h-0.5 bg-blue-400 group-hover:w-1/2 group-hover:transition-all"></span>
                                        <span class="absolute -bottom-1 right-1/2 w-0 h-0.5 bg-blue-400 group-hover:w-1/2 group-hover:transition-all"></span>
                                    </a>
                                    {{-- <a href="{{route('classes.show',[$class['course_id']])}}" class="text-blue-400">{{$class->course->name}}</a> --}}
                                </div>
                                <div class="grid flex-grow place-items-start">
                                    <button class="btn btn-disabled sm:btn-xs md:btn-xs rounded-md normal-case text-white">
                                        {{$class->course->code}}
                                    </button> 
                                </div>
                                <a class="font-bold">Kelas {{$class->name}}</a>
                                {{-- <p>{{$class->class_code}}</p> --}}

                                <div class="flex flex-col lg:flex-row">
                                    <div class="grid flex-grow place-items-start">
                                        <button class="btn btn-disabled sm:btn-xs md:btn-xs rounded-md normal-case text-white">
                                            {{$class->class_code}}
                                        </button> 
                                        {{-- JUN TOLONG BENERIN INI NAMA DOSENNYA--}}
                                        @if (Auth::user()->role == 'admin')
                                        <p>{{ $class->creator->name }}</p> 
                                        @endif
                                    </div>
                                    <div class="grid flex-grow place-items-end">
                                        @if (Auth::user()->role != 'admin')
                                        <a href="{{route('classes.edit', [$class->id])}}" class="mb-2">
                                            <button class="btn btn-warning hover:bg-amber-500 btn-xs hover:border-amber-500 sm:btn-sm md:btn-sm rounded-full">
                                                <img class="w-5 h-5" src="{{ asset('img/icon-edit.png') }}" alt="">
                                            </button>
                                        </a>
                                        @endif
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
