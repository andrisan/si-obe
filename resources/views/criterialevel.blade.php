<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" bg-white border-b border-gray-200">
                    <div class="mx-">
                        <div class=" ">
                            <ul>
                               
                                <li>
                                    <h1 class="text-3xl font-extrabold border-b-2 border-blue-500">Create New Criteria Level</h1>
                                </li>
                            </ul>
                        </div>
                        <div>
                
                        </div>
                    </div>
                    <div class="mx-auto justify-center items-center text-center mt-5 ">
                     
                        <h1 class="font-bold text-2xl">Input New Criteria Level</h1>
                        <div class="">
                            <form class="text-center mt-5 justify-center mx-auto max-w-sm">
                                <h1 class="text-left">I N D I C A T O R</h1>
                                <div class="flex items-center mx-auto justify-center border-b border-teal-500 py-2">
                                    <input
                                        class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                        type="text" placeholder="Enter tittle here" aria-label="Full name">
                                </div>
                            </form>
                        </div>
                        <div class="mt-10">
                            <form class="text-center mt-5 justify-center mx-auto max-w-sm">
                                <h1 class="text-left">L E V E L</h1>
                                <div class="inline-block relative w-96 mt-5">
                                    <select
                                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                        <option>Select Level</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="mt-10">
                            <form class="text-center mt-5 justify-center mx-auto max-w-sm">
                                <h1 class="text-left">D E S C R I P T I O N</h1>
                                <div class="flex items-center mx-auto justify-center border-b border-teal-500 py-2">
                                    <input
                                        class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                        type="text" placeholder="Enter tittle here" aria-label="Full name">
                                </div>
                            </form>
                        </div>
                        <div class="mt-20 pb-10 ">
                            <button class="bg-[#AFC7F5] hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
                                Create
                            </button>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
