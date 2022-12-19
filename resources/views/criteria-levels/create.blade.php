@section('pageTitle', 'Create New Criteria Level')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Criteria Level') }}
        </h2>
        <p>Criteria: {{ $criteria->title }}</p>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('criteria-levels.create', $rubric, $criteria) }}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('rubrics.criterias.criteria-levels.store', [$rubric, $criteria]) }}">
                    @csrf
                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Title</span>
                        </label>
                        <input type="text" name="title" placeholder="Level Title" class="input input-bordered w-full max-w-xs" value="{{ old('title') }}"/>
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Point</span>
                        </label>
                        <input type="text" name="point" placeholder="Level Point" class="input input-bordered w-full max-w-xs" value="{{ old('point') }}"/>
                        <x-input-error :messages="$errors->get('point')" class="mt-2" />
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Description</span>
                        </label>
                        <textarea class="textarea textarea-bordered w-full lg:w-3/4 h-64" placeholder="Description" name="description" >{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="mt-4 p-4 space-x-2">
                        <button type="submit" class="btn btn-sm px-7">
                            Save
                        </button>
                        <a href="{{ route('rubrics.show', [$rubric]) }}">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
