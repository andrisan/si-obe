@section('pageTitle', 'Learning Plan Index')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $syllabus->title }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-8">
        <div class="flex flex-row sm:justify-end mb-3 px-4 sm:px-0 -mr-2 sm:-mr-3">
            <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                <a href="{{ route('syllabi.learning-plans.create', [$syllabus]) }}" class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-2.5 sm:px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <span class="pr-1">New Learning Plan</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>


                </a>
            </div>
        </div>
        <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">

            <table class="border-collapse table-auto w-full bg-white table-striped relative">
                <thead>
                    <tr class="text-left">
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-16">No</th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">LLO</th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">Study Material</th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">Learning Method</th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-16">Week</th>
                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-52">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                    <tr>
                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $plan->id }}</td>
                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $plan->lessonLearningOutcome->description }}</td>
                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $plan->study_material }}</td>
                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $plan->learning_method }}</td>
                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $plan->week_number }}</td>
                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                            <div class="flex flex-wrap space-x-4">
                                <form action="{{ route('syllabi.learning-plans.edit', [$syllabus, $plan->id]) }}" method="GET">
                                    <button class="btn btn-warning btn-sm" value="{{ $plan->id }}">Edit</button>
                                </form>

                                <form action="{{ route('syllabi.learning-plans.destroy', [$syllabus, $plan->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-error btn-sm" value="{{ $plan->id }}" onclick="return confirm('Are you sure?')">Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $plans->links() }}
    </div>
</x-app-layout>
