@section('pageTitle', 'Create New Criteria')

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

                    <form action="{{ route('rubrics.criterias.store', $rubric) }}" method="post">
                        @csrf

                        <div class="p-10">
                            <h1 class="text-black">Title</h1>
                            <div class="mt-2">
                                <input class="rounded-md w-80" placeholder="Enter text here..." type="text" name="title">
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <div class="mt-5">
                                <h1 class="text-black">LLO</h1>
                                {{-- <input type="text" class="mt-2 w-80 rounded-md" placeholder="Enter Text Here..." name="llo" id=""> --}}
                                <select class="select select-bordered w-full max-w-xs" placeholder="Enter Text Here..." name="llo">
                                    @foreach ($llos as $llo)
                                    <option value={{$llo->id}}> {{ $llo->description }} </option>
                                    @endforeach
                                </select>
                            </div>


                            <!-- <div class="mt-5">
                                <h1 class="text-black">max point</h1>
                                <input type="text" class="mt-2 w-80 rounded-md" placeholder="Enter Text Here..."
                                    name="max_point" >
                                    <x-input-error :messages="$errors->get('max_point')" class="mt-2" />
                            </div> -->

                            <div class="mt-5 ">
                                <h1 class="text-black">D E S C R I P T I O N</h1>
                                <textarea class="rounded-md mt-2 h-52" name="description" cols="30" rows="10"></textarea>
                            </div>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />

                            <div class="mt-10 flex space-x-5">
                                <input type="submit" value="CREATE" class="btn btn-active rounded-md " />
                                <a href="{{ route('rubrics.criterias.index', [$rubric]) }}" class="btn btn-outline rounded-md">Cancel</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
</x-app-layout>
