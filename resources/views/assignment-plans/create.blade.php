@section('pageTitle', "Create Assignment Plan")

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Assignment Plan') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto pb-10 sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('assignment-plans.create', $syllabus) }}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('syllabi.assignment-plans.store', $syllabus) }}">
                    @csrf

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Title</span>
                        </label>
                        <input type="text" name="title" placeholder="Title"
                               class="input input-bordered w-full max-w-xl" value="{{ old('title') }}"/>
                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Objective</span>
                        </label>
                        <textarea class="textarea text-neutral input-bordered bg-white w-full max-w-xl" name="objective" placeholder="Description">{{ old('objective') }}</textarea>
                        <x-input-error :messages="$errors->get('objective')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Description</span>
                        </label>
                        <textarea class="textarea text-neutral input-bordered bg-white w-full max-w-xl" name="description" placeholder="Description">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Assignment style</span>
                        </label>
                        <input type="text" name="assignment_style" placeholder="Assignment style"
                               class="input input-bordered w-full max-w-xl" value="{{ old('assignment_style') }}"/>
                        <x-input-error :messages="$errors->get('assignment_style')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Output Instruction</span>
                        </label>
                        <textarea class="textarea text-neutral input-bordered bg-white w-full max-w-xl" name="output_instruction" placeholder="Output Instruction">{{ old('output_instruction') }}</textarea>
                        <x-input-error :messages="$errors->get('output_instruction')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Submission Instruction</span>
                        </label>
                        <textarea class="textarea text-neutral input-bordered bg-white w-full max-w-xl" name="submission_instruction" placeholder="Submission Instruction">{{ old('submission_instruction') }}</textarea>
                        <x-input-error :messages="$errors->get('submission_instruction')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Deadline Instruction</span>
                        </label>
                        <textarea class="textarea text-neutral input-bordered bg-white w-full max-w-xl" name="deadline_instruction" placeholder="Deadline Instruction">{{ old('deadline_instruction') }}</textarea>
                        <x-input-error :messages="$errors->get('deadline_instruction')" class="mt-2"/>
                    </div>

                    <div class="flex justify-start items-center p-3">
                        <label class="label">
                            <span class="label-text">Group Assignment</span>
                        </label>
                        <div class="px-4">
                            <input name="is_group_assignment" id="is_group_assignment" type="checkbox">
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('is_group_assignment')" class="mt-2"/>

                    <div class="mt-4 p-4 space-x-2">
                        <button type="submit" class="btn btn-sm px-7">
                            Save
                        </button>
                        <a href="{{ route('syllabi.show', $syllabus) }}">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
