@section('pageTitle', "Student Grades")

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Grades') }}
        </h2>
        <p>Assignment: {{ $assignment->assignmentPlan->title }}</p>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('student-grades.index', $assignment) }}
        <div class="pb-8">
            <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                <table class="border-collapse table-auto w-full bg-white table-striped relative">
                    <thead>
                    <tr class="text-left">
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">No</th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">ID</th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">Student Name</th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">Rubric</th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-48">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($listStudents as $ls)
                        <tr>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $ls->nim }}</td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $ls->namaMhs }}</td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $ls->nilai ?? 0 }}</td>
                            <td
                                class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                <div class="flex flex-wrap space-x-4">
                                    @php($cek = $ls->btnCek ?? false)
                                    @if($cek)
                                        <a href="/student-grades/edit?assignment_id={{$ls->idAssignment}}&user_id={{$ls->id}}">
                                            <button class="text-blue-500"><strong>Edit</strong></button>
                                        </a>

                                        <form method="POST" action=" {{ route('student-grades.destroy',[$ls->id]) }}">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="assignmentId" value="{{ $ls->idAssignment }}">
                                            <input type="hidden" name="userId" value="{{ $ls->id }}">
                                            <button class="text-red-500"
                                                    onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    @else
                                        <a href="/student-grades/create?assignment_id={{$ls->idAssignment}}&user_id={{$ls->id}}">
                                            <button class="text-blue-500">Create</button>
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
