@section('pageTitle', $courseClass->name . ' Learning Achievement')
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-start items-start gap-4">
            <x-back-link/>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Learning Achievement') }}
            </h2>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 pb-6 lg:px-8">
        {{ Breadcrumbs::render('mygrade.show', $courseClass) }}
        <div class="pb-2">
            <div class="flex flex-row justify-between mb-3 sm:px-0 -mr-2 sm:-mr-3">
                <h2 class="text-xl font-extrabold px-2 py-1">
                    Assignment Grades
                </h2>
            </div>
            <div class="pb-4">
                @if($assignments->count() > 0)
                    <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                        <table class="border-collapse table-auto w-full bg-white table-striped relative">
                            <thead>
                            <tr class="text-left">
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">
                                    No
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                                    Assignment
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-32">
                                    Collected Points
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                                    Grade
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($assignments as $assignment)
                                <tr>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100 font-semibold">
                                        {{ $assignment->assignmentPlan->title }}
                                        <a target="_blank" href="{{ route('classes.assignments.show', [$courseClass, $assignment]) }}"
                                           class="text-blue-500 text-sm"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                    </td>
                                    @if($assignment->isGraded)
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                            <span class="font-semibold">{{ $assignment->collectedPoints }}</span>
                                            <span class="text-gray-400"> / {{ $assignment->maxPoints }}</span>
                                        </td>
                                        <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                            {{ round($assignment->collectedPoints / $assignment->maxPoints * 100, 2) }}
                                        </td>
                                    @else
                                    <td colspan="2" class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                        <p class="text-gray-400">Not graded yet</p>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="w-full h-full overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="bg-white p-5 shadow-sm rounded-sm text-center">
                            <p class="text-gray-400 text-sm">No grade yet</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="pb-2">
            <div class="flex flex-row justify-between mb-3 sm:px-0 -mr-2 sm:-mr-3">
                <h2 class="text-xl font-extrabold px-2 py-1">
                    Lesson Learning Outcome (LLO) Achievement
                </h2>
            </div>
            <div class="pb-4">
                @if($lessonLearningOutcomes->count() > 0)
                    <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                        <table class="border-collapse table-auto w-full bg-white table-striped relative">
                            <thead>
                            <tr class="text-left">
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">
                                    No
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                                    Lesson Learning Outcome (LLO)
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-24">
                                    Collected Points
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-12">
                                    Achievement
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($lessonLearningOutcomes as $clo)
                                <tr>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100 font-semibold">
                                        [{{ $clo->code }}] {{ $clo->description }}</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                        <span class="font-semibold">{{ $clo->collectedPoints }}</span>
                                        <span class="text-gray-400"> / {{ $clo->maxPoint }}</span>
                                    </td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                        {{ round($clo->collectedPoints / $clo->maxPoint * 100, 2) }}%
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="w-full h-full overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="bg-white p-5 shadow-sm rounded-sm text-center">
                            <p class="text-gray-500">No LLO achievement found.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="pb-2">
            <div class="flex flex-row justify-between mb-3 sm:px-0 -mr-2 sm:-mr-3">
                <h2 class="text-xl font-extrabold px-2 py-1">
                    Course Learning Outcome (CLO) Achievement
                </h2>
            </div>
            <div class="pb-4">
                @if($courseLearningOutcomes->count() > 0)
                    <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                        <table class="border-collapse table-auto w-full bg-white table-striped relative">
                            <thead>
                            <tr class="text-left">
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">
                                    No
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                                    Course Learning Outcome (CLO)
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-24">
                                    Collected Points
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-12">
                                    Achievement
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($courseLearningOutcomes as $clo)
                                <tr>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100 font-semibold">
                                        [{{ $clo->code }}] {{ $clo->description }}</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                        <span class="font-semibold">{{ $clo->collectedPoints }}</span>
                                        <span class="text-gray-400"> / {{ $clo->maxPoint }}</span>
                                    </td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                        @unless($clo->maxPoint == 0)
                                            {{ round($clo->collectedPoints / $clo->maxPoint * 100, 2) }}%
                                        @endunless
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="w-full h-full overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="bg-white p-5 shadow-sm rounded-sm text-center">
                            <p class="text-gray-500">No CLO achievement found.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="pb-2">
            <div class="flex flex-row justify-between mb-3 sm:px-0 -mr-2 sm:-mr-3">
                <h2 class="text-xl font-extrabold px-2 py-1">
                    Intended Learning Outcome (ILO) Achievement
                </h2>
            </div>
            <div class="pb-4">
                @if($intendedLearningOutcomes->count() > 0)
                    <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                        <table class="border-collapse table-auto w-full bg-white table-striped relative">
                            <thead>
                            <tr class="text-left">
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-6">
                                    No
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate">
                                    Intended Learning Outcome (ILO)
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-24">
                                    Collected Points
                                </th>
                                <th class="bg-gray-50 sticky top-0 border-b border-gray-100 px-6 py-3 text-gray-500 font-bold tracking-wider uppercase text-xs truncate w-12">
                                    Achievement
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($intendedLearningOutcomes as $ilo)
                                <tr>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">{{ $loop->index + 1 }}</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100 font-semibold">
                                        [{{ $ilo->code }}] {{ $ilo->description }}</td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                        <span class="font-semibold">{{ $ilo->collectedPoints }}</span>
                                        <span class="text-gray-400"> / {{ $ilo->maxPoint }}</span>
                                    </td>
                                    <td class="text-gray-600 px-6 py-3 border-t border-gray-100">
                                        @unless($ilo->maxPoint == 0)
                                            {{ round($ilo->collectedPoints / $ilo->maxPoint * 100, 2) }}%
                                        @endunless
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="w-full h-full overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="bg-white p-5 shadow-sm rounded-sm text-center">
                            <p class="text-gray-500">No ILO achievement found.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
