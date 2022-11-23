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

                <form method="POST" action="{{route('assignment-plans.store')}}">
                        @csrf

                        <div class="container p-4 text-primary mt-2 text-sm">
                            <form>
                                <label class="uppercase font-bold  text-blue-600" for="name">ID</label><br>
                                <input type="text" placeholder="Enter Your Class Code" class="input input-bordered input-ghost input-l w-full max-w-xl mb-2 mt-2" />
                                <x-input-error :messages="$errors->get('id')" class="mt-2" />
                            </form>
                        </div>

                        <div class="container p-4 text-primary text-sm">
                            <form>
                                <label class="uppercase font-bold  text-blue-600" for="name">Title</label><br>
                                <input type="text" placeholder="Enter Your Title" class="input input-bordered input-ghost input-l w-full max-w-xl mb-4 mt-2" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </form>
                        </div>

                        <div class="container p-4 text-primary text-sm">
                            <form>
                                <label class="uppercase font-bold  text-blue-600" for="name">Description</label><br>
                                <input type="text" placeholder="Enter Your Description" class="input input-bordered input-ghost input-l w-full max-w-xl mb-4 mt-2" />
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </form>
                        </div>

                        <div class="container p-4 text-primary text-sm">
                            <form>
                                <label class="uppercase font-bold  text-blue-600" for="fname">Created at</label><br>
                                <input type="text" placeholder="Enter Your Created at" class="input input-bordered input-ghost input-l w-full max-w-xl mb-4 mt-2" />
                                <x-input-error :messages="$errors->get('create_at')" class="mt-2" />
                            </form>
                        </div>
                        
                        <div class="container p-4 text-primary text-sm">
                            <form>
                                <label class="uppercase font-bold  text-blue-600" for="fname">updated_at</label><br>
                                <input type="text" placeholder="Enter Your Updated at" class="input input-bordered input-ghost input-l w-full max-w-xl mb-4 mt-2" />
                                <x-input-error :messages="$errors->get('updated_at')" class="mt-2" />
                            </form>
                        </div>
                     
                        <div class="container p-4 text-primary text-sm">
                            <form>
                                <label class="uppercase font-bold  text-blue-600" for="fname">Assignment style</label><br>
                                <input type="text" placeholder="Enter Your Assignment style" class="input input-bordered input-ghost input-l w-full max-w-xl mb-4 mt-2" />
                                <x-input-error :messages="$errors->get('assignment_style')" class="mt-2" />
                            </form>
                        </div>


                        <div class="mt-4 ml-4">
                            {{--<form action="{{route('assignment-plans.index'}}">--}}
                        
                            <button class="bg-blue-300 hover:bg-blue-600 hover:text-white text-white font-bold py-2 px-4 rounded border-outline border-2" href="{{route('assignment-plans.store')}}">
                                Create
                            </button>
                            {{--</form>}}

                            {{--<form action="{{route('assignment-plans.index'}}">--}}

                            <button class="bg-error hover:bg-red-600 hover:text-white text-white font-bold py-2 px-4 rounded border-outline border-2" href="{{route('courses.index')}}">
                                Cancel
                            </button>
                            </form>
                       

                        </div>


                </form> 
                </div>
            </div>
        </div>
    </div>
        
</x-app-layout>
