<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Create Student Grades
        </h2>
    </x-slot>

    <!-- cek -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold">{{ $username }}</h1>
                    <br>
                    <h1><b>Deskripsi tugas</b></h1>
                    <h1>{{ $assignment }}</h1>
                    <br>
                    <h1 class="text-center text-2xl font-bold">Input Nilai</h1>


                    <form method="post" action="{{route('student-grades.store')}}">
                        @csrf
                        <input type="hidden" name="assignment_id" value="{{ $assignmentid }}">
                        <input type="hidden" name="student_user_id" value="{{ $userid }}">
                        <br>
                        <div>
                            <h1 class="text-xl font-bold">Masukkan Learning Plan Task</h1>
                            <select name="assignment_plan_task_id" placeholder="-">
                                @foreach ($plantasks as $plan)
                                <option value="{{$plan->id}}">{{$plan->code}} | {{Str::limit($plan->description, 130)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div>
                            <h1 class="text-xl font-bold">Masukkan Criteria Level</h1>
                            <select name="criteria_level_id" placeholder="-">
                                @foreach ($criterialevels as $criterialevel)
                                <option value="{{$criterialevel->id}}">{{$criterialevel->point}} | {{Str::limit($criterialevel->title)}} | {{Str::limit($criterialevel->description,105)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <input type="submit" value="Input nilai" class="btn btn-success m-2">
                            <a href="{{route('student-grades.store')}}"></a>
                        </div>
                        
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
