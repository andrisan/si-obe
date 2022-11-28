<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Edit: Course Learning Outcome
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{ route('syllabi.ilos.clos.update', [$syllabus, $ilo, $clo]) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="pb-4">
                        <div class="pb-2"><label for="position"><strong class="font-semibold text-gray-900 dark:text-white">Position</strong></label></div>
                        <input type="text" name="position" placeholder="Position" class="input input-bordered w-full max-w-xs" value="{{ old('position', $clo->position) }}"/> <br>
                        <x-input-error :messages="$errors->get('position')" class="mt-2" />
                    </div>
                    <div class="pb-4">
                    <div class="pb-2"><label for="position"><strong class="font-semibold text-gray-900 dark:text-white">Description</strong></label></div>
                        <textarea class="textarea textarea-bordered w-full" placeholder="Description" name="description" >{{ old('description', $clo->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    <input type="submit" value="Save" class="btn btn-active rounded-md " />
                    <a href="{{ route('syllabi.ilos.clos.index', [$syllabus, $ilo]) }}" class="btn btn-outline rounded-md">Cancel</a>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>