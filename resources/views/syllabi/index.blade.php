@section('pageTitle', "Syllabi")

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Syllabi
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('syllabi.index') }}
        <div class="pb-8">
            <div class="flex flex-row sm:justify-end mb-3 px-4 sm:px-0 -mr-2 sm:-mr-3">
                <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                    <a href="{{ route('syllabi.create') }}" class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="pr-1"><i class="fa fa-plus"></i> {{ __('Create New Syllabus') }}</span>
                    </a>
                </div>
            </div>
            @if($syllabi->count() > 0)
                <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                    <table class="border-collapse table-auto w-full bg-white table-striped relative">
                        <thead>
                        <tr class="text-left">
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">No</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-64">Title</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate ">Author</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">Course</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-48">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($syllabi as $syllabus)
                            <tr>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + $syllabi->firstItem() }}</td>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                    <a href="{{ route('syllabi.show', $syllabus->id) }}" class="text-blue-500 hover:text-blue-700">{{ $syllabus->title }}</a>
                                </td>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $syllabus->author }}</td>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $syllabus->course->name }}</td>
                                <td
                                    class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                    <div class="flex flex-wrap space-x-4">
                                        <a href="{{ route('syllabi.edit', $syllabus) }}" class="text-blue-500">Edit</a>
                                        <form method="POST" action="{{ route('syllabi.destroy', $syllabus) }}">
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
                {{ $syllabi->links() }}
            @else
                <div class="text-center text-gray-600 p-8">
                    {{ __('No syllabi found.') }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
