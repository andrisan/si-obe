@section('pageTitle', "Edit Syllabus - $syllabus->title")

<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Syllabi Edit of ' . "$syllabus->title") }}
    </h2>
  </x-slot>
    <div class="max-w-7xl mx-auto pb-10 sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('syllabi.edit', $syllabus) }}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('syllabi.update',$syllabus) }}">
                    @csrf
                    @method('patch')
                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Course</span>
                        </label>
                        <select class="select select-bordered w-full max-w-xs" name="course_id">
                            <option disabled selected>Choose the course</option>
                            @foreach ($courses as $course)
                                <option
                                    value="{{ $course->id }}" {{ (old("course_id", $syllabus->course_id) == $course->id ? "selected":"") }}>{{ $course->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('course_id')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Title</span>
                        </label>
                        <input type="text" name="title" placeholder="Syllabus Title"
                               class="input input-bordered w-full max-w-xs" value="{{ old('title', $syllabus->title) }}"/>
                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Author</span>
                        </label>
                        <textarea class="textarea textarea-bordered w-full lg:w-3/4 h-64" placeholder="Syllabus Author"
                                  name="author">{{ old('author', $syllabus->author) }}</textarea>
                        <x-input-error :messages="$errors->get('author')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Head of Study Program</span>
                        </label>
                        <input type="text" name="head_of_study_program" placeholder="Head of Study Program"
                               class="input input-bordered w-full max-w-xs" value="{{ old('head_of_study_program', $syllabus->head_of_study_program) }}"/>
                        <x-input-error :messages="$errors->get('head_of_study_program')" class="mt-2"/>
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
