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

                        <div class="container p-4 text-primary mt-2 text-sm">
                            <form>
                                <label class="uppercase font-bold  text-blue-600" for="fname">Kode Kelas</label><br>
                                <input type="text" placeholder="Enter Your Class Code" class="input input-bordered input-ghost input-l w-full max-w-xl mb-2 mt-2" />
                            </form>
                        </div>

                        <div class="container p-4 text-primary text-sm">
                            <form>
                                <label class="uppercase font-bold  text-blue-600" for="fname">Title</label><br>
                                <input type="text" placeholder="Enter Your Title" class="input input-bordered input-ghost input-l w-full max-w-xl mb-4 mt-2" />
                            </form>
                        </div>

                        <div class="container p-4 text-primary text-sm">
                            <form>
                                <label class="uppercase font-bold  text-blue-600" for="fname">Description</label><br>
                                <input type="text" placeholder="Enter Your Description" class="input input-bordered input-ghost input-l w-full max-w-xl mb-4 mt-2" />
                            </form>
                        </div>
                        
                        <div class="container p-4 text-primary text-sm">
                            <form>
                                <label class="uppercase font-bold  text-blue-600" for="fname">Deadline</label><br>
                                <input type="text" placeholder="Enter Your Deadline" class="input input-bordered input-ghost input-l w-full max-w-xl mb-4 mt-2" />
                            </form>
                        </div>
                    


                        <div class="mt-4 ml-4">
                            <button class="bg-blue-300 hover:bg-blue-600 hover:text-white text-white font-bold py-2 px-4 rounded border-outline border-2">
                                Create Class
                            </button>
                        </div>

                        
                </div>
            </div>
        </div>
    </div>
        
</x-app-layout>
