@section('pageTitle', "Course Learning Outcome")

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course Learning Outcome') }}
        </h2>
        <p>for {{ $ilo->description }}</p>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('clos.index', $syllabus, $ilo) }}
        <div class="pb-8">
            <div class="flex flex-row sm:justify-end mb-3 px-4 sm:px-0 -mr-2 sm:-mr-3">
                <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                    <x-button-link href="{{ route('syllabi.ilos.clos.create',[$syllabus, $ilo]) }}">
                        <i class="fa fa-plus"></i> {{ __('Create New CLO') }}
                    </x-button-link>
                </div>
            </div>
            @if($clos->count() > 0)
                <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                    <table class="border-collapse table-auto w-full bg-white table-striped relative">
                        <thead>
                        <tr class="text-left">
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">
                                No
                            </th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                                Description
                            </th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($clos as $clo)
                            <tr>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + $clos->firstItem() }}</td>
                                <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $clo->description }}</td>
                                <td
                                    class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                    <div class="flex flex-wrap space-x-4">
                                        <a href="{{ route('syllabi.ilos.clos.llos.index', [$syllabus, $ilo, $clo]) }}"
                                           class="text-amber-700">Manage LLOs</a>
                                        <a href="{{ route('syllabi.ilos.clos.edit', [$syllabus, $ilo, $clo]) }}"
                                           class="text-blue-500">Edit</a>
                                        <form method="POST" action="{{ route('syllabi.ilos.clos.destroy', [$syllabus, $ilo, $clo]) }}">
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
                {{ $clos->links() }}
            @else
                <div class="text-center p-8">
                    No course learning outcomes found.
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
