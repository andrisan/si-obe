@section('pageTitle', "Grade - ". $student->name)

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-start items-start gap-4">
            <x-back-link />
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Student Grade') }}
                </h2>
                <table class="mt-5">
                    <tbody>
                    <tr>
                        <td>Student</td>
                        <td>: {{ $student->name }}</td>
                    </tr>
                    <tr>
                        <td><span class="mr-10">Assignment</span></td>
                        <td>: {{ $assignment->assignmentPlan->title }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto pb-10 sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('student-grades.create', $assignment) }}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-white border-b border-gray-200">
                <form method="post" action="{{ route('student-grades.store') }}">
                    <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    @csrf

                    <div class="border rounded m-5">
                        @foreach($apts as $apt)
                            <div class="p-5 {{ !$loop->last ? "border-b": "" }}">
                                <p class="text-lg font-semibold">{{$apt->criteria->title}}</p>
                                <p class="text-sm text-gray-500">{{$apt->criteria->description}}</p>
                                <p class="pt-5 font-bold">Task:</p>
                                <div class="flex justify-start gap-4 px-5">
                                    <p class="min-w-fit">[{{$apt->code}}]</p>
                                    <p class="text-gray-500">{{ $apt->description }} </p>
                                </div>

                                <div class="btn-group my-5 justify-center">
                                    @if($apt->criteria->criteriaLevels->isEmpty())
                                        @php($rubric = $assignment->assignmentPlan->rubric)
                                        <div class="border border-gray-300 rounded w-full p-7 text-center text-gray-400 mx-10">
                                            Please define levels for this criteria <a href="{{ route("rubrics.show", $rubric) }}" class="text-blue-500">here</a>
                                        </div>
                                    @else
                                        @foreach($apt->criteria->criteriaLevels as $criteria)
                                            <div class="card w-44 h-36 bg-base border-2 my-1 rounded-lg mx-1">
                                                <div class="card-actions pr-5 mt-5 justify-end">
                                                    <input type="radio" name="criteria_level_id{{ $loop->parent->index }}" value="{{ $criteria->id }}" />
                                                </div>
                                                <div class="px-5 py-5">
                                                    <p> <b> {{ $criteria->point }} </b> </p>
                                                    <p>{{ $criteria->title }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-4 p-4 space-x-2">
                        <button type="submit" class="btn btn-sm px-7">
                            Save
                        </button>
                        <a href="{{ route('student-grades.index', ['assignment_id' => $assignment->id]) }}">{{ __('Cancel') }}</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
