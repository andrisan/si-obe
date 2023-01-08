@section('pageTitle', "Course $course->name")

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-start gap-4">
            <x-back-link />
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ "$course->name" }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('courses.show', $course) }}
        <div class="flex flex-row mb-3 px-4 -mr-2 sm:-mr-3 sm:px-0  sm:justify-end">
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
                @php
                    $courseInfo = [
                        'Course Name' => $course->name,
                        'Study Program' => $course->studyProgram()->find($course->study_program_id)->name,
                        'Course Code' => $course->code,
                        'Course Type' => $course->type,
                        'Course Credit' => $course->course_credit,
                        'Lab Credit' => $course->lab_credit,
                        'Learning Media' => $course->learning_media,
                        'Study Material' => $course->study_material_summary,
                        'Minimal Requirement' => $course->minimal_requirement,
                        'Short Description' => $course->short_description,
                        'User Creator' => $course->creator()->find($course->creator_user_id)->name,
                    ];
                @endphp
                <table class="table-auto w-full">
                    <tbody>
                    @foreach($courseInfo as $key=>$value)
                        <tr>
                            <td class="py-3 w-48">{{$key}}</td>
                            <td class="py-3 w-10">: </td>
                            <td class="py-3">{{$value}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
