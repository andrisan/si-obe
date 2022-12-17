@section('pageTitle', "Study Programs of {$department->name} Department")
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ucfirst($department->name) }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('study-programs.index', $faculty, $department) }}
        <div class="pb-8">
            <div class="flex flex-row sm:justify-end mb-3 px-4 sm:px-0 -mr-2 sm:-mr-3">
                <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                    <x-button-link href="{{ route('faculties.departments.study-programs.create', [$faculty, $department]) }}">
                        <i class="fa fa-plus"></i> {{ __('Create New Study Program') }}
                    </x-button-link>
                </div>
            </div>
            @if($studyPrograms->count() > 0)
                <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                    <table class="border-collapse table-auto w-full bg-white table-striped relative">
                        <thead>
                        <tr class="text-left">
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">
                                No
                            </th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-64">
                                Department Name
                            </th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-48">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($studyPrograms as $studyProgram)
                            <tr>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + $studyPrograms->firstItem() }}</td>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $studyProgram->name }}</td>
                                <td
                                    class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                    <div class="flex flex-wrap space-x-4">
                                        <a href="{{ route('faculties.departments.study-programs.edit', [$faculty, $department, $studyProgram]) }}"
                                           class="text-blue-500">Edit</a>
                                        <form method="POST" action="{{ route('faculties.departments.study-programs.destroy', [$faculty, $department, $studyProgram]) }}">
                                            @csrf
                                            @method('delete')

                                            <button class="text-red-500"
                                                    onclick="event.preventDefault(); confirm('Are you sure?') && this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $studyPrograms->links() }}
            @else
                <div class="text-center p-8">
                    No study programs found.
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
