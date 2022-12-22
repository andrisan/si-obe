@section('pageTitle', 'Create Learning Plan')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("New Learning Plan") }}
        </h2>
        <p>for {{ $syllabus->title }}</p>
    </x-slot>

    <div class="max-w-7xl mx-auto pb-10 sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('learning-plans.create', $syllabus) }}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('syllabi.learning-plans.store', $syllabus) }}">
                    @csrf

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">LLO</span>
                        </label>
                        <select class="select select-bordered w-full max-w-xs" name="llo_id">
                            <option disabled selected>Choose the LLO</option>
                            @foreach ($llos as $llo)
                                <option value="{{ $llo->id }}" {{ (old("llo_id") == $llo->id ? "selected":"") }}>{{ $llo->description }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('llo_id')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Week Number</span>
                        </label>
                        <input type="number" name="week_number" placeholder="Week Number"
                               class="input input-bordered w-full max-w-xs" value="{{ old('week_number') }}"/>
                        <x-input-error :messages="$errors->get('week_number')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Study Material</span>
                        </label>
                        <textarea class="textarea text-neutral input-bordered bg-white w-full max-w-xl" name="study_material" placeholder="Study Material">{{ old('study_material') }}</textarea>
                        <x-input-error :messages="$errors->get('study_material')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Learning Method</span>
                        </label>
                        <textarea class="textarea text-neutral input-bordered bg-white w-full max-w-xl" name="learning_method" placeholder="Learning Method">{{ old('learning_method') }}</textarea>
                        <x-input-error :messages="$errors->get('learning_method')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Estimated Time</span>
                        </label>
                        <input type="text" name="estimated_time" placeholder="Estimated Time"
                               class="input input-bordered w-full max-w-xs" value="{{ old('estimated_time') }}"/>
                        <x-input-error :messages="$errors->get('estimated_time')" class="mt-2"/>
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
