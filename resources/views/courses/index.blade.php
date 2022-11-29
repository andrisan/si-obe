@section('pageTitle', "Courses")

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div>
            <div class="text-sm breadcrumbs pl-10 pt-5 font-bold text-gray-600">
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="text-blue-600"><a href="{{ route('courses.index') }}">Courses</a></li>
                </ul>
            </div>
        </div>
        <div class="py-1">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-row sm:justify-end mb-3 px-4 sm:px-0 -mr-2 sm:-mr-3">
                    <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                        <div style="position: relative;" dusk="columns-dropdown">
                            <div>
                                <a href="{{ route('courses.create') }}" class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <div class="text-blue-600 pr-1">CREATE COURSE</div>
                                    <svg class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="container mx-auto">
                            <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
                            <!-- Page content here -->

                            <!-- <div class="form-control pl-5 text-sm max-w-xl mb-10 mt-5" id="kodekelas">
                                    <div class="input-group mt-2">
                                        <input type="text" placeholder="course name" class="input max-w-xs border-gray-200 bg-gray-200 w-full" />
                                        {{-- <select class="select select-bordered hover:bg-base text-gray-400 bg-gray-200">
                                                    <option>Pengembangan Aplikasi Web</option>
                                                    <option>Pemrograman Basis Data</option>
                                                    <option>Statistika</option>
                                                    <option>Algoritma dan Struktur Data</option>
                                                </select> --}}
                                        <button class="btn btn-square">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div> -->

                            @foreach ($courses as $course)
                            <div class="card-normal shadow-lg ml-5 px-5 mr-5 mb-10">
                                <div class="card-body">
                                    <h2 class="card-title">{{$course->name}}</h2>
                                    <p>{{$course->code}} - <strong>{{$course->type}}</strong> - {{$course->learning_media}} - <strong>{{$course->course_credit}} SKS</strong> </p>
                                    <p class="pb-10">{{$course->short_description}}</p>
                                    <!-- <p class="pb-10">{{$course->study_material_summary}}</p> -->
                                    <br>
                                    <p>Created by {{ $course->creator()->find($course->creator_user_id)->name }}</p>

                                    <div class="pt-5 card-actions border-t-2">
                                        <p><strong>Minimal requirement:</strong> {{$course->minimal_requirement}}</p>
                                    </div>


                                    <!-- <div class="card-actions justify-start pt-3">

                                                <form action="{{route('courses.destroy', $course->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="m-4" value="{{ $course->id }}" onclick="return confirm('Yakin ingin menghapus data?');"><strong>Delete</strong></button>
                                                </form>
                                            </div> -->
                                    <div class="card-actions justify-start pt-3">
                                        <form action="{{ route('courses.show',$course->id) }}" method="get">
                                            <button class="text-blue-600 my-4 mr-4 pr-7" value="{{ $course->id }}"><strong>Open</strong></button>
                                        </form>
                                        <form action="{{ route('courses.edit',$course->id) }}" method="get">
                                            <button class="m-4 pl-96 ml-96" value="{{ $course->id }}"><strong>Edit</strong></button>
                                        </form>
                                        <form action="{{route('courses.destroy', $course->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="text-red-600 my-4 ml-4" value="{{ $course->id }}" onclick="return confirm('Yakin ingin menghapus data?');"><strong>Delete</strong></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </x-slot>
</x-app-layout>
