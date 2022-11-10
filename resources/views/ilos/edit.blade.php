<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
        Edit: Intended Learning Outcome
        </h2>
    </x-slot>


     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form action="foo/barr">
                    <div class="pb-4">
                        <div class="pb-2"><label for="position"><strong class="font-semibold text-gray-900 dark:text-white">Position</strong></label></div>
                        <input type="text" placeholder="Posisi CLO" class="input input-bordered w-full max-w-xs" /> <br>
                    </div>
                    <div class="pb-4">
                    <div class="pb-2"><label for="position"><strong class="font-semibold text-gray-900 dark:text-white">Description</strong></label></div>
                        <textarea class="textarea textarea-bordered w-full" placeholder="Deskripsi CLO"></textarea>
                    </div>
                </form>
                <input type="submit" value="Edit" class="btn btn-active rounded-md " />
                <button class="btn btn-outline rounded-md">Cancel</button>
                </div>
            </div>
        </div>
    </div>      
            </div>
         </div> 
         </x-app-layout>