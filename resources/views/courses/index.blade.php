<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Courses') }}
            </h2>
        </x-slot>

        <x-slot name="slot">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="container mx-auto">

                                <div class="drawer drawer-mobile">

                                    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />

                                    <!-- Page content here -->
                                    <div class="drawer-content flex flex-col">
                                        <div>
                                            <div class="text-sm breadcrumbs pl-5 pt-7 font-bold text-gray-600">
                                                <ul>
                                                    <li><a href="">Dashboard</a></li>
                                                    <li class="text-blue-600"><a href="">Courses</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="form-control pl-5 text-sm max-w-xl mb-0 mt-5" id="kodekelas">
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
                                        </div>

                                        @foreach ($courses as $course)
                                        <div class="card-normal w-full shadow-2xl ml-5 px-5 mt-10 mr-5">
                                            <div class="card-body">
                                                <h2 class="card-title">{{$course->name}}</h2>
                                                <p>{{$course->code}} - <strong>{{$course->type}}</strong> - {{$course->learning_media}} - <strong>{{$course->course_credit}} SKS</strong> </p>
                                                <p class="pb-10">{{$course->short_description}}</p>
                                                <div class="pt-10 card-actions border-t-2">
                                                    <p><strong>Minimal requirement:</strong> {{$course->minimal_requirement}}</p>
                                                </div>
                                                <div class="card-actions justify-end pt-5">
                                                    <form action="courses/{{ $course->id }}/edit" method="get">
                                                        <button class="text-blue-600 m-4" value="{{ $course->id }}"><strong>Edit</strong></button>
                                                    </form>
                                                    <form action="courses/{{ $course->id }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="m-4" value="{{ $course->id }}" onclick="return confirm('Yakin ingin menghapus data ?');"><strong>Delete</strong></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="drawer-side">
                                        <label for="my-drawer-2" class="drawer-overlay"></label>
                                        <ul class="menu p-4 overflow-y-auto w-40 text-primary-content font-semibold border-gray-300 border-r-2 bg-white">
                                            <!-- Sidebar content here -->
                                            <ul class="menu bg-base-100 h-5 w-5 rounded-box">
                                                <li>
                                                    <a>
                                                        <div class="grid grid-rows-2 gap-2">
                                                            <div>
                                                                <svg class="h-8 w-8 text-black" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" />
                                                                    <path d="M9 5H7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2V7a2 2 0 0 0 -2 -2h-2" />
                                                                    <rect x="9" y="3" width="6" height="4" rx="2" />
                                                                    <line x1="9" y1="12" x2="9.01" y2="12" />
                                                                    <line x1="13" y1="12" x2="15" y2="12" />
                                                                    <line x1="9" y1="16" x2="9.01" y2="16" />
                                                                    <line x1="13" y1="16" x2="15" y2="16" />
                                                                </svg>
                                                            </div>
                                                            <div class="text-blue-600 mt-3">COURSE</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('courses.create') }}">
                                                        <div class="grid grid-rows-2 gap-2">
                                                            <div>
                                                                <svg class="h-8 w-8 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                            </div>
                                                            <div class="text-blue-600">CREATE COURSE</div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>

    </x-app-layout>