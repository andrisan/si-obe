@section('pageTitle', "Courses")

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('courses.index') }}
        <div class="pb-8">
            <div class="flex flex-row sm:justify-end mb-3 px-4 sm:px-0 -mr-2 sm:-mr-3">
                <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                    <x-button-link href="{{ route('courses.create') }}">
                        <i class="fa fa-plus"></i> {{ __('Create New Course') }}
                    </x-button-link>
                </div>
            </div>
            @if($courses->count() > 0)
                @foreach ($courses as $course)
                    <div class="card bg-base-100 shadow-xl mb-5">
                        <div class="card-body">
                            <h2 class="card-title">{{$course->name}}</h2>
                            <p>{{$course->code}} - <strong>{{$course->type}}</strong> - {{$course->learning_media}} - <strong>{{$course->course_credit}} credits</strong> </p>
                            <p class="pb-5">{{$course->short_description}}</p>
                            <div class="pt-5 card-actions border-t-2">
                                <p>Created by <a href="{{ route('users.show', $course->creator) }}" class="text-blue-500 hover:text-blue-700">{{ $course->creator->name }}</a></p>
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
                @endforeach
            @else
            @endif
        </div>
    </div>
</x-app-layout>
