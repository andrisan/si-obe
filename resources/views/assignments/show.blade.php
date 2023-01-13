@php use Carbon\Carbon; @endphp

@section('pageTitle', "$courseClass->name Assigment Detail")
@php($assignmentPlan = $assignment->assignmentPlan)
@php($assigmentTasks = $assignmentPlan->assignmentPlanTasks)

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row gap-4">
            <x-back-link/>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __(' Assignment Detail')}}
            </h2>
        </div>
    </x-slot>

    <div class="pb-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{ Breadcrumbs::render('assignments.show', $courseClass, $assignment) }}
            @if(Session::has('error'))
                <div class="alert alert-error shadow-lg my-3">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>{{ Session::get('error') }}</span>
                    </div>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
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
                                <p>
                                    @if(empty($assignment->due_date))
                                        <span class="text-gray-500">No due date</span>
                                    @else
                                        Due Date : {{ Carbon::parse($assignment->due_date)->format("M d, Y") }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        @if($assignmentPlan->is_group_assignment)
                            <div class="badge badge-primary p-4 w-[300px]">Group Assignment</div>
                        @endif
                    </div>
                </div>

                <div class="p-6 bg-white border-b border-gray-200 flex ">
                    <div class="text-base">
                        <p>{{ $assignmentPlan->description }}</p>
                        <div class="pt-5">
                            <h1 class="text-xl font-bold mb-2">Submission instruction</h1>
                            <p class="pl-5">{{ $assignmentPlan->submission_instruction }}</p>
                        </div>
                        @if($assigmentTasks->isNotEmpty())
                            <div class="mt-5">
                                <h1 class="text-xl font-bold mb-2">Tasks</h1>
                                <ul class="list-none list-inside">
                                    @foreach($assigmentTasks as $task)
                                        <li class="pl-5 py-2">[{{ $task->code }}] - {{ $task->description }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if($lessonLearningOutcomes->isNotEmpty())
                            <div class="mt-5">
                                <h1 class="text-xl font-bold mb-2">Lesson Learning Outcome(s)</h1>
                                <ul class="list-none list-inside">
                                    @foreach($lessonLearningOutcomes as $llo)
                                        <li class="pl-5 py-2">[{{ $llo->code }}] - {{ $llo->description }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if($assignment->note)
                            <div class="mt-5">
                                <h1 class="text-xl font-bold mb-2">Note</h1>
                                <p>{{ $assignment->note }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                @can('is-teacher')
                    <div class="flex flex-row-reverse justify-between">
                        <div class="justify-end flex flex-row gap-4 py-5 px-10">
                            <a href="{{ route('classes.assignments.edit', [$courseClass, $assignment]) }}"
                               class="text-blue-500">Edit</a>
                            <form method="POST"
                                  action="{{ route('classes.assignments.destroy', [$courseClass, $assignment]) }}">
                                @csrf
                                @method('delete')

                                <button class="text-red-500"
                                        onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                                    {{ __('Delete') }}
                                </button>
                            </form>
                        </div>

                        <div class="nilai py-5 px-10">
                            <form method="GET" action="{{ route('classes.assignments.student-grades.index', [$courseClass, $assignment]) }}">
                                <button type="submit" class="btn btn-sm px-7">
                                    {{ __('Student Grades') }}
                                </button>
                            </form>
                        </div>
                    </div>
                @endcan

                @can('is-student')
                    @if ($assignment->assignmentHasBeenGraded)
                        <?php
                        $totalCollectedPoint = $assignment->totalCollectedPoint;
                        $totalCriteriaPoint = $assignment->totalCriteriaPoint;
                        ?>
                        <div class="p-5">
                            <div class="flex justify-between">
                                <h1 class="text-2xl font-semibold pt-5">My Grade</h1>
                                <div class="border rounded p-5 text-3xl font-bold shadow">
                                    {{ round($totalCollectedPoint/$totalCriteriaPoint*100, 2) }}
                                </div>
                            </div>
                            <div class="flex justify-between mt-5 p-2">
                                <p class="text-gray-600">Rubric</p>
                                <p><span class="font-bold">{{ $totalCollectedPoint }}</span>
                                    <span class="font-semibold text-gray-400">/ {{ $totalCriteriaPoint }}</span></p>
                            </div>
                            <div class="border rounded">
                                @foreach($assigmentTasks as $assignmentTask)
                                    @php($taskCriteria = $assignmentTask->criteria)
                                    <div class="flex justify-start">
                                        <div class="flex-shrink-0 m-2 bg-white w-10 h-10 rounded-lg shadow text-center items-center">
                                            <span class="w-full h-full flex justify-center items-center text-2xl text-gray-600">
                                                {{ $loop->index + 1 }}
                                            </span>
                                        </div>
                                        <div class="font-semibold text-gray-500 p-2">
                                            <span class="w-full h-full flex items-center">
                                                [{{ $assignmentTask->code ?? "-" }}] {{ $assignmentTask->description }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="px-8 py-5 {{ !$loop->last ? "border-b": "" }}">
                                        <p class="text-xl font-semibold">{{ $taskCriteria->title }}</p>
                                        <div class="pb-5">{{ $taskCriteria->description }}</div>
                                        <div class="grid gap-2 grid-cols-2 md:grid-cols-5">
                                            @foreach($taskCriteria->criteriaLevels as $cl)
                                                @php($bgLevel = $cl->isAchieved ? 'bg-emerald-100 shadow' : 'bg-gray-200')
                                                <div class="border {{ $bgLevel }} rounded p-2">
                                                    <div class="flex justify-between">
                                                        <p class="p-1">{{ $cl->title }}</p>
                                                        <p class="p-1">{{ $cl->point }}</p>
                                                    </div>
                                                    @if($cl->isAchieved)
                                                        <p class="text-center">
                                                            <i class="fa-solid fa-circle-check text-emerald-800"></i>
                                                        </p>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="p-5">
                            <h1 class="text-2xl font-semibold pt-5">My Grade</h1>
                            <p class="p-5 text-gray-500">
                                Not Graded Yet
                            </p>
                        </div>
                    @endif
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>
