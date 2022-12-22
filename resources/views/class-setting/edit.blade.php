@section('pageTitle', 'Class Settings')

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-start gap-4">
            <x-back-link />
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Class Settings') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('classes.settings', $class) }}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if(Session::has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ Session::get('success') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('classes.setting.update', $class) }}">
                    @csrf
                    @method('patch')

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">LLO Portofolio Threshold</span>
                        </label>
                        <input type="text" name="llo_threshold" placeholder="LLO Portofolio Threshold"
                               class="input input-bordered w-full max-w-xs" value="{{ old('llo_threshold', $class->settings->llo_threshold??"") }}"/>
                        <x-input-error :messages="$errors->get('llo_threshold')" class="mt-2"/>
                    </div>

                    <div class="mt-4 p-4 space-x-2">
                        <button type="submit" class="btn btn-sm px-7">
                            Save
                        </button>
                        <a href="{{ route('classes.show', $class) }}">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
{{-- /faculties/{{ $department->id }}/departments/{{$department->id}}/edit --}}
