@section('pageTitle', $grades->first()->user->name)

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold   text-4xl text-gray-800 leading-tight">
            {{$grades->first()->user->name}}
        </h2>
    </x-slot>

    <!-- cek -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class=""></div>
                    <form method="post" action="{{route('student-grades.update', $grades->first()->id) }}">
                        <input type="hidden" name="assignment_id" value="{{ $grades->first()->assignment_id }}">
                        <input type="hidden" name="user_id" value="{{ $grades->first()->student_user_id }}">
                        @csrf
                        @method('patch')
                        @foreach($grades as $grade)
                        <p class="mb-5"> {{$grade->assignmentPlanTask->criteria->title}} </p>
                        <div class="btn-group mb-10 justify-center">
                            @foreach($grade->range as $criteria)
                            <input type="radio" name="criteria_level_id{{ $loop->parent->index }}" data-title="{{ $criteria->point }}" class="btn px-16" value="{{ $criteria->id }}" @checked($criteria->id === $grade->criteria_level_id)/>
                            @endforeach
                        </div>
                        @endforeach

                        <div class="card-actions justify-end pt-5">
                            {{-- <form action="{{ route('student-grades.index') }}">--}}
                            <button class="btn btn-outline" type="submit">Save</button>

                            {{-- <form action="{{ route('student-grades.index') }}">--}}
                            <a class="btn btn-outline" href="/student-grades/?assignment_id={{ $grades->first()->assignment_id }}">Cancel</a>

                        </div>

                    </form>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>