@section('pageTitle', "Create New Rubric")
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Rubric') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('rubrics.create', $syllabus) }}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <div class="bg-yellow-50 p-5     m-2 w-2/3 rounded-xl">
                    <p class="text-sm text-gray-500">You're creating new rubric for assignment plan: {{ $assignmentPlan->title }}</p>
                </div>
                <form method="POST" action="{{ route('rubrics.store') }}">
                    @csrf

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Title</span>
                        </label>
                        <input type="hidden" name="assignment_plan_id" value="{{ $assignmentPlan->id }}">
                        <input type="text" name="title" placeholder="Title"
                               class="input input-bordered w-full max-w-xs" value="{{ old('title') }}"/>
                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                    </div>

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
