@section('pageTitle', 'User List')
@php($studentRows = collect($students->all()))
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row gap-4">
            <x-back-link />
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ ucfirst($courseClass->name) }} {{ __('Members') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-8">
        {{ Breadcrumbs::render('class-members.show', $courseClass) }}
        <div class="pb-10"
            x-data="{
                students: {{ $studentRows }},
            }"
            x-cloak
        >
            <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                    <thead>
                        <tr class="text-left">
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">Student</th>
                            <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <template x-if="students.length === 0">
                        <tr>
                            <td colspan="100%" class="text-center py-10 px-4 py-1 text-sm">
                                No records found
                            </td>
                        </tr>
                    </template>

                    <template x-for="(student, rowIndex) in students" :key="'row-' +rowIndex">
                        <tr>
                            <td
                                class="text-gray-600 px-6 py-3 border-t border-gray-100 whitespace-nowrap">
                                <div class="flex space-x-3 items-center">
                                    <div class="w-16">
                                        <img :src="`https://avatars.dicebear.com/api/initials/${student.name}.svg`" alt="avatar" class="rounded object-fit" loading="lazy">
                                    </div>
                                    <div>
                                        <span class="font-semibold text-gray-500 block" x-text="student.name"></span>
                                        <span class="font-semibold text-gray-500 block" x-text="student.student_id_number"></span>
                                        <div x-text="student.email" class="text-sm"></div>
                                    </div>
                                </div>
                            </td>

                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100 whitespace-nowrap">
                                <div class="flex flex-wrap space-x-4">
                                    <a :href="`mailto:${student.email}`" class="text-blue-500"><i class="fa-regular fa-envelope"></i></a>
                                </div>
                            </td>
                        </tr>
                    </template>
                    </tbody>
                </table>
            </div>
            {{ $students->links() }}
        </div>
    </div>
</x-app-layout>
