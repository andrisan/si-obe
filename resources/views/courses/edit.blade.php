<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="items-start">
                <h2 class="font-semibold   text-4xl text-gray-800 leading-tight">
                    {{ __('Edit Course')." $course->name" }}
                </h2>
            </div>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="text-sm breadcrumbs pl-10 pt-5 font-bold text-grey-600">
            <ul>
                <li><a href="">Dashboard</a></li>
                <li><a href="{{route('courses.index')}}">Courses</a></li>
                <li class="text-blue-600">Edit</li>
            </ul>
        </div>
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col px-10 pt-5 border-l border-slate-500">
            <div class="pb-10">
                <div class="border-b rounded-lg shadow-xl bg-white px-5 py-5">
                    <form method="post" action="{{route('courses.update', $course->id) }}">
                        @csrf
                        @method('put')
                        <div class="grid grid-cols-2 grid-flow-row gap-8 justify-items-center pb-5">
                            <div class="form-control w-full max-w-xl">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Study Program</span>
                                </label>
                                <select class="select text-neutral input-bordered bg-white w-full max-w-xl" name="study_program" id="study_program" value="{{ $course->study_program_id }}">
                                    <option></option>
                                    @foreach($studyPrograms as $program)
                                    <option value="{{ $program->id }}" @selected($program->id == $course->study_program_id)>{{ $program->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('study_program')" class="mt-2" />
                            </div>

                            <div class="form-control w-full max-w-xl">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Course Code</span>
                                </label>
                                <input type="text" class="input text-neutral input-bordered bg-white w-full max-w-xl" name="code" id="code" value="{{ $course->code }}" />
                                <x-input-error :messages="$errors->get('code')" class="mt-2" />
                            </div>

                            <div class="form-control w-full max-w-xl">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Course Name</span>
                                </label>
                                <input type="text" class="input text-neutral input-bordered bg-white w-full max-w-xl" name="name" id="name" value="{{ $course->name }}" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="form-control w-full max-w-xl">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Short Description</span>
                                </label>
                                <textarea class="textarea input-bordered bg-white text-neutral" name="short_description" id="short_description">{{ $course->short_description }}</textarea>
                                <x-input-error :messages="$errors->get('short_description')" class="mt-2" />
                            </div>

                            <div class="form-control w-full max-w-xl">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Course Credit</span>
                                </label>
                                <input type="text" class="input text-neutral input-bordered bg-white w-full max-w-xl" name="course_credit" id="course_credit" value="{{ $course->course_credit }}" />
                                <x-input-error :messages="$errors->get('course_credit')" class="mt-2" />
                            </div>

                            <div class="form-control w-full max-w-xl">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Minimal Requirement</span>
                                </label>
                                <textarea class="textarea input-bordered bg-white text-neutral" name="minimal_requirement" id="minimal_requirement">{{ $course->minimal_requirement }}</textarea>
                                <x-input-error :messages="$errors->get('minimal_requirement')" class="mt-2" />
                            </div>

                            <div class="form-control w-full max-w-xl">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Lab Credit</span>
                                </label>
                                <input type="text" class="input text-neutral input-bordered bg-white w-full max-w-xl" name="lab_credit" id="lab_credit" value="{{ $course->lab_credit }}" />
                                <x-input-error :messages="$errors->get('lab_credit')" class="mt-2" />
                            </div>

                            <div class="form-control w-full max-w-xl">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Study Material</span>
                                </label>
                                <textarea class="textarea input-bordered bg-white text-neutral" name="study_material_summary" id="study_material_summary">{{ $course->study_material_summary }}</textarea>
                                <x-input-error :messages="$errors->get('study_material_summary')" class="mt-2" />
                            </div>

                            <div class="form-control w-full max-w-xl">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Course Type</span>
                                </label>
                                <select class="select text-neutral input-bordered bg-white w-full max-w-xl" name="type" id="type">
                                    <option></option>
                                    <option @selected($course->type == 'mandatory')>Mandatory</option>
                                    <option @selected($course->type == 'elective')>Elective</option>
                                </select>
                                <x-input-error :messages="$errors->get('type')" class="mt-2" />
                            </div>

                            <div class="form-control w-full max-w-xl">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Learning Media</span>
                                </label>
                                <textarea class="textarea input-bordered bg-white text-neutral" name="learning_media" id="learning_media">{{ $course->learning_media }}</textarea>
                                <x-input-error :messages="$errors->get('learning_media')" class="mt-2" />
                            </div>

                        </div>

                        <div class="card-actions justify-end pt-5">
{{--                            <form action="{{ route('courses.index') }}">--}}
                                <button class="btn btn-outline" type="submit">Save</button>
{{--                            </form>--}}
{{--                            <form action="{{ route('courses.index') }}">--}}
                                <a class="btn btn-outline" href="{{ route('courses.index') }}">Cancel</a>
{{--                            </form>--}}
                        </div>
                    </form>


    </x-slot>


</x-app-layout>
