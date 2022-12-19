@section('pageTitle', $syllabus->title)

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $syllabus->title }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 pb-6 lg:px-8">
        {{ Breadcrumbs::render('syllabi.show', $syllabus) }}
        <div class="flex flex-row justify-between mb-3 sm:px-0 -mr-2 sm:-mr-3">
            <h2 class="text-xl font-extrabold px-2 py-1">
                Basic Syllabus Information
            </h2>
            <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                <a href="{{ route('syllabi.edit', $syllabus) }}" class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="pr-1"><i class="fa fa-edit"></i> Edit Basic Information</span>
                </a>
            </div>
        </div>
        <div class="py-2">
            <div class="w-full h-full overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white p-4 shadow-sm rounded-sm">
                    <div class="p-4">
                        <div class="text-base-content">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Title</div>
                                <div class="px-4 py-2">: {{ $syllabus->title }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Course Name</div>
                                <div class="px-4 py-2">: {{ $syllabus->course->name }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Author</div>
                                <div class="px-4 py-2">: {{ $syllabus->author }}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Head of Study Program</div>
                                <div class="px-4 py-2">: {{ $syllabus->head_of_study_program }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex flex-row justify-between mb-3 sm:px-0 -mr-2 sm:-mr-3">
                <h2 class="text-xl font-extrabold px-2 py-1">
                    Intended Learning Outcomes
                </h2>
                <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                    <a href="{{ route('syllabi.ilos.index', $syllabus) }}" class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="pr-1"><i class="fa fa-indent"></i> Manage ILOs</span>
                    </a>
                </div>
            </div>
            <div class="py-2">
            @if($ilos->count() > 0)
                <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                    <table class="border-collapse table-auto w-full bg-white table-striped relative">
                        <thead>
                        <tr class="text-left">
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">No</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($ilos as $ilo)
                            <tr>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $ilo->description ?? "-" }}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="w-full h-full overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white p-5 shadow-sm rounded-sm text-center">
                        <p class="text-gray-500">No intended learning outcomes found.</p>
                        <a href="{{ route('syllabi.ilos.create', [$syllabus]) }}" class="w-32 bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="pr-1"><i class="fa fa-plus"></i> Add ILOs</span>
                        </a>
                    </div>
                </div>
            @endif
            </div>
        </div>

        <div class="pt-5">
            <div class="flex flex-row justify-between mb-3 sm:px-0 -mr-2 sm:-mr-3">
                <h2 class="text-xl font-extrabold px-2 py-1">
                    Course Learning Outcomes
                </h2>
            </div>
            <div class="py-2">
            @if($clos->count() > 0)
                <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                    <table class="border-collapse table-auto w-full bg-white table-striped relative">
                        <thead>
                        <tr class="text-left">
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">No</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($clos as $clo)
                            <tr>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $clo->description ?? "-" }}</td>

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
                    Lesson Learning Outcomes
                </h2>
            </div>
            <div class="py-2">
            @if($llos->count() > 0)
                <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                    <table class="border-collapse table-auto w-full bg-white table-striped relative">
                        <thead>
                        <tr class="text-left">
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">No</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($llos as $llo)
                            <tr>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $llo->description ?? "-" }}</td>

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
                <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                    <a href="{{ route('syllabi.learning-plans.index', $syllabus) }}" class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="pr-1"><i class="fa fa-indent"></i> Manage Weekly Learning Plans</span>
                    </a>
                </div>
            </div>
            <div class="py-2">
                @if($learningPlans->count() > 0)
                    <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                        <table class="border-collapse table-auto w-full bg-white table-striped relative">
                            <thead>
                            <tr class="text-left">
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">Week</th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">LLO</th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">Study Material</th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">Learning Method</th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">Estimated Time</th>
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

        <div class="pt-5">
            <div class="flex flex-row justify-between mb-3 sm:px-0 -mr-2 sm:-mr-3">
                <h2 class="text-xl font-extrabold px-2 py-1">
                    {{ __('Assignment Plan') }}
                </h2>
                <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                    <a href="{{ route('syllabi.assignment-plans.index', $syllabus) }}" class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="pr-1"><i class="fa fa-indent"></i> Manage Assignment Plans</span>
                    </a>
                </div>
            </div>
            <div class="py-2">
                @if($assignmentPlans->count() > 0)
                    <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                        @foreach ($assignmentPlans as $assignmentPlan)
                        <div class="p-5">
                            <div class="text-center p-6">
                                <h3 class="text-2xl font-bold p-3">{{ __("Assignment Plan") }}</h3>
                                <h3 class="text-xl font-semibold">{{ $assignmentPlan->title }}</h3>
                            </div>
                            <div class="px-4">
                                <table class="border-collapse table-auto w-full bg-white relative">
                                    <tbody>
                                    <tr>
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">Objective</td>
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">: {{ $assignmentPlan->objective }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">LLO</td>
                                        <?php
                                            $assignmentPlanLearningOutcomes = $assignmentPlan->assignmentPlanTasks->map(function ($assignmentPlanTask) {
                                                return $assignmentPlanTask->criteria->lessonLearningOutcome->description;
                                            })->flatten();
                                        ?>
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">:
                                            @if($assignmentPlanLearningOutcomes->count() > 0)
                                                {{ $assignmentPlanLearningOutcomes->implode(', ') }}
                                            @else
                                                <span class="badge badge-ghost p-3">Please set LLO in the rubric</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">Group Assignment</td>
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">: {{ $assignmentPlan->is_group_assignment ? "yes": "no" }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">Assignment Style</td>
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">: {{ $assignmentPlan->assignment_style }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">Description</td>
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">: {{ $assignmentPlan->description }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">Output Instruction</td>
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">: {{ $assignmentPlan->output_instruction }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">Submission Instruction</td>
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">: {{ $assignmentPlan->submission_instruction }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">Deadline Instruction</td>
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">: {{ $assignmentPlan->deadline_instruction }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">Grading Rubric</td>
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                            @if($assignmentPlan->rubric)
                                            : <a class="text-blue-600 hover:text-blue-700" href="{{ route('rubrics.show', $assignmentPlan->rubric) }}">{{ $assignmentPlan->rubric->title }}</a>
                                            @else
                                                <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                                                    <a href="{{ route('rubrics.create', ["assignment_plan" => $assignmentPlan->id]) }}" class="bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        <span class="pr-1"><i class="fa fa-plus" aria-hidden="true"></i> Create Rubric</span>
                                                    </a>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if(!$loop->last)
                            <div class="divider"></div>
                        @endif
                    @endforeach
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
    </div>

</x-app-layout>
