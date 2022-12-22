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
        {{ Breadcrumbs::render('student-grades.index', $assignment) }}
        <div class="pb-8">
            <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
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
                    @foreach ($studentGrades as $grade)
                        <tr>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $grade->student_id_number }}</td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $grade->name }}</td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                <div class="flex justify-between">
                                    <span class="font-semibold">{{ $grade->total_student_point ?? 0 }}</span>
                                    <span class="text-gray-400"> / {{ $maxPoint }}</span>
                                </div>
                            </td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ ($grade->total_student_point ?? 0)/$maxPoint*100 }}</td>
                            <td
                                class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                <div class="flex flex-wrap space-x-4">
                                    @if(empty($grade->total_student_point))
                                        <a href="/student-grades/create?assignment_id={{ $assignment->id }}&user_id={{ $grade->student_user_id }}">
                                            <button class="text-blue-500">Create</button>
                                        </a>
                                    @else
                                        <a href="/student-grades/edit?assignment_id={{ $assignment->id }}&user_id={{ $grade->student_user_id }}">
                                            <button class="text-blue-500"><strong>Edit</strong></button>
                                        </a>

                                        <form method="POST"
                                              action=" {{ route('student-grades.destroy', 1) }}">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="assignmentId" value="{{ $assignment->id }}">
                                            <input type="hidden" name="userId" value="{{ $grade->student_user_id }}">
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
            </div>
        </div>
    </div>
</x-app-layout>
