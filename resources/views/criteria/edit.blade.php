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
                        <div class="pb-2"><label for="title"><strong class="font-semibold text-gray-900 dark:text-white">Judul</strong></label></div>
                        <input type="text" placeholder="Judul" class="input input-bordered w-full max-w-xs" name="title"/> <br>
                    </div>
                    <div class="pb-4">
                    <div class="pb-2"><label for="description"><strong class="font-semibold text-gray-900 dark:text-white">Deskripsi</strong></label></div>
                        <textarea class="textarea textarea-bordered w-full" placeholder="Deskripsi" name="description"></textarea>
                    </div>
                    <div class="pb-4">
                        <div class="pb-2"><label for="max"><strong class="font-semibold text-gray-900 dark:text-white">beban</strong></label></div>
                        <input type="text" placeholder="Bobot" class="input input-bordered w-full max-w-xs" name="max_point"/> <br>
                    </div>
                    <input type="submit" value="Save" class="btn btn-active rounded-md " />
                </form>
                <button class="btn btn-outline rounded-md">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>