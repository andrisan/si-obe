@section('pageTitle', 'Join Class')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Join Class') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('classes.join') }}
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-2xl font-bold">Class code</h1>
                <p class="text-gray-500 mb-4">Ask your teacher for the class code, then enter it here.</p>
                <form action="{{ route('classes.join') }}" method="POST">
                    @csrf
                    <input type="text" placeholder="Class code" name="class_code" class="input input-bordered w-full max-w-xs" />
                    <x-input-error :messages="$errors->get('class_code')" class="mt-2"/>
                    <div class="mt-4 p-4 space-x-2">
                        <button type="submit" class="btn btn-sm px-7">
                            Join
                        </button>
                        <a href="{{ route('classes.index') }}">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
