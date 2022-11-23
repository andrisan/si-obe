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

                <form method="POST" action="{{route('assignment-plans.update')}}">
                        @csrf
                  
                        <div class="container p-4 text-primary mt-2 text-sm">
                            
                                <label class="uppercase font-bold  text-blue-600" for="fname">ID</label><br>
                                <input type="text" class="input input-bordered input-ghost input-l w-full max-w-xl mb-2 mt-2" 
                                name="id" id="id"value="{{$plan->id}}"/>
                            
                        </div>

                        <div class="container p-4 text-primary text-sm">
                           
                                <label class="uppercase font-bold  text-blue-600" for="fname">Title</label><br>
                                <input type="text" class="input input-bordered input-ghost input-l w-full max-w-xl mb-4 mt-2" name="title" id="title" value="{{$plan->title}}"/>
                            
                        </div>

                        <div class="container p-4 text-primary text-sm">
                            
                                <label class="uppercase font-bold  text-blue-600" for="fname">Description</label><br>
                                <input type="text"  class="input input-bordered input-ghost input-l w-full max-w-xl mb-4 mt-2" name="description" id="description" value="{{$plan->description}}" />
                            
                        </div>

                        <div class="container p-4 text-primary text-sm">
                            
                                <label class="uppercase font-bold  text-blue-600" for="fname">Created at</label><br>
                                <input type="text" class="input input-bordered input-ghost input-l w-full max-w-xl mb-4 mt-2" name="created_at" id="created_at" value="{{$plan->created_at}}" />
                            
                        </div>
                        
                        <div class="container p-4 text-primary text-sm">
                            
                                <label class="uppercase font-bold  text-blue-600" for="fname">Updated_at</label><br>
                                <input type="text"  class="input input-bordered input-ghost input-l w-full max-w-xl mb-4 mt-2" name="updated_at" id="updated_at" value="{{$plan->updated_at}}"/>
                            
                        </div>
                     
                        <div class="container p-4 text-primary text-sm">
                           
                                <label class="uppercase font-bold  text-blue-600" for="fname">Assignment style</label><br>
                                <input type="text"  class="input input-bordered input-ghost input-l w-full max-w-xl mb-4 mt-2" name="assignment_style"  id="assignment_style" value="{{$plan->assignment_style}}" />
                            
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