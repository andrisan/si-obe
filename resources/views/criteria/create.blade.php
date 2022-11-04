<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Create New Criteria Level') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" bg-white border-b border-gray-200">
                    <div class="p-10">
                        <h1 class="text-black">I N D I C A T O R</h1>
                        <div class="mt-2">
                            <input class="rounded-md w-80" placeholder="Enter text here..." type="text">
                        </div>

                        <div class="flex">

                            <div class="mt-5">
                                <h1 class="text-black">P O I N T</h1>
                                <input type="text" class="mt-2 w-80 rounded-md" placeholder="Enter Text Here..."
                                    name="" id="">
                            </div>
                            <div class="mt-5 ml-10 ">
                                <h1 class="text-black">L E V E L</h1>
                                <select class="w-80 mt-2 rounded-md" name="" id="">
                                    <option disabled>Select a category..</option>
                                    <option value="saab">Baik</option>
                                    <option value="mercedes">Cukup</option>
                                    <option value="audi">Kurang</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-5 ">
                            <h1 class="text-black">D E S C R I P T I O N</h1>
                            <textarea class="rounded-md mt-2 h-52" name="" id="" cols="30" rows="10"></textarea>
                        </div>

                        <div class="mt-10 flex space-x-5">
                            <button class="rounded-md hover:bg-blue-700 bg-blue-500 text-white p-3">Create</button>
                            <button
                                class="rounded-md border-2 border-blue-400 hover:border-blue-700 hover:text-blue-600 bg-white text-blue-500 p-3">Button</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
</x-app-layout>
