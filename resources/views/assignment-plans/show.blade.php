@php use Carbon\Carbon; @endphp
@section('pageTitle', $assignmentPlan->title)

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assignment Plan') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto pb-10 sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('assignment-plans.show', $syllabus, $assignmentPlan) }}
        <div class="flex flex-row sm:justify-end mb-3 px-4 sm:px-0 -mr-2 sm:-mr-3">
            <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                <x-button-link href="{{ route('syllabi.assignment-plans.edit', [$syllabus, $assignmentPlan]) }}">
                    <i class="fa fa-edit"></i> {{ __('Edit') }}
                </x-button-link>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="grid grid-cols-3 grid-flow-row gap-4">
                    <p class="py-3">Title</p>
                    <div class="py-3 col-span-2">: {{ $assignmentPlan->title }}</div>

                    <p class="py-3">Description</p>
                    <div class="py-3 col-span-2">: {{$assignmentPlan->description}}</div>

                    <p class="py-3">Assignment Style</p>
                    <div class="py-3 col-span-2">: {{ $assignmentPlan->assignment_style }}</div>

                    <p class="py-3">Output Instruction</p>
                    <div class="py-3 col-span-2">: {{ $assignmentPlan->output_instruction }}</div>

                    <p class="py-3">Submission Instruction</p>
                    <div class="py-3 col-span-2">: {{ $assignmentPlan->submission_instruction }}</div>

                    <p class="py-3">Deadline Instruction</p>
                    <div class="py-3 col-span-2">: {{ $assignmentPlan->deadline_instruction }}</div>

                    <p class="py-3">Is Group Assignment</p>
                    <div class="py-3 col-span-2">: {{ $assignmentPlan->is_group_assignment ? __('Yes'): __('No') }}</div>

                    <p class="py-3">Created At</p>
                    <div class="py-3 col-span-2">: {{ Carbon::parse($assignmentPlan->created_at)->format("M d, Y H:i") }}</div>

                    <p class="py-3">Last Updated</p>
                    <div class="py-3 col-span-2">: {{ Carbon::parse($assignmentPlan->updated_at)->format("M d, Y H:i") }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
