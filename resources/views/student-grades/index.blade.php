@section('pageTitle', "Student Grades")

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-start items-start gap-4">
            <x-back-link />
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Student Grades') }}
                </h2>
                <p>Assignment: {{ $assignment->assignmentPlan->title }}</p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('student-grades.index', $courseClass, $assignment) }}
        <div class="pb-8">
            <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                @if(empty($assignment->assignmentPlan->rubric))
                    <p class="text-center text-gray-500 py-5">
                        Please create a rubric for "{{ $assignment->assignmentPlan->title }}" assignment plan in the <a href="{{ route('syllabi.show', $assignment->assignmentPlan->syllabus) }}" class="text-blue-500">Syllabus</a> of this class.
                    </p>
                @elseif($assignment->assignmentPlan->rubric->criterias->isEmpty())
                    <p class="text-center text-gray-500 py-5">
                        @php($rubric = $assignment->assignmentPlan->rubric)
                        Please add criteria and its level to the rubric of <a href="{{ route("rubrics.show", $rubric) }}" class="text-blue-500">"{{ $rubric->title }}"</a>.
                    </p>
                @elseif($studentWithGrades->isEmpty())
                    <p class="text-center text-gray-500 py-5">
                        No student enrolled in this class.
                    </p>
                @elseif($assignment->assignmentPlan->assignmentPlanTasks->isEmpty())
                    <p class="text-center text-gray-500 py-5">
                        Please add tasks to the assignment plan "{{ $assignment->assignmentPlan->title }}" in the <a href="{{ route('syllabi.show', $assignment->assignmentPlan->syllabus) }}" class="text-blue-500">Syllabus</a> of this class.
                    </p>
                @else
                <table class="border-collapse table-auto w-full bg-white table-striped relative">
                    <thead>
                    <tr class="text-left">
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">
                            No
                        </th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                            ID
                        </th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                            Student Name
                        </th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-32">
                            Rubric
                        </th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                            Grade
                        </th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-48">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($studentWithGrades as $student)
                        @php($collectedPoints = $student->total_grade)
                        <tr>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $student->studentData->student_id_number }}</td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $student->name }}</td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                <div class="flex justify-between">
                                    @if($student->student_grade_id === null)
                                        <p class="text-gray-500 text-sm">-</p>
                                    @else
                                        <span class="font-semibold">{{ $collectedPoints }}</span>
                                        <span class="text-gray-400"> / {{ $maxPoint }}</span>
                                    @endif
                                </div>
                            </td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                @if($student->student_grade_id === null)
                                    <p class="text-gray-500 text-sm">Not Graded</p>
                                @else
                                    {{ $maxPoint == 0 ? 0 : round($collectedPoints/$maxPoint*100, 2) }}
                                @endif
                            </td>
                            <td
                                class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                <div class="flex flex-wrap space-x-4">
                                    @if($student->student_grade_id === null)
                                        <a href="{{ route('classes.assignments.student-grades.create', [$courseClass, $assignment, "std" => $student->id]) }}">
                                            <button class="text-blue-500">Create</button>
                                        </a>
                                    @else
                                        <a href="{{ route('classes.assignments.student-grades.edit', [$courseClass, $assignment, $student->student_grade_id]) }}">
                                            <button class="text-blue-500"><strong>Edit</strong></button>
                                        </a>

                                        <form method="POST"
                                              action=" {{ route('classes.assignments.student-grades.destroy', [$courseClass, $assignment, $student->student_grade_id]) }}">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                                            <button class="text-red-500"
                                                    onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
