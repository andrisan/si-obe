<?php
use Illuminate\Support\Facades\Gate;

$ilos = $syllabus->intendedLearningOutcomes()->orderBy('position')->get();
$clos = $syllabus->courseLearningOutcomes()->orderBy('position')->get();
$llos = $syllabus->lessonLearningOutcomes()->orderBy('position')->get();
$learningPlans = $syllabus->learningPlans;
$assignmentPlans = $syllabus->assignmentPlans;
?>

@section('pageTitle', $syllabus->title)

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-start gap-4">
            <x-back-link/>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $syllabus->title }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 pb-6 lg:px-8">
        {!! Gate::allows('is-teacher') || Gate::allows('is-admin') ? Breadcrumbs::render('syllabi.show', $syllabus): "<br/>";  !!}
        <div class="flex flex-row justify-between mb-3 sm:px-0 -mr-2 sm:-mr-3">
            <h2 class="text-xl font-extrabold px-2 py-1">
                Basic Information
            </h2>
            @canany(['is-teacher','is-admin'])
                <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                    <a href="{{ route('syllabi.edit', $syllabus) }}"
                       class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="pr-1"><i class="fa fa-edit"></i> Edit Basic Information</span>
                    </a>
                </div>
            @endcanany
        </div>
        <div class="py-2">
            <div class="w-full h-full overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white p-4 shadow-sm rounded-sm">
                    <div class="p-4">
                        <div class="text-base-content">
                            <h2 class="text-xl font-bold text-gray-500 px-2 py-2">
                                Syllabus Information
                            </h2>
                            @php
                                $syllabusBasicInfo = [
                                    'Title' => $syllabus->title,
                                    'Author' => $syllabus->author,
                                    'Head of Study Program' => $syllabus->head_of_study_program,
                                ];
                            @endphp
                            <div class="px-2">
                                <table class="table-auto w-full">
                                    <tbody>
                                    @foreach($syllabusBasicInfo as $key => $value)
                                        <tr>
                                            <td class="px-4 py-2 font-semibold w-64 align-top">{{ $key }}</td>
                                            <td class="px-4 py-2 w-8 align-top">:</td>
                                            <td class="px-4 py-2">{{ $value }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <h2 class="text-xl font-bold text-gray-500 px-2 py-2 mt-5">
                                Course Information
                            </h2>
                            @php
                            $course = $syllabus->course;
                            $courseInfo = [
                                'Course Code' => $course->code,
                                'Course Name' => $course->name,
                                'Course Type' => ucfirst($course->type),
                                'Description' => $course->short_description,
                                'Course Credit' => $course->course_credit,
                                'Practicum Credit' => $course->lab_credit,
                                'Minimal Requirement' => $course->minimal_requirement,
                                'Study Material Summary' => $course->study_material_summary,
                                'Learning Media' => $course->learning_media,
                            ];
                            @endphp
                            <div class="px-2">
                                <table class="table-auto w-full">
                                    <tbody>
                                    @foreach($courseInfo as $key => $value)
                                        <tr>
                                            <td class="px-4 py-2 font-semibold w-64 align-top">{{ $key }}</td>
                                            <td class="px-4 py-2 w-8 align-top">:</td>
                                            <td class="px-4 py-2">{{ $value }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex flex-row justify-between mb-3 sm:px-0 -mr-2 sm:-mr-3">
                <h2 class="text-xl font-extrabold px-2 py-1">
                    Intended Learning Outcome (ILO)
                </h2>
                @canany(['is-teacher','is-admin'])
                    <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                        <x-button-link href="{{ route('syllabi.ilos.create',[$syllabus]) }}">
                            <i class="fa fa-plus"></i> {{ __('Create New ILO') }}
                        </x-button-link>
                    </div>
                @endcanany
            </div>
            <div class="py-2">
                @if($ilos->count() > 0)
                    <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                        <table class="border-collapse table-auto w-full bg-white table-striped relative">
                            <thead>
                            <tr class="text-left">
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">
                                    No
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-32">
                                    Code
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                                    Description
                                </th>
                                @canany(['is-teacher','is-admin'])
                                    <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-32">
                                        Action
                                    </th>
                                @endcanany
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($ilos as $ilo)
                                <tr>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $ilo->code }}</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $ilo->description }}</td>
                                    @canany(['is-teacher','is-admin'])
                                        <td
                                            class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                            <div class="flex flex-wrap space-x-4">
                                                <a href="{{ route('syllabi.ilos.edit', [$syllabus, $ilo]) }}"
                                                   class="text-blue-500"><i class="fa fa-edit"></i></a>
                                                <form method="POST"
                                                      action="{{ route('syllabi.ilos.destroy', [$syllabus, $ilo]) }}">
                                                    @csrf
                                                    @method('delete')

                                                    <button class="text-red-500"
                                                            onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    @endcanany
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="w-full h-full overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="bg-white p-5 shadow-sm rounded-sm text-center">
                            <p class="text-gray-500">No intended learning outcomes found.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="pt-5">
            <div class="flex flex-row justify-between mb-3 sm:px-0 -mr-2 sm:-mr-3">
                <h2 class="text-xl font-extrabold px-2 py-1">
                    Course Learning Outcome (CLO)
                </h2>
                @canany(['is-teacher','is-admin'])
                    <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                        <x-button-link href="{{ route('syllabi.clos.create',[$syllabus]) }}">
                            <i class="fa fa-plus"></i> {{ __('Create New CLO') }}
                        </x-button-link>
                    </div>
                @endcanany
            </div>
            <div class="py-2">
                @if($clos->count() > 0)
                    <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                        <table class="border-collapse table-auto w-full bg-white table-striped relative">
                            <thead>
                            <tr class="text-left">
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">
                                    No
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-32">
                                    Code
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                                    Description
                                </th>
                                @canany(['is-teacher','is-admin'])
                                    <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-32">
                                        Action
                                    </th>
                                @endcanany
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($clos as $clo)
                                <tr>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $clo->code ?? "-" }}</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                        {{ $clo->description }} {{ empty($clo->intendedLearningOutcome) ? "" : "[".$clo->intendedLearningOutcome->code."]" }}
                                    </td>
                                    @canany(['is-teacher','is-admin'])
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                            <div class="flex flex-wrap space-x-4">
                                                <a href="{{ route('syllabi.clos.edit', [$syllabus, $clo]) }}"
                                                   class="text-blue-500"><i class="fa fa-edit"></i></a>
                                                <form method="POST"
                                                      action="{{ route('syllabi.clos.destroy', [$syllabus, $clo]) }}">
                                                    @csrf
                                                    @method('delete')

                                                    <button class="text-red-500"
                                                            onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    @endcanany
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="w-full h-full overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="bg-white p-5 shadow-sm rounded-sm text-center">
                            <p class="text-gray-500">No course learning outcomes found.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="pt-5">
            <div class="flex flex-row justify-between mb-3 sm:px-0 -mr-2 sm:-mr-3">
                <h2 class="text-xl font-extrabold px-2 py-1">
                    Lesson Learning Outcome (LLO)
                </h2>
                @canany(['is-teacher','is-admin'])
                    <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                        <x-button-link href="{{ route('syllabi.llos.create', $syllabus) }}">
                            <i class="fa fa-plus"></i> {{ __('Create New LLO') }}
                        </x-button-link>
                    </div>
                @endcanany
            </div>
            <div class="py-2">
                @if($llos->count() > 0)
                    <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                        <table class="border-collapse table-auto w-full bg-white table-striped relative">
                            <thead>
                            <tr class="text-left">
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">
                                    No
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-32">
                                    Code
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                                    Description
                                </th>
                                @canany(['is-teacher','is-admin'])
                                    <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-32">
                                        Action
                                    </th>
                                @endcanany
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($llos as $llo)
                                <tr>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $llo->code ?? "-" }}</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                        {{ $llo->description }} {{ empty($llo->courseLearningOutcome) ? "" : "[".$llo->courseLearningOutcome->code."]" }}
                                    </td>
                                    @canany(['is-teacher','is-admin'])
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                            <div class="flex flex-wrap space-x-4">
                                                <a href="{{ route('syllabi.llos.edit', [$syllabus, $llo]) }}"
                                                   class="text-blue-500"><i class="fa fa-edit"></i></a>
                                                <form method="POST"
                                                      action="{{ route('syllabi.llos.destroy', [$syllabus, $llo]) }}">
                                                    @csrf
                                                    @method('delete')

                                                    <button class="text-red-500"
                                                            onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    @endcanany
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="w-full h-full overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="bg-white p-5 shadow-sm rounded-sm text-center">
                            <p class="text-gray-500">No lesson learning outcomes found.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="pt-5">
            <div class="flex flex-row justify-between mb-3 sm:px-0 -mr-2 sm:-mr-3">
                <h2 class="text-xl font-extrabold px-2 py-1">
                    {{ __('Weekly Learning Plan') }}
                </h2>
                @canany(['is-teacher','is-admin'])
                    <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                        <a href="{{ route('syllabi.learning-plans.index', $syllabus) }}"
                           class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="pr-1"><i class="fa fa-indent"></i> Manage Weekly Learning Plans</span>
                        </a>
                    </div>
                @endcanany
            </div>
            <div class="py-2">
                @if($learningPlans->count() > 0)
                    <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                        <table class="border-collapse table-auto w-full bg-white table-striped relative">
                            <thead>
                            <tr class="text-left">
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">
                                    Week
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">
                                    LLO
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">
                                    Study Material
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                                    Learning Method
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                                    Estimated Time
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($learningPlans as $learningPlan)
                                <tr>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $learningPlan->week_number }}</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $learningPlan->lessonLearningOutcome->description }}</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $learningPlan->study_material }}</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $learningPlan->learning_method }}</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $learningPlan->estimated_time }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="w-full h-full overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="bg-white p-5 shadow-sm rounded-sm text-center">
                            <p class="text-gray-500">
                                No weekly learning plan found.
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        @canany(['is-teacher','is-admin'])
            <div class="pt-5">
                <div class="flex flex-row justify-between mb-3 sm:px-0 -mr-2 sm:-mr-3">
                    <h2 class="text-xl font-extrabold px-2 py-1">
                            <?php
                            // count total max_point from criteria in each assignmentPlanTasks
                            $totalMaxPoint = 0;
                            $assignmentPlans = $syllabus->assignmentPlans;
                            foreach ($assignmentPlans as $assignmentPlan) {
                                $assignmentPlanTasks = $assignmentPlan->assignmentPlanTasks;
                                foreach ($assignmentPlanTasks as $assignmentPlanTask) {
                                    $totalMaxPoint += $assignmentPlanTask->criteria->max_point ?? 0;
                                }
                            }
                            ?>
                        {{ __('Assignment Plan') }} <span class="badge badge-primary p-4">{{ $assignmentPlans->count() }} assignment(s) with {{ $totalMaxPoint }} collectible point(s)</span>
                    </h2>
                    <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                        <x-button-link href="{{ route('syllabi.assignment-plans.create', $syllabus) }}">
                            <i class="fa fa-plus"></i> {{ __('Create New Assignment Plan') }}
                        </x-button-link>
                    </div>
                </div>
                <div class="py-2">
                    @if($assignmentPlans->count() > 0)
                        <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                            @foreach ($assignmentPlans as $assignmentPlan)
                                <div class="p-5 border border-gray-200 rounded m-4">
                                    <div class="flex flex-row justify-end gap-3 pr-2">
                                        <a href="{{ route('syllabi.assignment-plans.edit', [$syllabus, $assignmentPlan]) }}"
                                           class="text-blue-500"><i class="fa fa-edit"></i></a>
                                        <form method="POST"
                                              action="{{ route('syllabi.assignment-plans.destroy', [$syllabus, $assignmentPlan]) }}">
                                            @csrf
                                            @method('delete')

                                            <button class="text-red-500"
                                                    onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="text-center pb-6">
                                        <h3 class="text-2xl font-bold p-3">{{ __("Assignment Plan") }}</h3>
                                        <h3 class="text-xl font-semibold">{{ $assignmentPlan->title }}</h3>
                                    </div>
                                    <div class="px-4">
                                        <table class="border-collapse table-auto w-full bg-white relative">
                                            <tbody>
                                            <tr>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">Objective
                                                </td>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                                    : {{ $assignmentPlan->objective }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">LLO</td>
                                                    <?php
                                                    $assignmentPlanLearningOutcomes = $assignmentPlan->assignmentPlanTasks->pluck('criteria')->pluck('lessonLearningOutcome')->unique()
                                                    ?>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                                    @if($assignmentPlanLearningOutcomes->count() > 0)
                                                        <ul class="list-none list-inside">
                                                            @foreach($assignmentPlanLearningOutcomes as $assignmentPlanLearningOutcome)
                                                                <li>
                                                                    <span class="text-gray-400">[ {{ $assignmentPlanLearningOutcome->code }} ]</span> {{ $assignmentPlanLearningOutcome->description }}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <span
                                                            class="badge badge-ghost p-3">Please set the grading criteria for the assignment plan tasks</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">Group
                                                    Assignment
                                                </td>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                                    : {{ $assignmentPlan->is_group_assignment ? "yes": "no" }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">Assignment
                                                    Style
                                                </td>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                                    : {{ $assignmentPlan->assignment_style }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">Description
                                                </td>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                                    : {{ $assignmentPlan->description }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">Output
                                                    Instruction
                                                </td>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                                    : {{ $assignmentPlan->output_instruction }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">Submission
                                                    Instruction
                                                </td>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                                    : {{ $assignmentPlan->submission_instruction }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">Deadline
                                                    Instruction
                                                </td>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                                    : {{ $assignmentPlan->deadline_instruction }}</td>
                                            </tr>
                                            @php($assignmentPlanTasks = $assignmentPlan->assignmentPlanTasks)
                                            <tr>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">Grading
                                                    Rubric
                                                </td>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                                    @if($assignmentPlan->rubric)
                                                        : <a class="text-blue-600 hover:text-blue-700"
                                                             href="{{ route('rubrics.show', $assignmentPlan->rubric) }}">{{ $assignmentPlan->rubric->title }}</a>
                                                        <form method="POST"
                                                              action="{{ route('rubrics.destroy', $assignmentPlan->rubric) }}"
                                                              class="inline">
                                                            @csrf
                                                            @method('delete')

                                                            <button class="text-red-500 px-3"
                                                                    onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                                                            <a href="{{ route('rubrics.create', ["assignment_plan" => $assignmentPlan->id]) }}"
                                                               class="bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                            <span class="pr-1"><i class="fa fa-plus"
                                                                                  aria-hidden="true"></i> Create Rubric</span>
                                                            </a>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">Total
                                                    Points
                                                </td>
                                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                                    : {{ $assignmentPlanTasks->sum('criteria.max_point') }}</td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <div class="flex flex-row justify-between py-6">
                                            <p class="font-semibold">{{ __("Assignment Plan Tasks") }}</p>
                                            <div class="order-5">
                                                <x-button-link
                                                    href="{{ route('syllabi.assignment-plans.assignment-plan-tasks.create', [$syllabus, $assignmentPlan]) }}">
                                                    <i class="fa fa-plus"></i> {{ __('Create New Task') }}
                                                </x-button-link>
                                            </div>
                                        </div>
                                        @if($assignmentPlanTasks->count() > 0)
                                            <div
                                                class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                                                <table
                                                    class="border-collapse table-auto w-full bg-white table-striped relative">
                                                    <thead>
                                                    <tr class="text-left">
                                                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">
                                                            No
                                                        </th>
                                                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-32">
                                                            Code
                                                        </th>
                                                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-32">
                                                            LLO
                                                        </th>
                                                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-32">
                                                            Grading Criteria
                                                        </th>
                                                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                                                            Task Description
                                                        </th>
                                                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-32">
                                                            Action
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($assignmentPlanTasks as $assignmentPlanTask)
                                                        <tr>
                                                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                                                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $assignmentPlanTask->code }}</td>
                                                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $assignmentPlanTask->criteria->lessonLearningOutcome->code ?? "-" }}</td>
                                                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $assignmentPlanTask->criteria->title ?? "-" }}</td>
                                                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $assignmentPlanTask->description }}</td>
                                                            <td
                                                                class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                                                <div class="flex flex-wrap space-x-4">
                                                                    <a href="{{ route('syllabi.assignment-plans.assignment-plan-tasks.edit', [$syllabus, $assignmentPlan, $assignmentPlanTask]) }}"
                                                                       class="text-blue-500"><i class="fa fa-edit"></i></a>
                                                                    <form method="POST"
                                                                          action="{{ route('syllabi.assignment-plans.assignment-plan-tasks.destroy', [$syllabus, $assignmentPlan, $assignmentPlanTask]) }}">
                                                                        @csrf
                                                                        @method('delete')

                                                                        <button class="text-red-500"
                                                                                onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <div class="p-8">
                                                <p class="text-center text-gray-500">{{ __("No assignment plan tasks yet.") }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="w-full h-full overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="bg-white p-5 shadow-sm rounded-sm text-center">
                                <p class="text-gray-500">
                                    No assignment plan found.
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endcanany
    </div>

</x-app-layout>
