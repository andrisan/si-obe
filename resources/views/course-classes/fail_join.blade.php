@section('pageTitle', "Failed to Join")

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
     
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-center mt-5 mb-10">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-12 w-12 mx-auto"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                    </div>
                    <div class="font-bold text-4xl text-gray-800 leading-tight">Error!</div>
                    <div> {{ $errorMessage }}</div>
                </div>
                <a href="{{route('classes.show_join')}}"
                    class="btn rounded-md hover:bg-slate-200 hover:text-black mt-6 mx-6 mb-6"> Back</a>
            </div>
        </div>
    </div>

</x-app-layout>