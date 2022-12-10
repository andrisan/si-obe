
@section('pageTitle', "Failed to Join")

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
     
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-center mt-20 mb-10">
                    <h2 class="font-bold text-4xl text-gray-800 leading-tight"><i class="material-icons" style="font-size:24px">warning</i> Error!</h2>
                    <div> {{ $errorMessage }}</div>
                </div>
                <a href="{{route('classes.show_join')}}" class="btn rounded-md hover:bg-slate-200 hover:text-black mt-6 mx-6 mb-6"> Back</a>
            </div>
        </div>
    </div>

</x-app-layout>