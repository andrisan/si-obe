@section('pageTitle', "Create Course Learning Outcome")

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("New Course Learning Outcome") }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('clos.create', $syllabus) }}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('syllabi.clos.store', $syllabus) }}">
                    @csrf

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Intended Learning Outcome (ILO)</span>
                        </label>
                        <select class="select select-bordered w-full max-w-xs" name="ilo_id">
                            <option value="">Choose the ILO</option>
                            @foreach ($ilos as $ilo)
                                <option
                                    value="{{ $ilo->id }}" {{ (old("ilo_id") == $ilo->id ? "selected":"") }}>{{ $ilo->code." - ".$ilo->description }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('ilo_id')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Code</span>
                        </label>
                        <input type="text" name="code" placeholder="Code"
                               class="input input-bordered w-full max-w-xs" value="{{ old('code') }}"/>
                        <x-input-error :messages="$errors->get('code')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Description</span>
                        </label>
                        <textarea class="textarea text-neutral input-bordered bg-white w-full max-w-xl" name="description" placeholder="Description of course learning outcome">{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2"/>
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
