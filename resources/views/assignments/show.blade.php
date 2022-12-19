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


                <div class="flex flex-row-reverse justify-between">

                    <div class="tombol justify-end flex flex-row gap-2 py-5 px-10">
                        <form action="{{ route('classes.assignments.edit', [$courseClass, $assignment]) }}"
                              method="get">
                            <button class="btn btn-active btn-warning w-24" value="">Edit</button>
                        </form>
                        <form method="POST"
                              action="{{ route('classes.assignments.destroy', [$courseClass, $assignment]) }}">
                            @csrf
                            @method('delete')

                            <button class="btn btn-active btn-error w-24"
                                    onclick="event.preventDefault(); confirm('Yakin ingin menghapus data?') && this.closest('form').submit();">
                                {{ __('Delete') }}
                            </button>
                        </form>
                    </div>
                    {{-- Ngelink ke Student Grades --}}
                    <div class="nilai py-5 px-10">
                        <form method="GET" action="{{ route('student-grades.index', [$assignment]) }}">
                            <input type="hidden" name="assignment_id" id="assignment_id" value="{{ $assignment->id}}">
                            <button class="btn btn-active  btn-success w-24">
                                Isi Nilai
                            </button>
                        </form>


                    </div>
                </div>


                {{-- End --}}

            </div>
        </div>
    </div>
</x-app-layout>
