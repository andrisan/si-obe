@section('pageTitle', 'Create New Classes')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Class') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('classes.create') }}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('classes.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Course</span>
                        </label>
                        <select class="select select-bordered w-full max-w-xs" name="course_id">
                            <option disabled selected>Choose the course</option>
                            @foreach ($courses as $syllabus)
                                <option
                                    value="{{ $syllabus->id }}" {{ (old("course_id") == $syllabus->id ? "selected":"") }}>{{ $syllabus->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('course_id')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Syllabus</span>
                        </label>
                        <select class="select select-bordered w-full max-w-xs" name="syllabus_id">
                            <option disabled selected>Choose the syllabus</option>
                            @foreach ($syllabi as $syllabus)
                                <option value="{{ $syllabus->id }}" {{ (old("syllabus_id") == $syllabus->id ? "selected":"") }}>{{ $syllabus->title }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('syllabus_id')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Class Name</span>
                        </label>
                        <input type="text" name="name" placeholder="Class name"
                               class="input input-bordered w-full max-w-xs" value="{{ old('name') }}"/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Thumbnail Image</span>
                        </label>
                        <input type="file" name="thumbnail_img" class="file-input file-input-bordered w-full max-w-xs"/>
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
