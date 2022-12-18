@section('pageTitle', "Create Lesson Learning Outcome")

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("New Lesson Learning Outcome") }}
        </h2>
        <p>for {{ $clo->description }}</p>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('llos.create', $syllabus, $ilo, $clo) }}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('syllabi.ilos.clos.llos.store', [$syllabus, $ilo, $clo]) }}">
                    @csrf

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Description</span>
                        </label>
                        <textarea class="textarea text-neutral input-bordered bg-white w-full max-w-xl" name="description" placeholder="Description of lesson learning outcome">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
                    </div>

                    <div class="mt-4 p-4 space-x-2">
                        <button type="submit" class="btn btn-sm px-7">
                            Save
                        </button>
                        <a href="{{ route_back_with_fallback('syllabi.ilos.clos.llos.index', [$syllabus, $ilo, $clo]) }}">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </x-app-layout>
