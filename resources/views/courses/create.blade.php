<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Course') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="text-sm breadcrumbs pl-8 pt-5 font-bold text-grey-600">
            <ul>
                <li><a href="">Dashboard</a></li>
                <li><a href="">Courses</a></li>
                <li class="text-blue-600">Create</li>
            </ul>
        </div>

        <!-- <div class="border-r-2 border-indigo-500"> -->
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col px-10 pt-5 border-l border-slate-500">
            <!-- Page content here -->
            <div class="pb-10">
                <div class="border-b rounded-lg shadow-xl bg-white px-5 py-5">
                    <form method="POST" action="{{route('courses.store')}}">
                        @csrf
                        <div class="grid grid-cols-2 grid-flow-row gap-1 justify-items-center pb-5">

                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Course Code</span>
                                </label>
                                <input type="text" class="input text-neutral input-bordered bg-white w-full max-w-xs" name="code" id="code" />
                                <x-input-error :messages="$errors->get('code')" class="mt-2" />
                            </div>

                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Short Description</span>
                                </label>
                                <textarea class="textarea input-bordered bg-white text-neutral" name="short_description" id="short_description" ></textarea>
                                <x-input-error :messages="$errors->get('short_description')" class="mt-2" />
                            </div>

                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Course Name</span>
                                </label>
                                <input type="text" class="input text-neutral input-bordered bg-white w-full max-w-xs" name="name" id="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Minimal Requirement</span>
                                </label>
                                <textarea class="textarea input-bordered bg-white text-neutral" name="minimal_requirement" id="minimal_requirement" ></textarea>
                                <x-input-error :messages="$errors->get('minimal_requirement')" class="mt-2" />
                            </div>

                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Course Credit</span>
                                </label>
                                <input type="text" class="input text-neutral input-bordered bg-white w-full max-w-xs" name="course_credit" id="course_credit" />
                                <x-input-error :messages="$errors->get('course_credit')" class="mt-2" />
                            </div>

                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Study Material</span>
                                </label>
                                <textarea class="textarea input-bordered bg-white text-neutral" name="study_material_summary" id="study_material_summary" ></textarea>
                                <x-input-error :messages="$errors->get('study_material_summary')" class="mt-2" />
                            </div>

                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Lab Credit</span>
                                </label>
                                <input type="text" class="input text-neutral input-bordered bg-white w-full max-w-xs" name="lab_credit" id="lab_credit" />
                                <x-input-error :messages="$errors->get('lab_credit')" class="mt-2" />
                            </div>

                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Learning Media</span>
                                </label>
                                <textarea class="textarea input-bordered bg-white text-neutral" name="learning_media" id="learning_media" ></textarea>
                                <x-input-error :messages="$errors->get('learning_media')" class="mt-2" />
                            </div>

                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Course Type</span>
                                </label>
                                <select class="select text-neutral input-bordered bg-white w-full max-w-xs" name="type" id="type">
                                    <option></option>
                                    <option>Mandatory</option>
                                    <option>Elective</option>
                                </select>
                                <x-input-error :messages="$errors->get('type')" class="mt-2" />
                            </div>

                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class="label-text text-neutral font-bold">Study Program</span>
                                </label>
                                <select class="select text-neutral input-bordered bg-white w-full max-w-xs" name="study_program" id="study_program">
                                    <option></option>
                                    @foreach($studyPrograms as $program)
                                        <option value="{{ $program->id }}">{{ $program->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('study_program')" class="mt-2" />
                            </div>

                            <div class="form-control w-full max-w-xs">
                                <label class="label">
                                    <span class="mt-7 label-text text-neutral font-bold">User Creator</span>
                                </label>
                                <select class="select text-neutral input-bordered bg-white w-full max-w-xs" name="study_program" id="study_program">
                                    <option></option>
                                    @foreach($userCreator as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('user_creator')" class="mt-2" />
                            </div>

                            <div class="pt-4" style="float:right">
                                <button class="mt-12 btn btn-outline" type="submit">Create</button>
                                <a href="{{ route('courses.store') }}">{{ __('Cancel') }}</a>
                            </div>





                        </div>
                    </form>
                </div>



            </div>
            <!-- End content -->
        </div>
    </x-slot>
</x-app-layout>
