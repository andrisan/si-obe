@section('pageTitle', "Edit CPL")
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
                    <form method="post" action="{{route('syllabi.ilos.update', [$syllabus, $ilo])}}">
                        @csrf
                        @method('patch')
                        <div class="pb-4">
                            <div class="pb-2"><label for="position">
                                <strong class="font-semibold text-md pt-4 tracking-widest lg:text-lg  text-black">Position</strong></label>
                            </div>
                            <input value="{{ old('position', $ilo->position ) }}" name="position" type="text"
                                placeholder="Posisi CLO" class="input input-bordered w-full max-w-xs" />
                            @error('position')
                            <div class=" text-red-600 ">{{$message}}</div>
                            @enderror <br>
                        </div>
                        <div class="pb-4">
                            <div class="pb-2"><label for="position">
                                <strong class="font-semibold text-md pt-4 tracking-widest  lg:text-lg  text-black">Description</strong></label>
                            </div>
                            <input value="{{ old('description', $ilo->description ) }}" name="description"
                                class="h-52 textarea textarea-bordered w-full" placeholder="Deskripsi CLO">
                            @error('description')
                            <div class=" text-red-600 ">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" value="submit" id="submit"
                            class="btn rounded-md hover:bg-slate-200 hover:text-black">Save </button>
                        <form action="{{route ('syllabi.ilos.index',[$syllabus])}}">
                            <a href="{{route ('syllabi.ilos.index',[$syllabus])}}" class="btn btn-outline rounded-md ">
                                Cancel
                            </a></form>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
