@section('pageTitle', 'My Grades')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Grades') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{ Breadcrumbs::render('mygrade.index') }}
        <div class="pb-8">
            <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                <table class="border-collapse table-auto w-full bg-white table-striped relative">
                    <thead>
                    <tr class="text-left">
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">
                            No
                        </th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                            Class
                        </th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                            Grading Progress
                        </th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                            Grade
                        </th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                            Letter
                        </th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($userClasses as $courseClass)
                        <tr>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                <a href="{{ route('classes.show', $courseClass) }}"
                                   class="text-blue-400">{{ $courseClass->name }}</a>
                                <p class="text-gray-400">{{ $courseClass->course->name }}</p>
                            </td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $courseClass->gradingProgress }}
                                %
                            </td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $courseClass->grade ?? 0 }}</td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $courseClass->letterGrade ?? "-" }}</td>
                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                <a href="{{ route('mygrade.show', $courseClass) }}"
                                   class="text-blue-400">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
