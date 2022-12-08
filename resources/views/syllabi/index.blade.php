<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @foreach ($course as $courses)
                {{ __('Rencana Pembelajaran Semester - ' . $courses->name) }}
            @endforeach


        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col lg:flex-row">
                        <div class="grid flex-grow place-item-start">
                            @foreach ($course as $courses)
                                <h1><span class="text-blue-500 font-bold">Mata Kuliah</span> <br> {{ $courses->name }}
                                </h1>

                                <h1 class="text-black"> <span class="text-blue-500 font-bold">Course id</span> <br>
                                    {{ $courses->id }}</h1>
                            @endforeach

                        </div>

                        <div class="">

                            <br>
                            <a href="{{ route('syllabi.create') }}"><button
                                    class="btn btn-primary mt-5 px-5">Create</button></a>


                        </div>




                    </div>


                </div>
            </div>
            <div class=" ">
                <table class="table w-full text-center border ">


                    <thead>
                        <tr class="">
                            <th>Nama Syllabi</th>
                            <th>Ketua Program Studi</th>
                            <th>Dosen Penyusun RPS</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($syllabus as $syllabi)
                            <tr class="">
                                <th>{{ $syllabi->title }}</th>
                                <th>{{ $syllabi->head_of_study_program }}</th>
                                <th>{{ $syllabi->author }}</th>
                            <th> <a href="{{ route('syllabi.edit', $syllabi->id) }}"><button
                                        class="btn btn-primary px-8">EDIT</button></a> </tr>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</x-app-layout>
