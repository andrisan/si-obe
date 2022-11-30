<title>Create Assignment Plans</title>

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
                <form action="{{ route('syllabi.assignment-plans.store', $syllabus) }}" method="post">
                @csrf

                        <div class="container p-4 text-primary text-sm">
                                <label class="uppercase font-bold  text-blue-600" for="name">Title</label><br>
                                <input type="text" placeholder="Masukkan input" class="input input-bordered w-full max-w-xs" name="title"/> <br>
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div class="container p-4 text-primary text-sm">
                                <label class="uppercase font-bold  text-blue-600" for="name">Description</label><br>
                                <input type="text" placeholder="Masukkan input" class="input input-bordered w-full max-w-xs" name="description"/> <br>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>


                         <div class="container p-4 text-primary text-sm">
                                <label class="uppercase font-bold  text-blue-600" for="name">Assignment style</label><br>
                                <input type="text" placeholder="Masukkan input" class="input input-bordered w-full max-w-xs" name="assignment_style"/> <br>
                                <x-input-error :messages="$errors->get('assignment_style')" class="mt-2" />
                          </div>
                        <input type="submit" value="Save" class="btn btn-active rounded-md " />
                        <a href="{{ route('syllabi.assignment-plans.index', [$syllabus]) }}" class="btn btn-outline rounded-md">Cancel</a>
                     </form> 
                </div>
            </div>
        </div>
    </div>
        
</x-app-layout>