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
                    <h1 class="font-bold text-lg mt-8 mb-4 ml-8">Nama Mata Kuliah : </h1>
                    <p class="font-semibold text-base ml-8 mb-10">{{$course['name']}}</p>
                    <h1 class="font-bold text-lg mt-8 mb-4 ml-8">Tipe Mata Kuliah : </h1>
                    <p class="font-semibold text-base ml-8 mb-10">{{$course['type']}}</p>
                    <h1 class="font-bold text-lg mt-8 mb-4 ml-8">Kode Mata Kuliah : </h1>
                    <p class="font-semibold text-base ml-8 mb-10">{{$course['code']}}</p>
                    <h1 class="font-bold text-lg mt-8 mb-4 ml-8">Deskripsi: </h1>
                    <p class="font-semibold text-base ml-8 mb-10">{{$course['short_description']}}</p>
                    <h1 class="font-bold text-lg mt-8 mb-4 ml-8">Ringkasan Bahan Pembelajaran: </h1>
                    <p class="font-semibold text-base ml-8 mb-10">{{$course['study_material_summary']}}</p>
                    <h1 class="font-bold text-lg mt-8 mb-4 ml-8">Learning Media: </h1>
                    <p class="font-semibold text-base ml-8 mb-10">{{$course['learning_media']}}</p>

                    <a href="{{route('classes.index')}}" class="btn rounded-md hover:bg-slate-200 hover:text-black mt-6 mx-6 "> Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
