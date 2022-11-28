<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            CREATE: Course Learning Outcomes
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <form action="{{ route('syllabi.ilos.clos.store', [$syllabus, $ilo]) }}" method="post">
                    <div class="pb-4">
                    @csrf
                    <h2 class="font-semibold text-3xl text-center">CREATE: Course Learning Outcomes</h2>
                        <div class="pb-2"><label for="position"><strong class="font-semibold text-gray-900 dark:text-white">Position</strong></label></div>
                        <input type="text" placeholder="Posisi CLO" class="input input-bordered w-full max-w-xs" name="position"/> <br>
                        <x-input-error :messages="$errors->get('position')" class="mt-2" />
                    </div>
                    <div class="pb-4">
                    <div class="pb-2"><label for="position"><strong class="font-semibold text-gray-900 dark:text-white">Description</strong></label></div>
                    <textarea class="textarea textarea-bordered w-full lg:w-3/4 h-64" placeholder="Description" name="description" spellcheck="false"></textarea>
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
