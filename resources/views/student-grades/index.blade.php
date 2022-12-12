@section('pageTitle', "Student Grades")

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Grade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="col-span-3 p-10 shadow-xl justify-items-auto overflow-y-auto">
                        <h1 class="text-4xl font-semibold ">Student Grade - Kelas : {{ $listStudents->first()->kelas }}</h1>
                        {{-- <h1 class="text-4xl font-semibold ">Student Grade - {{ $student_grades->AssignmentPlanTask->code }}</h1> --}}
                        {{-- <h1>{{ $assignment_id }}</h1> --}}
                        <div class="overflow-x-auto py-8">
                            <table class="table table-zebra w-full">
                                <!-- head -->
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        {{-- <th>Assignment Id</th> --}}
                                        <th>NIM</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Kelas</th>
                                        <th>Nilai</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;?>
                                    @foreach ($listStudents as $ls)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $ls->nim??null }}</td>
                                            <td>{{ $ls->namaMhs??null }}</td>
                                            <td>{{ $ls->kelas??null }}</td>
                                            <td>{{ $ls->nilai??0 }}</td>
                                            {{-- <td>{{ ($sg->Criteria_Level->point??null)/($sg->Criteria_Level->Criteria->max_point??null)*100 }}</td>  --}}
                                            <td class="flex gap-2">
                                            <?php $cek = $ls->btnCek ?? false?>
                                                @if($cek)
                                                <a href="/student-grades/edit?assignment_id={{$ls->idAssignment}}&user_id={{$ls->id}}">
                                                    <button class="btn btn-warning btn-sm"><strong>Edit</strong></button>
                                                </a>
                                                @else
                                                <a href="/student-grades/create?assignment_id={{$ls->idAssignment}}&user_id={{$ls->id}}">
                                                    <button class="btn btn-primary btn-sm">Create</button>
                                                </a>
                                                @endif
                                                <form method="POST" action=" {{ route('student-grades.destroy',[$ls->id]) }}">
                                                    @csrf
                                                    @method('delete')

                                                    <input type="hidden" name="assignmentId" value="{{ $ls->idAssignment }}">
                                                    <input type="hidden" name="userId" value="{{ $ls->id }}">
                                                    <button class="btn btn-error btn-sm text-black-600"
                                                            onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                                                            <strong>Delete</strong>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php $i++ ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                     </div>
             </div>
        </div>
    </div>
</x-app-layout>
