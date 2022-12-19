<title>Rubrics</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('My Rubrics') }}
        </h2>
        <p class="text-gray-500 text-sm">Manage rubrics for your courses.</p>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('rubrics.index') }}
        <div class="pb-8">
            @if($rubrics->count() > 0)
                <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                    <table class="border-collapse table-auto w-full bg-white table-striped relative">
                        <thead>
                        <tr class="text-left">
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">No</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">Title</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-64">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($rubrics as $rubric)
                            <tr>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + $rubrics->firstItem() }}</td>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $rubric->title }}</td>
                                <td
                                    class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                    <div class="flex flex-wrap space-x-4">
                                        <a href="{{ route('rubrics.show', $rubric) }}" class="text-blue-700 hover:text-blue-500">Detail</a>
                                        <a href="{{ route('rubrics.edit', $rubric) }}"
                                           class="text-blue-500">Edit</a>
                                        <form method="POST" action="{{ route('rubrics.destroy', $rubric) }}">
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
                {{ $rubrics->links() }}
            @else
                <div class="text-center p-8">
                    <p class="text-gray-500">No rubrics found.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
