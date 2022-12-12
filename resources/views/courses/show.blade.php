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

    <x-slot name="slot">
        <div class="text-sm breadcrumbs pl-10 pt-5 font-bold text-grey-600">
            <ul>
                <li><a href="">Dashboard</a></li>
                <li><a href="{{route('courses.index')}}">Courses</a></li>
                <li class="text-blue-600">{{ "$course->name" }}</li>
            </ul>
        </div>
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col px-10 pt-5 border-l border-slate-500">
            <div class="pb-10">
                <div class="border-b rounded-lg shadow-xl bg-white px-5 py-5">
                    <div class="ml-5 mt-5 px-5 mb-5">
                        <h2 class="card-title pb-5">{{$course->name}}</h2>
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

                        <div class="card-actions justify-end pt-20 gap-5">
                            <form action="{{ route('courses.edit',$course->id) }}" method="get">
                                <button class="btn btn-outline" href="{{ route('courses.store') }}" type="submit">Edit</button>
                            </form>
                            <form action="{{route('courses.destroy', $course->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline" value="{{ $course->id }}" onclick="return confirm('Yakin ingin menghapus data?');">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

</x-app-layout>