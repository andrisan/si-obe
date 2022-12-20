@php use Carbon\Carbon; @endphp

@section('pageTitle', "$courseClass->name Assigment Detail")

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row gap-4">
            <div class="p-1">
                <a href="{{ route_back_with_fallback('classes.show', $courseClass) }}">
                    <i class="fa fa-arrow-left"></i>
                </a>
            </div>
            <div class="ke-2 mt-[4px]">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __(' Assignment Detail')}}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Session::has('error'))
                <div class="alert alert-error shadow-lg my-3">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>{{ Session::get('error') }}</span>
                    </div>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex ">
                    <div class="flex flex-row gap-5">
                        <div class="grid place-content-center">
                            <div class="grid bg-neutral w-14 h-14 rounded-full place-content-center">
                                <img
                                    src="https://cdn-icons-png.flaticon.com/512/207/207470.png?w=740&t=st=1669015753~exp=1669016353~hmac=2991b15d942ead62d75ed6ccc0e0eb7836618254cd37e0112ac7b3e943abed75"
                                    alt="" class="w-7">
                            </div>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold mb-2">{{ $assignment->assignmentPlan->title ??null }}</h1>
                            <p>Due Date : {{ Carbon::parse( $assignment->due_date)->format("M d, Y") }}</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 bg-white border-b border-gray-200 flex ">
                    <div class="text-base">
                        <h1>{{ $assignment->note }}</h1>
                    </div>
                </div>

                @can('is-teacher')
                <div class="flex flex-row-reverse justify-between">
                    <div class="justify-end flex flex-row gap-4 py-5 px-10">
                        <a href="{{ route('classes.assignments.edit', [$courseClass, $assignment]) }}"
                           class="text-blue-500">Edit</a>
                        <form method="POST" action="{{ route('classes.assignments.destroy', [$courseClass, $assignment]) }}">
                            @csrf
                            @method('delete')

                            <button class="text-red-500"
                                    onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                                {{ __('Delete') }}
                            </button>
                        </form>
                    </div>

                    <div class="nilai py-5 px-10">
                        <form method="GET" action="{{ route('student-grades.index', [$assignment]) }}">
                            <input type="hidden" name="assignment_id" id="assignment_id" value="{{ $assignment->id}}">
                            <button type="submit" class="btn btn-sm px-7">
                                {{ __('Student Grades') }}
                            </button>
                        </form>
                    </div>
                </div>
                @endcan

                {{-- End --}}

            </div>
        </div>
    </div>
</x-app-layout>
