<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="mb-4 text-4xl font-bold tracking-tight leading-none text-indigo-400 md:text-5xl lg:text-6xl dark:text-white pb-14">
                Criterias<span class="bg-blue-100 text-blue-800 text-3xl font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-2">EDIT</span>
                </h1>
                <form action=" ">
                    <div class="pb-4">
                        <div class="pb-2"><label for="position"><strong class="font-semibold text-gray-900 dark:text-white">Title</strong></label></div>
                        <input type="text" placeholder="Judul kriteria" class="input input-bordered w-full max-w-xs" /> <br>
                    </div>
                    <div class="pb-4">
                    <div class="pb-2"><label for="position"><strong class="font-semibold text-gray-900 dark:text-white">Description</strong></label></div>
                        <textarea class="textarea textarea-bordered w-full" placeholder="Deskripsi kriteria"></textarea>
                    </div>
                    <div class="pb-4">
                        <div class="pb-2"><label for="position"><strong class="font-semibold text-gray-900 dark:text-white">Max Point</strong></label></div>
                        <input type="text" placeholder="Poin max kriteria" class="input input-bordered w-full max-w-xs" /> <br>
                    </div>
                </form>
                <input type="submit" value="Edit" class="btn btn-active rounded-md " />
                <button class="btn btn-outline rounded-md">Cancel</button>
                </div>
            </div>
        </div>
    </div>

         <!-- <div class="flex h-screen justify-center items-center bg-indigo-100">
            <div class="m-auto bg-white p-8 rounded-2xl">
                
            </div>
         </div>  -->
</x-app-layout>