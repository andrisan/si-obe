@section('pageTitle', 'Edit Class')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Class') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('classes.edit', $class) }}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('classes.update', [$class]) }}" method="POST"
                      enctype="multipart/form-data">
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
                                    value="{{ $course->id }}" {{ (old("course_id", $class->course_id) == $course->id ? "selected":"") }}>{{ $course->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('course_id')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Class Name</span>
                        </label>
                        <input type="text" name="name" placeholder="Class name"
                               class="input input-bordered w-full max-w-xs" value="{{ old('name', $class->name) }}"/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Thumbnail Image</span>
                        </label>
                        <input type="file" name="thumbnail_img" class="block mt-4">
                        <x-input-error :messages="$errors->get('thumbnail_img')" class="mt-2"/>
                    </div>

                    <div class="mt-4 p-4 space-x-2">
                        <button type="submit" class="btn btn-sm px-7">
                            Save
                        </button>
                        <a href="{{ route('classes.index') }}">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
