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
                        @foreach($apts as $apt)
                            @php($grade = $grades->where('assignment_plan_task_id',$apt->id)->first())
                            <p class="ml-9 my-5 text-lg"><b> {{$apt->criteria->title}} </b> </p>

                            <div class="btn-group my-5 justify-center">
                                @foreach($apt->criteria->criteriaLevels as $criteria)
                                    <div class="card w-44 h-36 bg-base border-2 my-1 rounded-lg mx-1">
                                        <div class="card-actions pr-5 mt-5 justify-end">
                                            <input type="radio" name="criteria_level_id{{ $loop->parent->index }}" value="{{ $criteria->id }}" @checked($grade && $criteria->id === $grade->criteria_level_id)/>
                                        </div>
                                        <div class="px-5 py-5">
                                            <p> <b> {{ $criteria->point }} </b> </p>
                                            <p>{{ $criteria->title }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        <div class="card-actions justify-end py-5 mr-9">
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
