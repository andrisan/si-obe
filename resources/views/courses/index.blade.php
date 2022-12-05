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
            <div class="flex justify-end pr-7">
                <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                    <div style="position: relative;" dusk="columns-dropdown">
                        <div>
                            <a href="{{ route('courses.create') }}" class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <div class="text-blue-600 pr-1">CREATE NEW COURSE</div>
                                <svg class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-1">
                <div class="drawer-content flex flex-col px-10 pt-5 border-l border-slate-500">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="py-5 container mx-auto">
                                <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />

                                @foreach ($courses as $course)
                                <div class="card-normal shadow-lg ml-5 px-5 mr-5 mb-10">
                                    <div class="card-body">
                                        <h2 class="card-title">{{$course->name}}</h2>
                                        <p>{{$course->code}} - <strong>{{$course->type}}</strong> - {{$course->learning_media}} - <strong>{{$course->course_credit}} SKS</strong> </p>
                                        <p class="pb-5">{{$course->short_description}}</p>
                                        <!-- <p class="pb-10">{{$course->study_material_summary}}</p> -->
                                        <div class="pt-5 card-actions border-t-2">
                                            <p>Created by {{ $course->creator()->find($course->creator_user_id)->name }}</p>
                                        </div>

                                        <div class="grid grid-cols-2 pt-5">
                                            <div>
                                            <form action="{{ route('courses.show',$course->id) }}" method="get">
                                                <button class="text-blue-600" value="{{ $course->id }}"><strong>Open Details</strong></button>
                                            </form>
                                            </div>
                                            <div class="flex justify-end">
                                                <form action="{{ route('courses.edit',$course->id) }}" method="get">
                                                    <button class="pr-10" value="{{ $course->id }}"><strong>Edit</strong></button>
                                                </form>
                                                <form action="{{route('courses.destroy', $course->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="text-red-600" value="{{ $course->id }}" onclick="return confirm('Yakin ingin menghapus data?');"><strong>Delete</strong></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>