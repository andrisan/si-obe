@section('pageTitle', 'Edit Rubric - ' . $rubric->title)
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row gap-4">
            <x-back-link/>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Rubric') }}: {{ $rubric->title }}
            </h2>
        </div>
    </x-slot>
    <div class="max-w-7xl mx-auto mt-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('rubrics.update', $rubric) }}">
                    @csrf
                    @method('patch')

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Rubric Title</span>
                        </label>
                        <input type="text" name="title" placeholder="Rubric Title"
                               class="input input-bordered w-full max-w-xs" value="{{ old('title', $rubric->title) }}"/>
                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                    </div>

                    <div class="mt-4 p-4 space-x-2">
                        <button type="submit" class="btn btn-sm px-7">
                            Save
                        </button>
                        <x-back-link>Cancel</x-back-link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
