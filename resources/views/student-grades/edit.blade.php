<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Edit: Student Grades
        </h2>
    </x-slot>

    <!-- cek -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <div class="grid grid-cols-2">
                        <div>
                            <h2 class="text-lg"><b>{{ $grade->user->name}}</b></h2>
                            <p>Status Pengumpulan</p>
                        </div>
                        <div class="text-right">
                            <h2 class="text-lg"><b>100/100</b></h2>
                            <p>Status Penilaian</p>
                        </div>
                        <br>

                    </div>

                    <p>Mampu menjelaskan konsep pemrograman basis data dalam pengembangan aplikasi</p>
                    <br>

                    <form method="post" action="{{route('student-grades.update', $grade->id) }}">
                        @csrf
                        @method('patch')
                        <div class="btn-group">
                            @foreach($criterias as $criteria)
                                <input type="radio" name="criteria_level_id" data-title="{{ $criteria->point }}" class="btn px-16" value="{{ $criteria->id }}" @checked($criteria->id === $grade->criteria_level_id)/>
                            @endforeach
                            <!-- <input type="radio" name="options" data-title="baik (3pts)" class="btn px-16" />
                            <input type="radio" name="options" data-title="cukup (2pts)" class="btn px-16" checked />
                            <input type="radio" name="options" data-title="kurang (1pts)" class="btn px-16" /> -->
                        </div>

                        <div class="card-actions justify-end pt-5">
                            {{-- <form action="{{ route('student-grades.index') }}">--}}
                            <button class="btn btn-outline" type="submit">Save</button>

                            {{-- <form action="{{ route('student-grades.index') }}">--}}
                            <a class="btn btn-outline" href="/student-grades/?assignment_id={{ $grade->assignment_id }}">Cancel</a>

                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
