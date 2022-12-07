<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Class') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="font-bold text-lg my-8 ml-8">Nama : <span class="font-semibold text-base">{{$class['name']}}</span></h1>
                    <h1 class="font-bold text-lg mt-8 mb-4 ml-8">Thumbnail :</h1>
                    <img class="font-bold text-lg mt-8 mb-4 ml-8" src="{{$class['thumbnail']}}" alt="">
                    <h1 class="font-bold text-lg mt-8 mb-4 ml-8">Kode Kelas : </h1>
                    <p class="font-semibold text-base ml-8">{{$classes['class_code']}}</p>
                    <a href="{{route ('syllabi.ilos.index',[$syllabus])}}" class="btn rounded-md hover:bg-slate-200 hover:text-black mt-10 "> Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
