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
                            <h2 class="text-lg"><b>{{ $grades->first()->user->name}}</b></h2>
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

                    <form method="post" action="{{route('student-grades.update', $grades->first()->id) }}">
                        <input type="hidden" name="assignment_id" value="{{ $grades->first()->assignment_id }}">
                        <input type="hidden" name="user_id" value="{{ $grades->first()->student_user_id }}">
                        @csrf
                        @method('patch')
                        @foreach($grades as $grade)
                            <div class="btn-group">
                                @foreach($grade->range as $criteria)
                                    <input type="radio" name="criteria_level_id{{ $loop->parent->index }}" data-title="{{ $criteria->point }}" class="btn px-16" value="{{ $criteria->id }}" @checked($criteria->id === $grade->criteria_level_id)/>
                                @endforeach
                            </div>
                            <br>
                        @endforeach

                        <div class="card-actions justify-end pt-5">
                            {{-- <form action="{{ route('student-grades.index') }}">--}}
                            <button class="btn btn-outline" type="submit">Save</button>

                            {{-- <form action="{{ route('student-grades.index') }}">--}}
                            <a class="btn btn-outline" href="/student-grades/?assignment_id={{ $grades->first()->assignment_id }}">Cancel</a>

                        </div>

                    </form>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
