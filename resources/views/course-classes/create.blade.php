@section('pageTitle', 'Create New Classes')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Class') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('classes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="container p-4 text-primary mt-2 text-sm">
                                <label class="uppercase font-bold  text-black" for="name">nama kelas</label><br>
                                <input type="text" placeholder="Masukkan Nama Kelas"
                                    class="input input-bordered input-ghost input-l w-full max-w-xl mb-2 mt-2"
                                    name="name" required />
                                <br>
                                <label class="uppercase font-bold  text-black" for="course_id">Course</label><br>
                                <select name="course_id" id="cars">
                                    @foreach ($courses as $course)
                                    <option value="{{ $course['id'] }}">{{ $course->name}}</option>
                                    @endforeach
                                </select>
                                <br>


                                <input type="file" name="thumbnail_img" class="block mt-4">
                            </div>
                            <div class="mt-4 ml-4">
                                <button
                                    class="bg-blue-600 hover:bg-white hover:text-blue-600 text-white font-bold py-2 px-4 rounded-lg border-blue-600 border-2"
                                    type="submit">Save</button>
                                <a href="{{ route('classes.index') }}"
                                    class="bg-slate-200 hover:bg-white hover:text-blue-600 text-blue-700 font-bold py-2 px-4 rounded-lg border-blue-600 border-2">Cancel</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
