<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Assignment Plans') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  
                        <div class="container p-4 text-primary mt-2 text-sm">
                            <form>
                                <label class="uppercase font-bold  text-blue-600" for="fname">ID</label><br>
                                <input type="text" class="input input-bordered input-ghost input-l w-full max-w-xl mb-2 mt-2" name="c_class" value="1"/>
                            </form>
                        </div>

                        <div class="container p-4 text-primary text-sm">
                            <form>
                                <label class="uppercase font-bold  text-blue-600" for="fname">Title</label><br>
                                <input type="text" class="input input-bordered input-ghost input-l w-full max-w-xl mb-4 mt-2" name="c_class" value="Pemrograman Basis Data"/>
                            </form>
                        </div>

                        <div class="container p-4 text-primary text-sm">
                            <form>
                                <label class="uppercase font-bold  text-blue-600" for="fname">Description</label><br>
                                <input type="text" placeholder="Enter Your Description" class="input input-bordered input-ghost input-l w-full max-w-xl mb-4 mt-2" name="c_class" value="Lorem Ipsum..." />
                            </form>
                        </div>

                        <div class="container p-4 text-primary text-sm">
                            <form>
                                <label class="uppercase font-bold  text-blue-600" for="fname">Created at</label><br>
                                <input type="text" placeholder="Enter Your Deadline" class="input input-bordered input-ghost input-l w-full max-w-xl mb-4 mt-2" name="c_class" value="Lorem Ipsum..." />
                            </form>
                        </div>
                        
                        <div class="container p-4 text-primary text-sm">
                            <form>
                                <label class="uppercase font-bold  text-blue-600" for="fname">Updated_at</label><br>
                                <input type="text" placeholder="Enter Your Deadline" class="input input-bordered input-ghost input-l w-full max-w-xl mb-4 mt-2" name="c_class" value="Lorem Ipsum..."/>
                            </form>
                        </div>
                     
                        <div class="container p-4 text-primary text-sm">
                            <form>
                                <label class="uppercase font-bold  text-blue-600" for="fname">Assignment style</label><br>
                                <input type="text" placeholder="Enter Your Deadline" class="input input-bordered input-ghost input-l w-full max-w-xl mb-4 mt-2" name="c_class" value="Lorem Ipsum..." />
                            </form>
                        </div>
                    


                        <div class="mt-4 ml-4">
                            <button class="bg-blue-300 hover:bg-blue-600 hover:text-white text-white font-bold py-2 px-4 rounded border-outline border-2">
                                Save
                            <button class="bg-error hover:bg-red-600 hover:text-white text-white font-bold py-2 px-4 rounded border-outline border-2">
                                Cancel
                            </button>
                        </div>

                        
                </div>
            </div>
        </div>
    </div>
        
</x-app-layout>