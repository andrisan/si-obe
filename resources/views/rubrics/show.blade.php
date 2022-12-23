<title>Rubrics {{ $rubric->title }}</title>
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="items-start">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $rubric->title }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 pb-6 lg:px-8">
        {{ Breadcrumbs::render('rubrics.show', $syllabus, $assignmentPlan, $rubric) }}
        <div class="flex flex-row justify-end mb-3 px-4 sm:px-0 -mr-2 sm:-mr-3">
            <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                <x-button-link :href="route('rubrics.criterias.create', $rubric)">
                    <i class="fa fa-plus"></i> {{ __("Create Criteria") }}
                </x-button-link>
            </div>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if($rubric->criterias->count() > 0)
                    @foreach ($rubric->criterias as $criteria)
                    <div class="flex justify-between py-2">
                        <div>
                            <span class="text-xl font-extrabold items-start">{{ $criteria->title }}</span>
                            <a href="{{ route('rubrics.criterias.edit', [$rubric, $criteria]) }}" class="ml-2">
                                <i class="fa fa-edit text-blue-500"></i>
                            </a>
                        </div>
                        <div>
                            <h1 class="font-extrabold text-black">{{ __("Max Point").": " }}
                                @if(empty($criteria->max_point))
                                    <span class="font-light text-sm text-gray-400">Please define criteria level</span>
                                @else
                                    {{ $criteria->max_point }}
                                @endif
                            </h1>
                        </div>
                    </div>

                    <p class="p-3">{{ $criteria->description }}</p>
                    @php($llo = $criteria->lessonLearningOutcome)
                    <div class="border rounded border-gray-200 p-4 mx-3">
                        <span class="font-bold">{{ __("Lesson Learning Outcome: ") }}</span>
                        {{ $llo->description }} [{{ $llo->code }}]
                    </div>

                    <div class="py-5">
                        <div class="flex flex-row justify-between mb-3 px-4 sm:px-0 -mr-2 sm:-mr-3">
                            <h2 class="font-bold text-gray-500 p-3">Criteria Levels</h2>
                            <div class="order-5 sm:order-6 mr-2 sm:mr-3">
                                <x-button-link :href="route('rubrics.criterias.criteria-levels.create', [$rubric, $criteria])">
                                    <i class="fa fa-plus"></i> {{ __("Add Level") }}
                                </x-button-link>
                            </div>
                        </div>

                        @php($criteriaLevels = $criteria->criteriaLevels)
                        @if($criteriaLevels->count() > 0)
                            <div class="mb-5 overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                                <table class="border-collapse table-auto w-full bg-white table-striped relative">
                                    <thead>
                                    <tr class="text-left">
                                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">
                                            No
                                        </th>
                                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-64">
                                            Title
                                        </th>
                                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate ">
                                            Point
                                        </th>
                                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-128">
                                            Description
                                        </th>
                                        <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-48">
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($criteriaLevels as $criteriaLevel)
                                        <tr>
                                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $criteriaLevel->title }}</td>
                                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $criteriaLevel->point }}</td>
                                            <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $criteriaLevel->description ?? "-" }}</td>
                                            <td
                                                class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                                <div class="flex flex-wrap space-x-4">
                                                    <a href="{{ route('rubrics.criterias.criteria-levels.edit', [$rubric, $criteria, $criteriaLevel]) }}"
                                                       class="text-blue-500">Edit</a>
                                                    <form method="POST"
                                                          action="{{ route('rubrics.criterias.criteria-levels.destroy', [$rubric, $criteria, $criteriaLevel]) }}">
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
                        @else
                            <div class="border rounded text-center p-8 font-light text-sm text-gray-400 m-4">
                                No Criteria Levels found.
                            </div>
                        @endif

                        <div class="flex justify-end">
                            <form method="POST" action="{{ route('rubrics.criterias.destroy', [$rubric, $criteria]) }}">
                                @csrf
                                @method('delete')

                                <button class="btn btn-sm btn-error text-white gap-2"
                                        onclick="event.preventDefault(); confirm('Are you sure to delete this criteria?') && this.closest('form').submit();">
                                    <i class="fa fa-trash"></i> {{ __('Delete Criteria') }}
                                </button>
                            </form>
                        </div>

                        @if(!$loop->last)
                            <div class="divider text-emerald-500"><i class="fa-regular fa-bookmark"></i></div>
                        @endif
                    </div>
                @endforeach
                @else
                    <div class="text-center p-8 text-gray-400">
                        No criteria found.
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="py-2 ">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        </div>
</x-app-layout>
