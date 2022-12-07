
@section('pageTitle', 'Edit Criteria')
<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
       Edit: Criterias
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{route('rubrics.criterias.update', [$rubric, $criterias])}}" method="post">
                    @csrf
                    @method('put')
                    <div class="pb-4">
                        <div class="pb-2"><label for="title"><strong class="font-semibold">Title</strong></label></div>
                        <input type="text" placeholder="Title" class="input input-bordered w-full max-w-xs" name="title" value="{{ $criterias->title }}"/> <br>
                    </div>
                    <div class="pb-4">
                        <div class="pb-2"><label for="max"><strong class="font-semibold">Max_Point</strong></label></div>
                        <input type="text" placeholder="Max_point" class="input input-bordered w-full max-w-xs" name="max_point" value="{{ $criterias->max_point }}"/> <br>
                    </div>
                    <div class="pb-4">
                        <div class="pb-2"><label for="description"><strong class="font-semibold">Description</strong></label></div>
                        <textarea type="text" class="rounded-md mt-2 h-52" name="description"  cols="33" rows="10" >{{ $criterias->description }}</textarea>
                    </div>
                    <input type="submit" value="Save" class="btn btn-active rounded-md " />
                    <a href="{{ route('rubrics.criterias.index', [$rubric]) }}" class="btn btn-outline rounded-md">Cancel</a>
                
                </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
