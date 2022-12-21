@section('pageTitle', 'Complete Your Profile')

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 text-center">
            <h2 class="text-xl font-bold">{{ __('Please complete your profile') }}</h2>
        </div>

        <div class="text-center">
            <form method="POST" action="{{ route('profile.store') }}">
                @csrf

                <div class="form-control w-full ">
                    <p class="text-gray-600 p-3">Student ID Number</p>
                    <input type="text" name="student_id_number" placeholder="Your Student ID Number"
                           class="input input-bordered w-full" value="{{ old('student_id_number') }}"/>
                    <x-input-error :messages="$errors->get('student_id_number')" class="mt-2"/>
                </div>

                <div class="mt-4 p-4 space-x-2">
                    <button type="submit" class="btn btn-sm px-7">
                        Continue
                    </button>
                </div>
            </form>
        </div>
        <div class="flex justify-end">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Complete Your Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
