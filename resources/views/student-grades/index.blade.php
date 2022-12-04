<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Grade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="col-span-3 p-10 shadow-xl justify-items-auto overflow-y-auto">
                        <h1 class="text-4xl font-semibold ">Student Grade - Assignment 1</h1>
                        {{-- <h1 class="text-4xl font-semibold ">Student Grade - {{ $student_grades->AssignmentPlanTask->code }}</h1> --}}
                        <div class="grid grid-cols-8 gap-4 py-4">
                            {{-- <form action="student-grades/create?{{ $assignment_id }}" method="get">
                                <button class="btn btn-accent col-end-1">Tambah</button>
                            </form> --}}
                        </div>
                        {{-- <h1>{{ $assignment_id }}</h1> --}}
                        <div class="overflow-x-auto py-4">
                            <table class="table table-zebra w-full">
                                <!-- head -->
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        {{-- <th>Assignment Id</th> --}}
                                        <th>NIM</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Kelas</th>
                                        <th>Plan Task</th>
                                        <th>Nilai</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    @foreach ($assignments as $assignment)
                                        @foreach ($assignment->CourseClass->students as $item)
                                            @foreach ($assignment->assignmentPlan->assignmentPlanTasks as $item2)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                {{-- <td>{{ $sg->assignment_id??null }}</td> --}}
                                                <td>{{ $item->StudentData->student_id_number??null }}</td>
                                                <td>{{ $item->name??null }}</td>
                                                <td>{{ $assignment->CourseClass->name??null }}</td>
                                                <td>{{ $item2->code??null }}</td> 
                                                {{-- <td>{{ $item3->point??null }}</td>  --}}
                                                {{-- <td>{{ ($sg->Criteria_Level->point??null)/($sg->Criteria_Level->Criteria->max_point??null)*100 }}</td>  --}}
                                                <td class="flex gap-2">
                                                    {{-- <form action="{{ route('student-grades.edit', [$sg->id]) }}">  --}}
                                                        <button class="btn btn-warning btn-sm">Edit</button>
                                                    {{-- </form> --}}
                                                    <form method="POST" action="{{-- {{ route('student-grades.destroy', [$student_grades->id]) }}--}}">
                                                        @csrf
                                                        @method('delete')
    
                                                        <button class="btn btn-error btn-sm"
                                                                onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                                                            Delete
                                                        </button> 
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php $i++ ?>        
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                     </div>
                </div>
             </div>
        </div>
    </div>
</x-app-layout>