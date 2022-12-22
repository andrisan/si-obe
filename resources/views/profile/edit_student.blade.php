@section('pageTitle', 'Edit Your Profile')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Your Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Name</span>
                        </label>
                        <input type="text" name="name" placeholder="name"
                               class="input input-bordered w-full max-w-xs" value="{{ old('name', $user->name) }}"/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    <div class="form-control w-full p-3">
                        <label class="label">
                            <span class="label-text">Student ID Number</span>
                        </label>
                        <input type="text" name="student_id_number" placeholder="Your Student ID Number"
                               class="input input-bordered w-full max-w-xs" value="{{ old('student_id_number', $studentData->student_id_number ?? "") }}"/>
                        <x-input-error :messages="$errors->get('student_id_number')" class="mt-2"/>
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
    </div>
</x-app-layout>
