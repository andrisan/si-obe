@section('pageTitle', "Create New Course")

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-start gap-4">
            <x-back-link />
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create New Course') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('courses.create') }}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('courses.store') }}">
                    @csrf
                    <div class="grid grid-cols-2 gap-1">
                        <div class="form-control w-full max-w-xl">
                            <label class="label">
                                <span class="label-text text-neutral font-bold">Study Program</span>
                            </label>
                            <select class="select text-neutral input-bordered bg-white w-full max-w-xl" name="study_program" id="study_program">
                                <option disabled selected>Select Study Program</option>
                                @foreach($studyPrograms as $program)
                                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('study_program')" class="mt-2" />
                        </div>

                        <div class="form-control w-full max-w-xl">
                            <label class="label">
                                <span class="label-text text-neutral font-bold">Course Code</span>
                            </label>
                            <input type="text" class="input text-neutral input-bordered bg-white w-full max-w-xl" name="code" placeholder="Course code" value="{{ old('code') }}"/>
                            <x-input-error :messages="$errors->get('code')" class="mt-2" />
                        </div>

                        <div class="form-control w-full max-w-xl">
                            <label class="label">
                                <span class="label-text text-neutral font-bold">Course Name</span>
                            </label>
                            <input type="text" class="input text-neutral input-bordered bg-white w-full max-w-xl" name="name" value="{{ old('name') }}"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="form-control w-full max-w-xl">
                            <label class="label">
                                <span class="label-text text-neutral font-bold">Short Description</span>
                            </label>
                            <textarea class="textarea text-neutral input-bordered bg-white w-full max-w-xl" name="short_description">{{ old('short_description') }}</textarea>
                            <x-input-error :messages="$errors->get('short_description')" class="mt-2" />
                        </div>

                        <div class="form-control w-full max-w-xl">
                            <label class="label">
                                <span class="label-text text-neutral font-bold">Course Credit</span>
                            </label>
                            <input type="text" class="input text-neutral input-bordered bg-white w-full max-w-xl" name="course_credit" value="{{ old('course_credit') }}" />
                            <x-input-error :messages="$errors->get('course_credit')" class="mt-2" />
                        </div>

                        <div class="form-control w-full max-w-xl">
                            <label class="label">
                                <span class="label-text text-neutral font-bold">Minimal Requirement</span>
                            </label>
                            <textarea class="textarea text-neutral input-bordered bg-white w-full max-w-xl" name="minimal_requirement">{{ old('minimal_requirement') }}</textarea>
                            <x-input-error :messages="$errors->get('minimal_requirement')" class="mt-2" />
                        </div>

                        <div class="form-control w-full max-w-xl">
                            <label class="label">
                                <span class="label-text text-neutral font-bold">Lab Credit</span>
                            </label>
                            <input type="text" class="input text-neutral input-bordered bg-white w-full max-w-xl" name="lab_credit" value="{{ old('lab_credit') }}" />
                            <x-input-error :messages="$errors->get('lab_credit')" class="mt-2" />
                        </div>

                        <div class="form-control w-full max-w-xl">
                            <label class="label">
                                <span class="label-text text-neutral font-bold">Study Material</span>
                            </label>
                            <textarea class="textarea text-neutral input-bordered bg-white w-full max-w-xl" name="study_material_summary">{{ old('study_material_summary') }}</textarea>
                            <x-input-error :messages="$errors->get('study_material_summary')" class="mt-2" />
                        </div>

                        <div class="form-control w-full max-w-xl">
                            <label class="label">
                                <span class="label-text text-neutral font-bold">Course Type</span>
                            </label>
                            <select class="select text-neutral input-bordered bg-white w-full max-w-xl" name="type" id="type">
                                <option disabled selected>Select Course Type</option>
                                <option>Mandatory</option>
                                <option>Elective</option>
                            </select>
                            <x-input-error :messages="$errors->get('type')" class="mt-2" />
                        </div>

                        <div class="form-control w-full max-w-xl">
                            <label class="label">
                                <span class="label-text text-neutral font-bold">Learning Media</span>
                            </label>
                            <textarea class="textarea text-neutral input-bordered bg-white w-full max-w-xl" name="learning_media">{{ old('learning_media') }}</textarea>
                            <x-input-error :messages="$errors->get('learning_media')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-4 p-4 space-x-2">
                        <button type="submit" class="btn btn-sm px-7">
                            Save
                        </button>
                        <x-back-link>{{ __('Cancel') }}</x-back-link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
