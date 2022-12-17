@section('pageTitle', "Course $course->name")

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="items-start">
                <h2 class="font-semibold   text-4xl text-gray-800 leading-tight">
                    {{ "$course->name" }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('courses.show', $course) }}
        <div class="flex flex-row sm:justify-end mb-3 px-4 sm:px-0 -mr-2 sm:-mr-3">
            <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                <x-button-link href="{{ route('courses.edit', $course) }}">
                    <i class="fa fa-edit"></i> {{ __('Edit') }}
                </x-button-link>
            </div>
            <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                <form action="{{route('courses.destroy', $course->id)}}" method="post" class="py-2">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('Yakin ingin menghapus data?');"><i class="fa-regular fa-trash-can text-red-600"></i></button>
                </form>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="grid grid-cols-3 grid-flow-row gap-4">
                    <p class="py-3">Study Program</p>
                    <div class="py-3 col-span-2">: {{$course->studyProgram()->find($course->study_program_id)->name}}</div>
                    <p class="py-3">Class Code</p>
                    <div class="py-3 col-span-2">: {{$course->code}}</div>
                    <p class="py-3">Course Type</p>
                    <div class="py-3 col-span-2">: {{$course->type}}</div>
                    <p class="py-3">Course Credit</p>
                    <div class="py-3 col-span-2">: {{$course->course_credit}}</div>
                    <p class="py-3">Lab Credit</p>
                    <div class="py-3 col-span-2">: {{$course->lab_credit}}</div>
                    <p class="py-3">Learning Media</p>
                    <div class="py-3 col-span-2">: {{$course->learning_media}}</div>
                    <p class="py-3">Study Material</p>
                    <div class="py-3 col-span-2">: {{$course->study_material_summary}}</div>
                    <p class="py-3">Minimal Requirement</p>
                    <div class="py-3 col-span-2">: {{$course->minimal_requirement}}</div>
                    <p class="py-3">Short Description</p>
                    <div class="py-3 col-span-2">: {{$course->short_description}}</div>
                    <p class="py-3">User Creator</p>
                    <div class="py-3 col-span-2">: {{$course->creator()->find($course->creator_user_id)->name}}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
