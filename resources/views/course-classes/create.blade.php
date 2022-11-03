<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Class') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="container p-4 text-primary mt-2 text-sm">
                            <form>
                                <label class="uppercase font-bold  text-blue-600" for="fname">nama kelas</label><br>
                                <input type="text" placeholder="Enter Your Username" class="input input-bordered input-ghost input-l w-full max-w-xl mb-4 mt-2" />
                            </form>
                        </div>
            
                        <div class="form-control ml-4 text-sm max-w-xl mb-0" id="kodekelas">
                            <label class="uppercase font-bold  text-blue-600" for="fname">kode kelas</label>
                            <div class="input-group mt-2">
                                <input type="text" placeholder="Enter Your Class Code" class="input w-full input-ghost" />
                                <select class="select select-ghost">
                                    <option>CCPAW001</option>
                                    <option>CCPAW002</option>
                                    <option>CCPAW003</option>
                                    <option>CCPAW004</option>
                                </select>
                                <button class="btn btn-square bg-gray-200 border-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                                </button>
                            </div>
                        </div>
            
                        <div class="max-w-xl mt-9 ml-4">
                            <label class="uppercase font-bold text-sm text-blue-600" for="fname">unggah</label>
                            <label
                                class="flex mt-2 justify-center w-full h-32 px-4 transition bg-white border-2 border-gray-300 border-dashed rounded-md appearance-none cursor-pointer hover:border-gray-400 focus:outline-none">
                                <span class="flex items-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <span class="font-medium text-gray-600">
                                        Drop files to Attach, or
                                        <span class="text-blue-600 underline">browse</span>
                                    </span>
                                </span>
                                <input type="file" name="file_upload" class="hidden">
                            </label>
                            <button class="bg-none hover:bg-blue-600 hover:text-white text-blue-600 font-bold py-2 px-4 rounded mt-4 border-blue-600 border-2">
                                Unggah
                            </button>
                        </div>
                        <br>
                        <br>
                        <div class="mt-10 ml-4">
                            <button class="bg-blue-600 hover:bg-white hover:text-blue-600 text-white font-bold py-2 px-4 rounded border-blue-600 border-2">
                                Create Class
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
