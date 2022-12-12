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
                    <div class="flex space-x-20 ">
                        <div class="dropdown border">
                            <select name="" id="">{course->name}
                                @foreach ($course as $courses)
                                    <option> {{ $courses->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex justify-end text-right">

                            <br>
                            <a href="{{ route('syllabi.create') }}"><button
                                    class="btn btn-primary  px-5">Create</button></a>


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
                            <th>Mata Kuliah</th>

                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($syllabus as $syllabi)
                            <tr class="">
                                <th class="text-blue-400"><a href="{{ route('syllabi.show', [$syllabi]) }}">{{ $syllabi->title }}</a></th>
                                <th>{{ $syllabi->head_of_study_program }}</th>
                                <th>{{ $syllabi->author }}</th>
                                <th>{{ $courses->name }}</th>
                                <th class="flex space-x-2"> <a href="{{ route('syllabi.edit', $syllabi->id) }}"><button
                                            class="btn btn-primary px-8">EDIT</button></a>
                                    <form action="{{ route('syllabi.destroy', $syllabi) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button
                                            class="btn btn-primary "onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();"
                                            value="{{ $syllabi->id }}">Delete</button>

                                    </form>
                            </tr>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
            <div>
                <h1 class="text-center text-2xl my-10 font-bold">intended learning outcomes</h1>
                <table class="table w-full text-center border">
                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Position</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ilos as $ilo)
                            <tr>
                                <th>{{ $ilo->id }}</th>
                                <th>{{ $ilo->position }}</th>
                                <th>{{ $ilo->description }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-10">
                    <button class="btn btn-primary">
                        @foreach ($syllabus as $syllabi)
                            <a href='{{ route('syllabi.ilos.index', $syllabi->id) }}'>
                        @endforeach
                       Lihat ilos
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
