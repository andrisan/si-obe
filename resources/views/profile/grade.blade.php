@section('pageTitle', 'My Grades')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Grades') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('profile.grade') }}
        <div class="pb-8">
            <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                <table class="border-collapse table-auto w-full bg-white table-striped relative">
                    <thead>
                    <tr class="text-left">
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">
                            No
                        </th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                            Class
                        </th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                            Grading Progress
                        </th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                            Grade
                        </th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                            Letter
                        </th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-80">
                            Grade Detail
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($userClassesGrade as $courseClass)
                        <tr>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                <a href="{{ route('classes.show', $courseClass) }}"
                                   class="text-blue-400">{{ $courseClass->name }}</a>
                                <p class="text-gray-400">{{ $courseClass->course->name }}</p>
                            </td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $courseClass->gradingProgress }}
                                %
                            </td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $courseClass->userGrade->point ?? 0 }}</td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $courseClass->userGrade->letterGrade ?? "-" }}</td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                @if($courseClass->assignments->isNotEmpty())
                                    <label for="pa-modal-{{ $courseClass->id }}" class="btn">Per assignment</label>
                                    <input type="checkbox" id="pa-modal-{{ $courseClass->id }}"
                                           class="modal-toggle m-2"/>
                                    <div class="modal mx-auto">
                                        <div class="modal-overlay relative mx-auto">
                                            <div class="modal-box mx-auto w-[80rem]  ">
                                                <div class="modal-header">
                                                    <h3 class="text-2xl font-semibold">Grade detail per assignment</h3>
                                                </div>
                                                <label for="pa-modal-{{ $courseClass->id }}"
                                                       class="btn btn-sm btn-circle absolute right-2 top-2 fixed">✕</label>
                                                <table class=" w-[100%]">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th class="text-lg font-bold" colspan="1"></th>
                                                        <th class="text-lg font-bold" colspan="1"></th>
                                                    </tr>
                                                    <tr class="">
                                                        <th>No</th>
                                                        <th class="w-80">Assignment</th>
                                                        <th>Grade</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($courseClass->assignments as $assignment)
                                                        <tr>
                                                            <td class="align-top py-2">{{ $loop->index + 1 }}</td>
                                                            <td class="text-gray-500 py-2">{{ $assignment->assignmentPlan->title }}
                                                                <a target="_blank" href="{{ route('classes.assignments.show', [$courseClass, $assignment]) }}"
                                                                   class="text-blue-500 text-sm"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                                            </td>
                                                            <td class="align-top py-2 text-center">{{ $assignment->perAssignmentGrade }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <label for="pl-modal-{{ $courseClass->id }}" class="btn">Per LLO</label>
                                    <input type="checkbox" id="pl-modal-{{ $courseClass->id }}"
                                           class="modal-toggle m-2"/>
                                    <div class="modal">
                                        <div class="modal-overlay relative mx-auto ">
                                            <div class=" modal-box mx-auto">
                                                <div class="modal-header">
                                                    <h3 class="text-2xl font-semibold">Grade detail per LLO</h3>
                                                </div>
                                                <label for="pl-modal-{{ $courseClass->id }}"
                                                       class="btn btn-sm btn-circle absolute right-2 top-2 fixed">✕</label>
                                                <table class="w-[100%]">
                                                    <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th class="w-96">LLO</th>
                                                        <th class="w-24">Grade</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php($llos = $courseClass->syllabus->lessonLearningOutcomes)
                                                    @foreach ($llos as $llo)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $llo->description }}</td>
                                                            <td>{{ $llo->perLLOGrade }} %</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <p class="text-gray-400 py-3 px-6 my-2">This class has no assignments</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
